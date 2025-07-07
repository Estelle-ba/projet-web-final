<?php

namespace App\Http\Controllers;

use App\Models\Image_Profile;
use App\Models\Representative;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    // Page de vote
    public function index()
    {
        $user = auth()->user();

        //If the user is not connected, he is redirected to the welcome page
        if($user == null){
            return redirect()->route('/');
        }
        else if($this->authorize('view', Representative::class) == false){
            return redirect()->route('classroom-manager');
        }

        $candidats = Representative::withCount('votes')->get();
        $hasVoted  = Auth::user()->vote()->exists();
        $picture = Image_Profile::where('user_id', $user->id)->first();


        return view('vote.index', compact('user','candidats','hasVoted', 'picture'));
    }

    // Enregistrer un vote via AJAX
    public function store(Request $request)
    {
        $request->validate([
            'representative_id' => 'required|exists:representative,id',
        ]);

        $user = Auth::user();
        if($this->authorize('view', Representative::class) == false){
            return redirect()->route('classroom-manager');
        }


        // Empêcher plus d'un vote
        if ($user->vote) {
            return response()->json([
                'status'=>'error',
                'message'=>'Vous avez déjà voté.'
            ], 403);
        }

        Vote::create([
            'user_id'            => $user->id,
            'representative_id'  => $request->representative_id,
        ]);

        // Renvoyer les nouveaux comptes
        $counts = Representative::withCount('votes')->pluck('votes_count','id');

        return response()->json([
            'status' => 'ok',
            'counts' => $counts,
        ]);
    }
}
