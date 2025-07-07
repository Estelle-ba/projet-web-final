<?php

namespace App\Http\Controllers;

use App\Models\Image_Profile;
use App\Models\Representative;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // Récupère tous les candidats avec leur nombre de votes
        $candidats = Representative::withCount('votes')
            ->orderByDesc('votes_count')
            ->get();
        $picture = Image_Profile::where('user_id', $user->id)->first();
        // Regroupe par classe et prends le premier (max votes) de chaque groupe
        $winnersByClass = $candidats
            ->groupBy('class_id')
            ->map(function($group) {
                return $group->first();
            });

        return view('results.index', [
            'winnersByClass' => $winnersByClass,'picture' => $picture,
        ]);
    }
}
