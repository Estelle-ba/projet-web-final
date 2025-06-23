@extends('layouts.app')

@section('content')
    <div class="account">
        <div class="account_left">
            <img
                 src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fi.pinimg.com%2Foriginals%2F46%2F46%2F3f%2F46463f00c0db960a677c04f072238b82.png&f=1&nofb=1&ipt=90013566884dc561ed9ad99c7aafd6c5f33b6ba8fa3a498cf9d36374b375bddf"
                 alt=""/>
            <h1>
                {{$user->name}} {{$user->lastname}}
            </h1>
            <p>
                @if($user->class_id == null)
                    Gestionnaire
                @else
                    Niveau : {{$class -> name}}
                    <br>Lieu d'étude : {{$class -> place}}
                @endif
            </p>
        </div>
        <div class="account_right">
            <h1>Changement de Theme</h1>
            <div class="change_color">
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
                <button class="color"></button>
            </div>
            <div class="container_button">
                <button type="submit"  class="button_1">
                    Changer de photo
                </button>
                <form  method="Post" action="{{route('accountlogout')}}" class="button_2">
                    @csrf
                    <!-- standard logo -->
                    <button type="submit"  >
                        Se déconnecter
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
