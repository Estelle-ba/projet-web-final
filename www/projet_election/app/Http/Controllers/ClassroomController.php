<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Image_Profile;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;

class classroomController extends Controller
{
    //Function to go to the classroom page
    public function index()
    {
        //Take all the data needed
        $user = auth()->user(); //The actual user
        $picture = Image_Profile::where('user_id', $user->id)->first();//His profile picture

        $alluser = User::all();//The users
        $representative = Representative::all();//The representatives
        $class_id = ClassModel::all();//The class
        $profile_picture = Image_Profile::all();//All the profile pictures

        //Go to the view with all the data needed
        return view('classroom.index', compact('representative', 'user', 'alluser', 'picture', 'class_id', 'profile_picture'));
    }
}
