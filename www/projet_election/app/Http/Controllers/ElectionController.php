<?php

namespace App\Http\Controllers;

use App\Models\Representative;
use Illuminate\Http\Request;

class ElectionController extends Controller
{
    // Affiche la page avec le formulaire et la liste
    public function index()
    {
        $candidats = Representative::all();
        return view('election.index', compact('candidats'));
    }



// use App\Models\User;           // <-- à retirer si présent

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string',
            'lastname'   => 'required|string',
            'mail'       => 'required|email|unique:representative,mail',
            'suppleant'  => 'nullable|string',
            'video_link' => 'nullable|url',
        ]);

        // Crée bien un Representative, pas un User
        Representative::create($request->only([
            'name','lastname','mail','suppleant','video_link','class_id'
        ]));

        return redirect()->route('election.index')
            ->with('success','Candidature enregistrée !');
    }

}

