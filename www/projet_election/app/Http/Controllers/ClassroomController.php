<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Image_Profile;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class classroomController extends Controller
{
    //Function to go to the classroom page
    public function index()
    {
        //Find the actual user
        $user = Auth::user();

        //If the user is not connected, he is redirected to the welcome page
        if($user == null){
            return redirect()->route('/');
        }

        //Take all the data needed
        $picture = Image_Profile::where('user_id', $user->id)->first();//His profile picture
        $alluser = User::all();//The users
        $representative = Representative::all();//The representatives
        $class_id = ClassModel::all();//The class
        $profile_picture = Image_Profile::all();//All the profile pictures

        //Go to the view with all the data needed
        return view('classroom.index', compact('representative', 'user', 'alluser', 'picture', 'class_id', 'profile_picture'));
    }
}
