<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RegistrationSource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isEmpty;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function personalEmailIsUnique(Request $request) {
        $email = $request->email;
        $email_res = User::where('email',$email)->get()->first();
        if($email_res === null) {
            return json_encode(array('emailStatus' => true));
        }
        return json_encode(array('emailStatus' => false));
    }
    public function nimIsUnique(Request $request) {
        $nim = $request->nim;
        $nim_res = User::where('nim',$nim)->get()->first();
        if($nim_res === null) {
            return json_encode(array('nimStatus' => true));
        }
        return json_encode(array('nimStatus' => false));
    }
    public function lineIdIsUnique(Request $request) {
        $lineId = $request->lineId;
        $lineId_res = User::where('line_id',$lineId)->get()->first();
        if($lineId_res === null) {
            return json_encode(array('lineStatus' => true));
        }
        return json_encode(array('lineStatus' => false));
    }
    public function whatsappIsUnique(Request $request) {
        $whatsapp = $request->whatsapp;
        $whatsapp_res = User::where('whatsapp',$whatsapp)->get()->first();
        if($whatsapp_res === null) {
            return json_encode(array('whatsappStatus' => true));
        }
        return json_encode(array('whatsappStatus' => false));
    }

    public function instagramIsUnique(Request $request) {
        $instagram = $request->instagram;
        $instagram_res = User::where('instagram',$instagram)->get()->first();
        if($instagram_res === null) {
            return json_encode(array('instagramStatus' => true));
        }
        return json_encode(array('instagramStatus' => false));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
            // dd($request->all());
        $captchaPostUrl = "https://www.google.com/recaptcha/api/siteverify";
        $secretKey = ENV("CAPTCHA_SECRET_KEY");
        $captchaResponse = Http::asForm()->post($captchaPostUrl,[
            'secret' => $secretKey,
            'response' => $request["g-recaptcha-response"]
        ]);

        // dd($request->all());
        // dd($request->input('registration_source'));

        if($captchaResponse->json()['success']) {
            $user = User::create([
                //Step 1
                'fullName' => $request->nama,
                'gender' => $request->jenisKelamin,
                'birthDate' => $request->birthDate,
                'placeBirth' => $request->placeBirth,
                'domicile' => $request->domicile,
                'address' => $request->address,
                'line_id' => $request->lineID,
                'whatsapp' => $request->whatsapp,
                'instagram' => $request->instagram,
                'agama' => $request->agama,
                //Step 2
                'nim' => $request->nim,
                'campus_region' => $request->campusRegion,
                'faculty' => $request->faculty,
                'major' => $request->major,
                'batch' => $request->batch,
                //Step 3
                'launching_schedule' => $request->schedule,
                'lnt_course' => $request->course,
                'register_from' => $request->register_from,
                'agama' => $request->agama,
                'register_from' => $request->get('register_from'),
                'trial_class' => $request->trial_class,
                //Step 4
                'email' => $request->personalEmail,
                'password' => Hash::make($request->password),
                'status' => 1,
                'registration_source' => $request->cookie('source') ? $request->cookie('source') : 'online'
            ]);

            foreach($request->input('registration_source') as $source) {
                RegistrationSource::create([
                    'user_id' => $user->id,
                    'source' => $source
                ]);
            }

            event(new Registered($user));

            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } else {
            return redirect()->back()->withInput($request->all())->with("captchaStatus", "Captcha failed please retry");
        }
    }
}
