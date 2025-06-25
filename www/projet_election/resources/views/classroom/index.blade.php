@extends('layouts.app')

@section('content')
    <div class="classroom-admin">
        <div class="left">
        </div>
        @can('isAdmin')
            @include('classroom.new_event')
        @endcan
        @include('classroom.representatives')
        @include('classroom.questions')
    </div>
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
