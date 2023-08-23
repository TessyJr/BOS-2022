<?php

namespace App\Http\Controllers;

use App\Models\Group\GroupDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PaymentController extends Controller
{
    public function verifyPaymentFormat($ext) {
        static $acceptedValue = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];
        if(in_array($ext, $acceptedValue)) {
            return true;
        }
        return false;
    }

    public function uploadPayment(Request $request){
        $user = Auth::user();
        $file = $request->file('payment');
        if($this->verifyPaymentFormat($file->getClientOriginalExtension()) && $this->verifyPaymentSize($file->getSize())) {
            $extension = $file->getClientOriginalExtension();
            $payment_pic = 'Payment' . '-' . $user->fullName . '-' . $user->nim . '-' . date('dmYhis') . '.' . $extension;
            $file->storeAs('payment/', $payment_pic);
            User::find(Auth::user()->id)->update([
                'payment_pic' => $payment_pic,
                'payment_type' => $request->payment_type,
                'payment_status' => 1
            ]);
        }
    }

    //Dijadiin middleware
    // public function getImagePath(Request $request) {
    //     if(Auth::user()->role === 2 || Auth::user()->role === 3) {

    //     }
    // }

    public function submitPayment(Request $request) {
        $user = Auth::user();
        if(!$user->has_group && $request->payment_type === 'group') {
            GroupController::joinGroup($request->group_token);
        }else if ($request->payment_type === 'individual') {
            User::find($user->id)->update([
                'has_group' => false
            ]);
        }
        $this->uploadPayment($request);
        return redirect()->back();
    }

    public function verifyPaymentSize($size) {
        $fileSizeLimit = 1000000 * 2; // Artinya 2mb jika ingin diubah menjadi 3, 4, 5 mb dll tinggal diubah angka sebelah kanan aja
        if($size > $fileSizeLimit) {
            return false;
        }

        return true;
    }
}
