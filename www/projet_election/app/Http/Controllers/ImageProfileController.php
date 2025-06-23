<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image_profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageProfileController extends Controller
{

    public function upload_image(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg|max:50',
        ]);
        $image_path = $request->file('image')->store('image', 'public');
        $user = Auth::user();
        $old = Image_profile::where('user_id', $user->id)->first();
        if($old != null) {
            $old_path = $old->image;
            Storage::disk('public')->delete($old_path);
            $old->update(['image' => $image_path]);
        }

        else{
            $data = Image_profile::create([
                'image' => $image_path,
                'user_id' =>request('user_id')
            ]);
        }
        return redirect()->route('account');
    }
}
