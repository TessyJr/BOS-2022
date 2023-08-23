<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BlastEmail as ControllersBlastEmail;
use App\Http\Controllers\Commons\BlastEmail;
use App\Models\BlastEmails;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules\Exists;

class ComingSoon extends Controller
{
    public function getComingSoon() {
        return view('comingsoon', [
            'serverCountdown' => ENV('LAUNCH_COUNTDOWN')
        ]);
    }

    public function validateDuplicate(Request $request) {
        $email = $request->email;

        //True = duplicate | false = not duplicate
        $value = ["duplicate" => BlastEmails::where('email', $email)->exists()];
        return json_encode($value);
    }

    public function postEmail(Request $request) {

        $validated = $request->validate ([
            'email' => 'required|unique:blast_emails|max:255|email'
        ]);
        $status = BlastEmail::storeEmail($request->email);
        return redirect()->back()->with('post_status', $status);
    }
}
