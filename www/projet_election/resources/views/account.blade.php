@extends('layouts.app')

@section('content')
    <div class="account">

        {{--The important information of the user--}}
        <div class="account_left">

            {{--Take the user's profile picture or put a default one if there's no one--}}
            @if($picture == null)
                <img
                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                    alt=""/>
            @else()
                <img
                    src="{{asset('storage/' . $picture->image)}}"
                    alt=""/>
            @endif
            <h1>
                {{$user->name}} {{$user->lastname}}
            </h1>
            <p>
                @can('isAdmin')
                    Gestionnaire
                @elsecan('isStudent')
                    Niveau : {{$class -> name}}
                    <br>Lieu d'étude : {{$class -> place}}
                @elsecan('isTeacher')
                    Professeur
                @endcan
            </p>
        </div>

        <div class="account_right">

            {{--A color palette to change the color of the website--}}
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
                {{--Button to change or add a profile picture of the user--}}
                <button class="button_1" onclick="openModal('change_profile_picture')">
                    Changer de photo
                </button>

                {{--Button to logout--}}
                <form  method="Post" action="{{route('logout')}}" class="button_2">
                    @csrf
                    <!-- standard logo -->
                    <button type="submit"  >
                        Se déconnecter
                    </button>
                </form>
            </div>
        <div>
    </div>
</div>


{{--Modal to change or add a profile picture of the user--}}
<div class="custom-modal" id="change_profile_picture" tabindex="-1" role="dialog" aria-labelledby="change_profile_picture">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Choisir une image</h5>
            </div>
            <form action="{{ route('upload_image') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                <label class="block mb-4">
                    <input type="hidden" name="user_id" value="{{$user->id}}">
                    <input type="file" name="image"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    @error('image')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </label>
                <div class="container_button">
                    <button type="submit" class="button_1">Changer de photo</button>
                    <button type="button" class="button_2" onclick="closeModal('change_profile_picture')">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="{{ asset('js/block_appear.js') }}"></script>
@endpush
