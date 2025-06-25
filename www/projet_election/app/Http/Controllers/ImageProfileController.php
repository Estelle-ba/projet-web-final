<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageProfileController extends Controller
{

    //Function to upload an image
    public function upload_image(Request $request)
    {
        //Return if the request is valid or not
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:50',
        ]);

        //Add the path in the file public/storage/image
        $image_path = $request->file('image')->store('image', 'public');

        //Find the actual user
        $user = Auth::user();
        $old = Image_profile::where('user_id', $user->id)->first();

        //If the user already have a picture
        if($old != null) {
            $old_path = $old->image;
            Storage::disk('public')->delete($old_path);//Delete the last one
            $old->update(['image' => $image_path]); //Change the path of the profile picture
        }

        //Else add the path in the database
        else{
            $data = Image_profile::create([
                'image' => $image_path,
                'user_id' =>request('user_id')
            ]);
        }
        return redirect()->route('account');
    }
}
