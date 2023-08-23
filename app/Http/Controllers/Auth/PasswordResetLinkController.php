<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('forgotpassword');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        if(User::where('email', $request->only('email'))->get()->first() === null) {
            return json_encode(['status' => 'error.email']);
        }
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return json_encode(['status' => 'noerror']);

        // $status = mail("asphaltlejen@gmail.com", "Password Reset Link", "Please click the link to reset your password");

        // return json_encode(["status" => $status]);
                    // ? back()->with('status', __($status))
                    // : back()->withInput($request->only('email'))
                    //         ->withErrors(['email' => __($status)]);
        // return $status == true
        // ? back()->with('status', __($status))
        // : back()->withInput($request->only('email'))
        //         ->withErrors(['email' => __($status)]);
    }
}
