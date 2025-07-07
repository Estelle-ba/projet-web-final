<?php

namespace App\Http\Controllers;

use App\Models\Image_Profile;
use App\Models\User;
use App\Models\ClassModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    function create(Request $request){
        $user = Auth::user();

        //If the user is not connected, he is redirected to the welcome page
        if($user == null){
            return redirect()->route('/');
        }

        if($this->authorize('create', User::class) == false){
            return redirect()->route('classroom-manager');
        }

        $this->validate($request, [
            'upload_file' => 'required|file|mimes:csv,txt'
        ]);
        $file=[];
        $key=[];
        $row=[];
        $i = 0;


        if (($handle = fopen($request->file('upload_file')->getRealPath(), 'r')) !== false) {

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $row[] = explode(";", $data[0]);
                if ($i !== 0) {
                    $temp = array_combine($key, $row[$i]);
                    $file[] = $temp;
                } else {
                    $key = $row[$i];
                }
                $i++;
            }

            fclose($handle);

        }



        foreach ($file as $data) {
            $student = User::where('name', utf8_encode($data[$key[1]]))->where('lastname', utf8_encode($data[$key[0]]))->first();
            if($student){
                continue; //Passe à la suivante si l'étudiant existe
            }
            else{
                $group = strtoupper($data[$key[3]]);
                if(str_contains($group, 'CERGY')){
                    if(str_contains($group, 'B1')){
                        $class = ClassModel::where('name', 'B1')->where('place', 'Cergy')->firstorFail()->id;
                    }
                    else if (str_contains($group, 'B2')){
                        $class = ClassModel::where('name', 'B2')->where('place', 'Cergy')->firstorFail()->id;
                    }
                    else{
                        $class = ClassModel::where('name', 'B3')->where('place', 'Cergy')->firstorFail()->id;
                    }
                }
                else if (str_contains($group, 'PARIS')){
                    if(str_contains($group, 'B1')){
                        $class = ClassModel::where('name', 'B1')->where('place', 'Paris')->firstorFail()->id;
                    }
                    else if (str_contains($group, 'B2')){
                        $class = ClassModel::where('name', 'B2')->where('place', 'Paris')->firstorFail()->id;
                    }
                    else{
                        $class = ClassModel::where('name', 'B3')->where('place', 'Paris')->firstorFail()->id;
                    }
                }
                else{
                    if(str_contains($group, 'M1')){
                        if (str_contains($group, 'LEAD DEV')){
                            $class = ClassModel::where('name', 'M1 Lead Dev')->firstorFail()->id;
                        }
                        else{
                            $class = ClassModel::where('name', 'M1 Game Dev')->firstorFail()->id;
                        }
                    }

                    else{
                        if (str_contains($group, 'LEAD DEV')){
                            $class = ClassModel::where('name', 'M2 Lead Dev')->firstorFail()->id;
                        }
                        else{
                            $class = ClassModel::where('name', 'M2 Game Dev')->firstorFail()->id;
                        }
                    }
                }


                User::create([
                    'name' => utf8_encode($data[$key[1]]),
                    'lastname' => utf8_encode($data[$key[0]]),
                    'email' => utf8_encode($data[$key[2]]),
                    'role'=>'student',
                    'class_id' => $class,
                    'phone_number'=>'null',
                    'password' => Hash::make('123456789'),
                ]);
            }
        }

        return redirect()->route('classroom-manager');
    }
}
