<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Image_Profile;
use App\Models\Representative;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

class classroomController extends Controller
{
    //Function to go to the classroom page
    public function index()
    {
        //Find the actual user
        $user = Auth::user();

        //If the user is not connected, he is redirected to the welcome page
        if ($user == null) {
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

    public function add_event(request $request)
    {
        //Find the actual user
        $user = Auth::user();
        //If the user is not connected, he is redirected to the welcome page
        if ($user == null) {
            return redirect()->route('/');
        }

        $request->validate([
            'event_type' => 'required|string|max:255',
            'duration' => 'required|string|max:255',
        ]);

        $people = $request->people;
        $people_type = $request->people_type;
        $event_type = $request->event_type;
        $duration = $request->duration;
        $date = $request->date;
        $hour = $request->hour;

        if (($duration / 100) >= 1) {
            $new_duration = $duration / 100;
            $new_duration *= 24;
        } else {
            $new_duration = $duration;
        }
        if(str_contains($people, 'all')){
            $list = [$people_type];
        }
        else{
            $list = [$people];
        }

        if ($event_type == 'delegate_election') {
            if (($duration / 100) >= 1) {

                $start_date = $date . ' 09:00:00';
                $propaganda_date = date('Y-m-d H:i:s', strtotime('+' . $new_duration . ' hour', strtotime($start_date)));
                $election_date = date('Y-m-d H:i:s', strtotime('+' . $new_duration . ' hour', strtotime($propaganda_date)));
                $new_duration += 6;
                $end_date = date('Y-m-d H:i:s', strtotime('+' . $new_duration . ' hour', strtotime($propaganda_date)));

                $people_type = "allStudent";
                $list = [$people_type];

                Event::create([
                    'user_id' => $user->id,
                    'type_event' => "representatives_proposition",
                    'date_beggining' => $start_date,
                    'date_end' => $propaganda_date,
                    'people' => json_encode($list),
                ]);
                Event::create([
                    'user_id' => $user->id,
                    'type_event' => "representatives_presentation",
                    'date_beggining' => $propaganda_date,
                    'date_end' => $election_date,
                    'people' => json_encode($list),
                ]);
                Event::create([
                    'user_id' => $user->id,
                    'type_event' => "representatives_election",
                    'date_beggining' => $election_date,
                    'date_end' => $end_date,
                    'people' => json_encode($list),
                ]);

            }
        } else {
            $request->validate([
                'people_type' => 'required|string|max:255',
                'people' => 'required|string|max:255',
                'hour' => 'required',
            ]);

            $start_date = $date . ' ' . $hour . ':00';
            $end_date = date('Y-m-d H:i:s', strtotime('+' . $new_duration . ' hour', strtotime($start_date)));

            if ($event_type === 'meeting') {

                if ($people_type === 'representative') {
                    $representative = Representative::where('id', $people)->first();
                    $rep = User::where('id', $representative->id_representative)->firstOrFail();
                    $sup = User::where('id', $representative->id_suppleant)->firstOrFail();
                    $list = [$rep, $sup];
                }

                if (($duration/100) < 1) {
                    Event::create([
                        'user_id' => $user->id,
                        'type_event' => $event_type,
                        'date_beggining' => $start_date,
                        'date_end' => $end_date,
                        'people' => json_encode($list),
                    ]);
                }
            }
            else if ($event_type === 'class_council') {
                if ($people_type === 'allRepresentative' || $people_type === 'representative') {
                    if ($people_type === 'representative') {
                        $representative = Representative::where('id', $people)->first();
                        $rep = User::where('id', $representative->id_representative)->firstOrFail();
                        $sup = User::where('id', $representative->id_suppleant)->firstOrFail();
                        $list = [$rep->id, $sup->id, 'allTeacher'];
                    }
                    else {
                        $list = ['allTeacher', 'allRepresentative'];
                    }
                    if (($duration/100) < 1) {
                        Event::create([
                            'user_id' => $user->id,
                            'type_event' => $event_type,
                            'date_beggining' => $start_date,
                            'date_end' => $end_date,
                            'people' => json_encode($list),
                        ]);
                    }
                }
            }
            else {
                $request->validate([
                    'event_name' => 'required|string|max:255',
                ]);

                Event::create([
                    'user_id' => $user->id,
                    'type_event' => $request->event_name,
                    'date_beggining' => $date,
                    'date_end' => $end_date,
                    'people' => json_encode($list),
                ]);

            }
        }

        return redirect()->route('classroom-manager');
    }
}

