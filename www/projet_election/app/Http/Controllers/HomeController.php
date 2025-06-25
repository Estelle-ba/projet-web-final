<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Image_Profile;
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

    //Function to go to the home page
    public function index()
    {
        //Take all the data needed
        $user = Auth::user(); //The actual user
        $picture = Image_Profile::where('user_id', $user->id)->first(); //His profile picture

        //Go to the view with all the data needed
        return view('home', compact('user', 'picture'));
    }


    //Function to go to the account page
    public function account()
    {
        //Take all the data needed
        $user = Auth::user(); //The actual user
        $class = ClassModel::where('id', $user->class_id)->first();//His class
        $picture = Image_Profile::where('user_id', $user->id)->first();//His profile picture

        //Go to the view with all the data needed
        return view('account', compact('user', 'class', 'picture'));
    }

}
