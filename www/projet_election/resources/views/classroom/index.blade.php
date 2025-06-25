@extends('layouts.app')

@section('content')
    <div class="classroom-admin">
        <div class="left">
            {{--A Menu Toggle that make appears pages--}}
            <button class="accordion" onclick="appear('calendar')">Calendrier</button>

            <button class="accordion" id="accordion_1" onclick="menu_toggle('accordion_1')">Délégués et suppléants</button>
            <div class="panel" id="panel_1">
                <button class="list_panel" onclick="appear('all_representatives')">Tous les délégués</button>
                @foreach($class_id as $c)
                    <button class="list_panel" onclick="appear('representatives{{$c->id}}')">{{$c->name}} - {{$c->place}}</button>
                @endforeach
            </div>

            <button class="accordion" id="accordion_2" onclick="menu_toggle('accordion_2')">Questions par classe</button>
            <div class="panel" id="panel_2">
                @foreach($class_id as $c)
                    <button class="list_panel" >{{$c->name}} - {{$c->place}}</button>
                @endforeach
            </div>
        </div>

        {{--The pages that appear one by one--}}
        <div class="right">
            {{--A calendar page--}}
            @can('isAdmin')
                @include('classroom.new_event')
            @else
                @include('classroom.event')
            @endcan

            {{--All representatives page--}}
            @include('classroom.representatives')

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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Modal de candidature
            const modal       = document.getElementById('modal');
            const openModal   = document.getElementById('openModal');
            const closeModal  = document.getElementById('closeModal');

            openModal.addEventListener('click', () => modal.classList.remove('hidden'));
            closeModal.addEventListener('click', () => modal.classList.add('hidden'));
            modal.addEventListener('click', (e) => {
                if (e.target === modal) closeModal.click();
            });

            // Modal vidéo
            const videoModal  = document.getElementById('videoModal');
            const videoFrame  = document.getElementById('videoFrame');
            const closeVideo  = document.getElementById('closeVideo');
            const videoTitle  = document.getElementById('videoTitle');
            const triggers    = document.querySelectorAll('.open-video');

            triggers.forEach(btn => {
                btn.addEventListener('click', () => {
                    let url      = btn.dataset.videoUrl;
                    let name     = btn.dataset.name;
                    let videoId  = '';

                    if (url.includes('youtu.be/')) {
                        videoId = url.split('youtu.be/')[1].split(/[\?&]/)[0];
                    } else if (url.includes('watch?v=')) {
                        videoId = url.split('watch?v=')[1].split('&')[0];
                    }

                    videoTitle.textContent = name;
                    videoFrame.src        = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
                    videoModal.classList.remove('hidden');
                });
            });

            closeVideo.addEventListener('click', () => {
                videoModal.classList.add('hidden');
                videoFrame.src = '';
            });

            videoModal.addEventListener('click', (e) => {
                if (e.target === videoModal) closeVideo.click();
            });
        });
    </script>
@endpush
