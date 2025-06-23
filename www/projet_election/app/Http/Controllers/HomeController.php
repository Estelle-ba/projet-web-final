<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    public function account()
    {
        $user = Auth::user();
        $class = ClassModel::where('id', $user->class_id)->first();
        return view('account', compact('user', 'class'));
    }

}
