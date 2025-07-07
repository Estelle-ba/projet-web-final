<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginOtp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class OtpController extends Controller
{
    public function showForm()
    {
        if (!session()->has('otp_user_id')) {
            return redirect('/login')->withErrors('Veuillez vous connecter d’abord.');
        }
        
        return view('auth.verify-otp');
    }


    public function verify(Request $request)
    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $userId = session('otp_user_id');
        $otp = LoginOtp::where('user_id', $userId)
        ->where('otp', $request->otp)
        ->where('expires_at', '>', now())
        ->latest()
        ->first();


        if ($otp) {
            Auth::login(User::find($userId));
            session()->forget('otp_user_id');

            
            $otp->delete();

            return redirect('/home');
        }

        return back()->withErrors(['otp' => 'Code invalide ou expiré.']);
    }
}
