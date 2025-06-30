@extends('layouts.app')

@section('content')
    <div class="classroom-admin">
        <div class="left">
            {{--A Menu Toggle that make appears pages--}}
            @can('isAdmin')
            <button class="accordion" onclick="appear('calendar')">Calendrier</button>
            @endcan

            @can('isStudent')
                <button class="accordion" id="accordion_1" onclick="menu_toggle('accordion_1')">Délégués et suppléants</button>
                <div class="panel" id="panel_1">
                    <button class="list_panel" onclick="appear('all_representatives')">Tous les délégués</button>
                    @php
                        $c = $class_id->firstwhere('id', $user -> class_id);
                    @endphp
                    <button class="list_panel" onclick="appear('representatives{{$c->id}}')">{{$c->name}} - {{$c->place}}</button>
                </div>
            @else
            <button class="accordion" id="accordion_1" onclick="menu_toggle('accordion_1')">Délégués et suppléants</button>
            <div class="panel" id="panel_1">
                <button class="list_panel" onclick="appear('all_representatives')">Tous les délégués</button>
                @foreach($class_id as $c)
                    <button class="list_panel" onclick="appear('representatives{{$c->id}}')">{{$c->name}} - {{$c->place}}</button>
                @endforeach
            </div>
            @endcan

            @can('isStudent')
                <button class="accordion" id="accordion_2" onclick="menu_toggle('accordion_2')">Question de la classe</button>
                <div class="panel" id="panel_2">
                    <button class="list_panel" >{{$c->name}} - {{$c->place}}</button>
                </div>
            @else
            <button class="accordion" id="accordion_2" onclick="menu_toggle('accordion_2')">Questions par classe</button>
            <div class="panel" id="panel_2">
                @foreach($class_id as $c)
                    <button class="list_panel" >{{$c->name}} - {{$c->place}}</button>
                @endforeach
            </div>
            @endcan
        </div>

        {{--The pages that appear one by one--}}
        <div class="right">
            {{--A calendar page--}}
            @can('isAdmin')
                @include('classroom.new_event')
            @endcan

            {{--All representatives page--}}
            @can('isStudent')
                @include('election.index')
            @else
                @include('classroom.representatives')
            @endcan

            {{--All questions by student page--}}
            @include('classroom.questions')
        </div>
    </div>

    {{--The button to get all the representative in a pdf--}}
    @can('isStudent')
    @else{{--Only the teacher and the admin can access--}}
        <form method="GET" action="{{route('generate-pdf')}}" class="fixed_button">
            <button type="submit" class="button_computer">
                PDF des délégués
            </button>
            <button type="submit" class="button_phone">
                PDF
            </button>
        </form>
    @endcan
@endsection


@push('scripts')
    <script src="{{ asset('js/block_appear.js') }}"></script>
@endpush
