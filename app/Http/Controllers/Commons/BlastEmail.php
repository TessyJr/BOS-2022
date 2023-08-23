<?php

namespace App\Http\Controllers\Commons;

use App\Http\Controllers\Controller;
use App\Mail\BlastMessage;
use App\Models\BlastEmails;
use Exception;
use Illuminate\Support\Facades\Mail;

class BlastEmail extends Controller
{
    public static function storeEmail($email) {
        try {
            BlastEmails::create([
                'email' => $email
            ]);
        } catch (Exception $except) {
            return 1; // Error
        }

        return 0; // Success


    }


    public static function getAll(){
        return BlastEmails::all();
    }

    public function blastView() {
        return view('blastPage');
    }

    public static function blastAll(){
        $emails = BlastEmail::getAll();
        foreach($emails as $email) {
            Mail::to($email)->send(new BlastMessage());
        }
    }
}
