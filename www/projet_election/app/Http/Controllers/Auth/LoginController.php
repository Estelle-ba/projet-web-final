<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


use App\Models\LoginOtp;
use App\Notifications\SendLoginOtp;
use Illuminate\Support\Str;
use Carbon\Carbon;

class LoginController extends Controller
{
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function showLoginForm(): View
    {
        return view('auth.login');
    }

    

    public function login(Request $request)
    {
        $email = $request->input('email_prefix') . '@edu.esiee-it.fr';
        $request->merge(['email' => $email]);

        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            $request->session()->regenerate();

            $user = Auth::user();

            $code = random_int(100000, 999999);

            LoginOtp::create([
                'user_id' => $user->id,
                'otp' => $code,            
                'expires_at' => Carbon::now()->addMinutes(10),
            ]);


           
            $user->notify(new SendLoginOtp($code));

            
            Auth::logout();

            
            session(['otp_user_id' => $user->id]);

            return redirect('/verify-otp')->with('status', 'Un code a été envoyé à votre adresse email.');
        }

        return back()->withErrors([
            'email_prefix' => __('Identifiants incorrects.'),
        ])->withInput(['email_prefix' => $request->input('email_prefix')]);
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
