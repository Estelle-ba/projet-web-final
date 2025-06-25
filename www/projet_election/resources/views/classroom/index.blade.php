@extends('layouts.app')

@section('content')
    <div class="classroom-admin">
        <div class="left">
            <button onclick="appear('calendar')">Calendrier</button>

            <button class="accordion">Délégués et suppléants</button>
            <div class="panel">
                <button onclick="appear('all_representatives')">Tous les délégués</button>
                @foreach($class_id as $c)
                    <button onclick="appear('representatives{{$c->id}}')">{{$c->name}} - {{$c->place}}</button>
                @endforeach
            </div>

            <button class="accordion">Section 3</button>
            <div class="panel">
                @foreach($class_id as $c)
                    <button>{{$c->name}} - {{$c->place}}</button>
                @endforeach
            </div>
        </div>

        <div class="right">
            @can('isAdmin')
                @include('classroom.new_event')
            @else
                @include('classroom.event')
            @endcan
            @include('classroom.representatives')
            @include('classroom.questions')
        </div>>
    </div>
    @can('isAdmin')
        <form method="GET" action="{{route('generate-pdf')}}">
            <button type="submit"
                    class="fixed bottom-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-700">
                PDF des délégués
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
