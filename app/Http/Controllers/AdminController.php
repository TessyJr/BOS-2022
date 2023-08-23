<?php

namespace App\Http\Controllers;

use App\Exports\Member2Export;
use App\Exports\MemberExport;
use App\Exports\PaymentExport;
use App\Exports\UsersExport;
use App\Mail\PaymentFailed;
use App\Mail\PaymentSucessful;
use App\Models\Group\GroupDetail;
use App\Models\Member;
use App\Models\Member2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PDO;

class AdminController extends Controller
{
    public $limit = 20;

    public function downloadUserData($region){
        return Excel::download(new UsersExport($region), $region.'_users.xlsx');
    }

    public function viewUser(Request $request) {

        $limit = $this->limit;

        if(request('limit')){
            $limit = request('limit');
        }

        $user_total = User::where('role', '=', 0)->where('campus_region','=',Auth::user()->campus_region)->filter(request(['search']))->get();

        $total = $user_total->count();
        $page = $request->input('page');
        if ($page < 1) $page = 1;
        $page_total = ceil($total / $limit);
        // if($page < 1 || $page > $page_total) $page = 1;
        // $skip = ($page - 1) * $this->limit;

        return view('admin.admin-participant',
        [
            'users' => User::where('role', '=', 0)->where('campus_region','=',Auth::user()->campus_region)->filter(request(['search']))->paginate($limit)->withQueryString(),
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'page_total' => $page_total
        ]);
    }

    public function getUpdatePage($id){
        $user = User::findOrFail($id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewUser'));
        }

        return view('admin.admin-edit',compact('user'));
    }

    public function updateUser(Request $request, $id) {
        $user = User::findOrFail($id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewUser'));
        }

        $user->update([
            'fullName' => $request -> nama,
            'gender' => $request -> jenisKelamin,
            'birthDate' => $request -> birthDate,
            'placeBirth' => $request -> placeBirth,
            'domicile' => $request -> domicile,
            //'address' => $request -> address,
            'line_id' => $request -> lineID,
            'whatsapp' => $request -> whatsapp,
            'instagram' => $request -> instagram,
            'nim' => $request->nim,
            'campus_region' => $request -> campusRegion,
            'faculty' => $request -> faculty,
            'major' => $request -> major,
            'batch' => $request -> batch,
            'launching_schedule' => $request -> schedule,
            'email' => $request -> personalEmail,
            'status' => $request ->status,
            'has_group' => $request ->has_group,
            'lnt_course' => $request ->lnt_course
        ]);

        if (Auth::user()->campus_region == 'Malang' || Auth::user()->campus_region == 'Alam Sutera'){
            $user->update([
                'trial_class' => $request->schedule,
            ]);
        } else if (Auth::user()->campus_region == 'Bandung'){
            $user->update([
                'trial_class' => $request->trial_class,
            ]);
        }

        return redirect(route('viewUser'));
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewUser'));
        }

        $user->delete();

        return back();
    }

    //Payment
    public function downloadPaymentData($region){
        return Excel::download(new PaymentExport($region), $region.'_payment.xlsx');
    }

    public function viewPaymentPage(Request $request){

        $limit = $this->limit;

        if (request('limit')){
            $limit = request('limit');
        }

        $user_total = User::where('role','=',0)->where('payment_status','>=',1)->where('campus_region','=',Auth::user()->campus_region)->filter(request(['search','status']))->get();

        $total = $user_total->count();
        $page = $request->input('page');
        if ($page < 1) $page = 1;
        $page_total = ceil($total / $limit);

        return view('admin.admin-payment',[
            'users' => User::where('role', '=', 0)->where('payment_status','>=',1)->where('campus_region','=',Auth::user()->campus_region)->filter(request(['search','status']))->paginate($limit)->withQueryString(),
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'page_total' => $page_total
        ]);
    }

    public function viewPayment(Request $request, $fn){
        $user = User::findOrFail($fn);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('adminPayment'));
        }

        return response()->file(storage_path('app/payment/' . $user->payment_pic));
    }

    public function approvePayment($id){
        $user = User::findOrFail($id);

        if (Auth::user()->campus_region != $user->campus_region || $user->payment_status == 3){
            return redirect(route('adminPayment'));
        }

        if ($user->campus_region == 'Alam Sutera'){
            $code = 2001;
        } else if ($user->campus_region == 'Bandung'){
            $code = 3001;
        } else if ($user->campus_region == 'Malang'){
            $code = 4001;
        } else {
            $code = 1001;
        }

        $kondisi = true;

        while($kondisi) {
            if (User::where('bnccID','like','BNCC220'.strval($code))->exists()) {
                $code++;
            } else {
                $kondisi = false;
            }
        }

        $bnccID = 'BNCC220' . strval($code);

        if ($user->bnccID == NULL){
            $user->update([
                'payment_status' => 3,
                'bnccID' => $bnccID
            ]);
        } else {
            $user->update([
                'payment_status' => 3
            ]);
        }

        Mail::to($user)->send(new PaymentSucessful());

        return redirect(route('adminPayment'));
    }

    public function rejectPayment($id){
        $user = User::findOrFail($id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('adminPayment'));
        }

        $user->update([
            'payment_status' => 2
        ]);

        Mail::to($user)->send(new PaymentFailed());
        return redirect(route('adminPayment'));
    }

    public function deletePayment($id){
        $user = User::findOrFail($id);
        GroupDetail::where('user_id','=',$id)->delete();

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('adminPayment'));
        }

        if (File::exists(storage_path('app/payment/' . $user->payment_pic))){
            File::delete(storage_path('app/payment/' . $user->payment_pic));
        }

        $user->update([
            'payment_pic' => NULL,
            'payment_status' => 0,
            'payment_type' => NULL,
            'has_group' => 0,
            'bnccID' => NULL
        ]);

        return redirect(route('adminPayment'));
    }


    // Register after Payment
    public function downloadMemberData($region){
        return Excel::download(new MemberExport($region), $region.'_member.xlsx');
    }

    public function getMember(Request $request){

        $limit = $this->limit;

        if(request('limit')){
            $limit = request('limit');
        }

        $member_total = Member::whereHas('user', function($query){
                            $query->where('campus_region','=',Auth::user()->campus_region);
                        })->filter(request(['search']))->get();

        $total = $member_total->count();
        $page = $request->input('page');
        if ($page < 1) $page = 1;
        $page_total = ceil($total / $limit);
        // if($page < 1 || $page > $page_total) $page = 1;
        // $skip = ($page - 1) * $this->limit;

        return view('admin.admin-regist',[
            'members' => Member::whereHas('user', function($query){
                $query->where('campus_region','=',Auth::user()->campus_region);
            })->filter(request(['search']))->orderBy('bnccid')->paginate($limit)->withQueryString(),
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'page_total' => $page_total
        ]);
    }

    public function downloadKTP($id){
        $member = Member::findOrFail($id);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        $file = storage_path('app/ktp/' . $member->ktp_pic);

        return response()->download($file);
    }

    public function downloadFYP($id){
        $member = Member::findOrFail($id);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        $file = storage_path('app/fyp/' . $member->fyp_pic);

        return response()->download($file);
    }

    public function downloadSurat($id){
        $member = Member::findOrFail($id);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        $file = storage_path('app/surat/' . $member->surat);

        return response()->download($file);
    }

    public function viewKTP(Request $request, $fn){
        $member = Member::findOrFail($fn);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        return response()->file(storage_path('app/ktp/' . $member->ktp_pic));
    }

    public function viewFYP(Request $request, $fn){
        $member = Member::findOrFail($fn);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        return response()->file(storage_path('app/fyp/' . $member->fyp_pic));
    }

    public function viewSurat(Request $request, $fn){
        $member = Member::findOrFail($fn);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        return response()->file(storage_path('app/surat/' . $member->surat));
    }

    public function deleteMember($id){
        $member = Member::findOrFail($id);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember'));
        }

        if (File::exists(storage_path('app/ktp/' . $member->ktp_pic))){
            File::delete(storage_path('app/ktp/' . $member->ktp_pic));
        }

        if (File::exists(storage_path('app/fyp/' . $member->fyp_pic))){
            File::delete(storage_path('app/fyp/' . $member->fyp_pic));
        }

        if (File::exists(storage_path('app/surat/' . $member->surat))){
            File::delete(storage_path('app/surat/' . $member->surat));
        }

        if ($user->campus_region == 'Bandung'){
            $user->update([
                'status' => 2
            ]);
        } else {
            $user->update([
                'status' => 1
            ]);
        }

        $user->update([
            'binus_email' => NULL,
            'reregister_schedule' => NULL
        ]);

        $member->delete();

        return redirect()->back();
    }


    // Reregister
    public function downloadMember2Data($region){
        return Excel::download(new Member2Export($region), $region.'_member2.xlsx');
    }

    public function getMember2(Request $request){

        $limit = $this->limit;

        if(request('limit')){
            $limit = request('limit');
        }

        $member_total = Member2::whereHas('user', function($query){
            $query->where('campus_region','=',Auth::user()->campus_region);
        })->filter(request(['search']))->get();

        $total = $member_total->count();
        $page = $request->input('page');
        if ($page < 1) $page = 1;
        $page_total = ceil($total / $limit);
        // if($page < 1 || $page > $page_total) $page = 1;
        // $skip = ($page - 1) * $this->limit;

        return view('admin.admin-reregist', [
            'members' => Member2::whereHas('user', function($query){
                            $query->where('campus_region','=',Auth::user()->campus_region);
                        })->filter(request(['search']))->paginate($limit)->withQueryString(),
            'total' => $total,
            'limit' => $limit,
            'page' => $page,
            'page_total' => $page_total
        ]);
    }

    public function deleteMember2($id){
        $member = Member2::findOrFail($id);
        $user = User::findOrFail($member->user_id);

        if (Auth::user()->campus_region != $user->campus_region){
            return redirect(route('viewMember2'));
        }

        $user->update([
            'reregister_status' => 0
        ]);

        $member->delete();

        return redirect()->back();
    }
}
