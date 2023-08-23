<?php

namespace App\Http\Controllers;

use App\Models\Group\GroupDetail;
use App\Imports\UsersImport;
use App\Models\RegistrationSource;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(Request $request){
        $user = $request->user();
        //$user = User::findOrFail(1);
        $name = Str::words($user->fullName,2,'');
        $surveyFilled = (RegistrationSource::where('user_id',Auth::user()->id)->get()->count() === 0) ? false : true;

        if ($user->role>1){
            return redirect(route('viewUser'));
        } else if($user->role == 1){
            return redirect(route('viewSuperUser'));
        } else {
            return view('user.user-schedule', compact('user','name','surveyFilled'));
        }
    }

    public function joinLaunching(Request $request, $zoom) {
        User::find(Auth::user()->id)->update([
            'join_bl' => true
        ]);

        return Redirect::away($zoom);
    }

    public function profile(Request $request){
        $user = $request->user();
        //$user = User::findOrFail($id);
        $name = Str::words($user->fullName,2,'');

        return view('user.user-profile',compact('user','name'));
    }

    public function changeSchedule(Request $request){
        $userStatus = $request->user();
        $user = User::findOrFail($userStatus->id);

        if($userStatus->campus_region === "Bandung") {
            $user->update([
                'launching_schedule' => $request->schedule,
                'trial_class' => $request->trial_class,
                'status' => 0
            ]);
        } elseif($userStatus->campus_region === "Malang" || $userStatus->campus_region === "Alam Sutera"){
            $user->update([
                'launching_schedule' => $request->schedule,
                'trial_class' => $request->schedule,
                'status' => 0
            ]);
        } else {
            $user->update([
                'launching_schedule' => $request->schedule,
                'status' => 0
            ]);
        }

        return redirect(route('dashboard'));
    }

    public function registrationSourceSurvey (Request $request) {
        // dd($request->input('registration_source'));
        foreach($request->input('registration_source') as $source) {
            RegistrationSource::create([
                'user_id' => Auth::user()->id,
                'source' => $source
            ]);
        }
        return redirect()->back();
    }

    public function storeInstagram (Request $request) {
        User::find(Auth::user()->id)->update([
            'instagram' => $request->instagram
        ]);
        return redirect()->back();
    }

    public function storeReligion (Request $request) {
        User::find(Auth::user()->id)->update([
            'agama' => $request->agama,
        ]);
        return redirect()->back();
    }

    public function paymentPage(Request $request){
        $user = $request->user();
        $name = Str::words($user->fullName,2,'');

        if($user->status == 0){
            return abort(404);
        }

        $groupToken = null;
        if($user->has_group === 1) {
            $groupToken = GroupDetail::where('user_id', $user->id)->get()->first()->group()->get()->first()->group_token;
        }

        return view('user.user-payment', ['group_token' => $groupToken, 'user'=>$user, 'name'=>$name]);
    }

    public function changeReregisterSchedule(Request $request){
        $userStatus = $request->user();
        $user = User::findOrFail($userStatus->id);

        if ($user->status <3){
            return abort(404);
        }

        $memberData = Member::where('user_id', '=' , $userStatus->id)->get()->first();
        $member = Member::findOrFail($memberData->id);

        if($userStatus->campus_region === "Bandung" || $userStatus->campus_region === "Malang" || $userStatus->campus_region === "Alam Sutera") {
            // Kosong
        } else {
            $user->update([
                'reregister_schedule' => $request->reregister_schedule,
                'status' => 3
            ]);
            $member->update([
                'reregister_schedule' => $request->reregister_schedule
            ]);
        }

        return redirect(route('dashboard'));
    }

    // public function submitPayment(Request $request){
    //     $user = $request->user();
    //     $name = Str::words($user->fullName,2,'');

    //     $request->validate([
    //         'payment_pic' => 'required|mimes:png,jpg,jpeg'
    //     ]);

    //     if (Storage::exists('public/payment/' . $user->payment_pic)) {
    //         Storage::delete('public/payment/' . $user->payment_pic);
    //     }

    //     // File Processing
    //     $files = $request->file('payment_pic');
    //     // $fullFileName = $files->getClientOriginalName();
    //     // $fileName = pathinfo($fullFileName)['filename'];
    //     $extension = $files->getClientOriginalExtension();
    //     //$payment_pic = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
    //     $payment_pic = $name . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
    //     $files->storeAs('public/payment/', $payment_pic);

    //     $user->update([
    //         'payment_pic' => $payment_pic,
    //         'payment_status' => 1
    //     ]);

    //     return redirect(route('userPayment'));
    // }

    public function importFromCsv (Request $request) {
        Excel::import(new UsersImport, storage_path('UserFormData/BNCCBackupForm.csv'));
    }
}

