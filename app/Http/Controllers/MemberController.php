<?php

namespace App\Http\Controllers;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use App\Models\Member2;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MemberController extends Controller
{
    public function registUserPage(Request $request){
        $user = $request->user();
        //$user = User::findOrFail(1);
        $name = Str::words($user->fullName,2,'');

        if($user->payment_status != 3){
            return abort(404);
        }

        return view('user.user-regist',compact('user','name'));
    }

    public function downloadSuratMember(){
        $user = Auth::user();

        if($user->payment_status != 3){
            return abort(404);
        }

        $file = public_path("download/Surat_Member_BNCC_2022-2023.docx");
        return response()->download($file);
    }

    public function createMember(Request $request) {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);
        $name = Str::words($user->fullName,2,'');

        if($user->payment_status != 3 || $user->status >=3){
            return abort(404);
        }

        // File Processing KTP
        $files = $request->file('ktp_pic');
        $extension = $files->getClientOriginalExtension();
        $ktp_pic = 'KTP' . '-' . $name . '-' . $user->nim . '-' . date('dmYhis') . '.' . $extension;
        $files->storeAs('ktp/', $ktp_pic);

        // File Processing FYP
        $files = $request->file('fyp_pic');
        $extension = $files->getClientOriginalExtension();
        $fyp_pic = 'FYP' . '-' . $name . '-' . $user->nim . '-' . date('dmYhis') . '.' . $extension;
        $files->storeAs('fyp/', $fyp_pic);

        // File Processing Surat Member
        $files = $request->file('suratMember');
        $extension = $files->getClientOriginalExtension();
        $suratMember = 'SuratMember' . '-' . $name . '-' . $user->nim . '-' . date('dmYhis') . '.' . $extension;
        $files->storeAs('surat/', $suratMember);

        if($user->campus_region == 'Bandung' || $user->campus_region == 'Alam Sutera' || $user->campus_region == 'Malang'){
            Member::create([
                'user_id' => $user_id,
                'reregister_schedule' => NULL,
                'bnccid' => $user -> bnccID,
                'email_binus' => $request -> binus_email,
                'ktp_pic' => $ktp_pic,
                'fyp_pic' => $fyp_pic,
                'surat' => $suratMember
            ]);

            $user->update([
                'binus_email' => $request -> binus_email,
                'reregister_schedule' => NULL,
                'status' => 3,
                'lnt_course' => $request->lnt_course
            ]);

        } else {
            Member::create([
                'user_id' => $user_id,
                'reregister_schedule' => $request -> reregister_schedule,
                'bnccid' => $user -> bnccID,
                'email_binus' => $request -> binus_email,
                'ktp_pic' => $ktp_pic,
                'fyp_pic' => $fyp_pic,
                'surat' => $suratMember
            ]);

            $user->update([
                'binus_email' => $request -> binus_email,
                'reregister_schedule' => $request->reregister_schedule,
                'status' => 4
            ]);
        }

        return redirect()->back();
    }


    // Re-register
    public function linkedinIsUnique(Request $request) {
        $linkedin = $request->linkedin;
        $linkedin_res = Member2::where('linkedinUrl',$linkedin)->get()->first();
        if($linkedin_res === null) {
            return json_encode(array('linkedinStatus' => true));
        }
        return json_encode(array('linkedinStatus' => false));
    }

    public function githubIsUnique(Request $request) {
        $github = $request->github;
        $github_res = Member2::where('githubUrl',$github)->get()->first();
        if($github_res === null) {
            return json_encode(array('githubStatus' => true));
        }
        return json_encode(array('githubStatus' => false));
    }

    public function UserReRegisterPage(Request $request){
        $user = $request->user();
        //$user = User::findOrFail(1);
        $name = Str::words($user->fullName,2,'');

        if($user->status != 4){
            return abort(404);
        }

        return view('user.user-reregist',compact('user','name'));
    }

    public function memberReregister(Request $request) {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if($user->status != 4 || $user->reregister_status == 1){
            return abort(404);
        }

        if ($user->campus_region == 'Malang' || $user->campus_region == 'Alam Sutera' || $user->campus_region == 'Bandung'){
            Member2::create([
                'user_id' => $user_id,
                //'member_id' => $member->id,
                'lnt_course' => $user->lnt_course,
                'linkedinUrl' => $request -> linkedin,
                'githubUrl' => $request -> github
            ]);
        } else {
            Member2::create([
                'user_id' => $user_id,
                //'member_id' => $member->id,
                'lnt_course' => $request->lnt_course,
                'linkedinUrl' => $request -> linkedin,
                'githubUrl' => $request -> github
            ]);

            $user->update([
                'lnt_course' => $request -> lnt_course
            ]);
        }

        $user->update([
            'reregister_status' => 1,
        ]);

        return redirect(route('userReRegist'));
    }
}
