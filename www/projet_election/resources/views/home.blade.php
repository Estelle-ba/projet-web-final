@extends('layouts.app')

@section('content')
    <div class="presentation_home">
        <div class="left">
            <h1>Bienvenue {{$user->name}} {{$user->lastname}}</h1>
        </div>
        <img class="right"
             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fzionkabbalah.com%2Fwp-content%2Fuploads%2F2020%2F01%2FShrek.jpg&f=1&nofb=1&ipt=333ec5de3a9189ae7ca30d745561a629b568c02250003a47209e19c1953ef744"
             alt="Se connecter"/>
        <div class="left">
            <p>Voyage désormais dans ta magnifique aventure d'étudiant à la coding Factory.
                Tu deviendras le meilleur codeur et entrepeneur.
            <br>Que la force soit avec toi jeune padawan</p>
        </div>

    </div>
@endsection
