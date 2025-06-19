<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Representative;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    // Affiche la page avec le formulaire et la liste
    public function index()
    {
        $user = auth()->user();
        $alluser = User::all();
        $candidats = Representative::all();
        return view('election.index', compact('candidats', 'user', 'alluser'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'lastname'    => 'required|string|max:255',
            'mail'        => 'required|email|unique:representative,mail',
            'suppleant'   => 'nullable|string|max:255',
            'video_link'  => 'nullable|url',
            'description' => 'nullable|string|max:1000',   // ← ajouté
        ]);
        $class_id = User::all()->where('id', $request-> id_representative)->firstOrFail()->class_id;
        $suppleant= User::all()->where('id', $request-> id_suppleant)->firstOrFail()->name;
        Representative::create([
            'name' => $request-> name,
            'lastname' => $request-> lastname,
            'mail' => $request-> mail,
            'id_representative' => $request-> id_representative,
            'id_suppleant' => $request-> id_suppleant,
            'suppleant' => $suppleant,
            'video_link' => $request-> video_link,
            'description' => $request-> description,
            'class_id' => $class_id,
        ]);

        return redirect()
            ->route('election.index')
            ->with('success','Votre candidature a bien été prise en compte !');
    }


}

