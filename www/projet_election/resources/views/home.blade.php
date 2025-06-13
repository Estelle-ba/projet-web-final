@extends('layouts.app')

@section('content')
    <div style="background-image: linear-gradient(to bottom, #8f0868 , #650da3); padding:5%">
        <img style="float:right; margin-right: 20px"
             src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fzionkabbalah.com%2Fwp-content%2Fuploads%2F2020%2F01%2FShrek.jpg&f=1&nofb=1&ipt=333ec5de3a9189ae7ca30d745561a629b568c02250003a47209e19c1953ef744"
             width="40%" alt="Se connecter"/>
        <h1 style="color:white; font-size: 40px">Bienvenue
            <br>{{$user->name}} {{$user->lastname}}</h1>
        <div style="color:white">
            <p style="width:40%; font-size: 20px">Voyage désormais dans ta magnifique aventure d'étudiant à la coding Factory.
                Tu deviendras le mailleur codeur et entrepeneur.
            <br>Que la force soit avec toi jeune padawan</p>
        </div>

    </div>
@endsection
