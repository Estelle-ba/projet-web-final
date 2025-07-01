@extends('layouts.app')

@section('content')
    <div class="on verra">
        @foreach($class_id as $c)
            <div class="class">
                <h2>{{$c->name}} {{$c->place}}</h2>
                 @php
                     $student=$all_student->where('class_id',$c->id);
                 @endphp
                @foreach($student as $s)
                    <div class="student">
                        @php
                            $pp_student = $profile_picture->firstwhere('user_id', $s->id);
                        @endphp
                        @if($pp_student == null)
                            <img
                                src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                                alt=""/>
                        @else
                            <img
                                src="{{asset('storage/' . $pp_student->image)}}"
                                alt=""/>
                        @endif
                        {{--List all the information to know by the representative--}}
                        <div class="information">
                            <h3>{{ $s->name }} {{ $s->lastname }}</h3>
                        </div>
                    </div>

                @endforeach
            </div>
        @endforeach
    </div>
    <div class="fixed_button">
        <button class="button_computer" onclick="openModal('add_student')">
            PDF des délégués
        </button>
        <button class="button_phone" onclick="openModal('add_student')">
            PDF
        </button>
    </div>

    {{--Modal to change or add a profile picture of the user--}}
    <div class="custom-modal" id="add_student" tabindex="-1" role="dialog" aria-labelledby="add_student">
        <div class="modal-dialog " role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title">Choisir une image</h5>
                </div>
                <form action="{{ route('add_student') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                    @csrf
                    <label class="block mb-4">
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="file" name="csv"
                               class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                        @error('csv')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                        @enderror
                    </label>
                    <div class="container_button">
                        <button type="submit" class="button_1">Changer de photo</button>
                        <button type="button" class="button_2" onclick="closeModal('add_student')">Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/block_appear.js') }}"></script>
@endpush
