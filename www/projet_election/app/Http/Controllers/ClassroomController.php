<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Image_Profile;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;

class classroomController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $alluser = User::all();
        $representative = Representative::all();
        $class_id = ClassModel::all();
        $picture = Image_Profile::where('user_id', $user->id)->first();
        $profile_picture = Image_Profile::all();
        return view('classroom.index', compact('representative', 'user', 'alluser', 'picture', 'class_id', 'profile_picture'));
    }
}
