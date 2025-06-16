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

        Representative::create(
            $request->only([
                'name',
                'lastname',
                'mail',
                'suppleant',
                'video_link',
                'description',
                'class_id',
            ])
        );

        return redirect()
            ->route('election.index')
            ->with('success','Votre candidature a bien été prise en compte !');
    }


}

