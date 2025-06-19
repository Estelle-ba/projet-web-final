@extends('layouts.app')

@section('content')
    <div class="account">
        <div class="account_left">
                <img class="photo"
                     src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F46%2F46%2F3f%2F46463f00c0db960a677c04f072238b82.png&f=1&nofb=1&ipt=90013566884dc561ed9ad99c7aafd6c5f33b6ba8fa3a498cf9d36374b375bddf"
                    alt=""/>
                <h1 class="account_left">
                    {{$user->name}} {{$user->lastname}}
                </h1>
            <p class="account_left">
                @if($user->class == null)
                    Gestionnaire
                @else
                    {{$user->class}}
                @endif
            </p>
        </div>
        <div class="account_right">
            <h1>Changement de Theme</h1>
            <button type="submit" type="password" style="width:50%;padding:10px; border-radius: 20px; border: 2px solid #d246a9; background-color: white; text-decoration: none; color:#d246a9" >
                Changer de photo
            </button>
            <form style="width:100%" method="Post" action="{{route('accountlogout')}}" >
                @csrf
                <!-- standard logo -->
                <button type="submit" type="password" style="width:50%;padding:10px; border-radius: 20px; border: 2px solid #d246a9; background-color: white; text-decoration: none; color:#d246a9" >
                    Se déconnecter
                </button>
            </form>
        </div>
    </div>
@endsection
