@extends('layouts.app')

@section('title', 'Élection des délégués')

@section('content')
    <div class="container mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">Élection des délégués</h1>

        {{-- Liste des candidats --}}
        <ul class="mb-8">
            @foreach($candidats as $candidat)
                <li class="mb-2">
                    <button
                        class="text-blue-600 hover:underline open-video"
                        data-video-url="{{ $candidat->video_link }}"
                        data-name="{{ $candidat->name }} {{ $candidat->lastname }}"
                        title="{{ $candidat->description }}"
                    >
                        {{ $candidat->name }} {{ $candidat->lastname }}
                    </button>
                    @if($candidat->suppleant)
                        &mdash; Suppléant : {{ $candidat->suppleant }}
                    @endif
                </li>
            @endforeach
        </ul>

        {{-- Bouton “Se présenter” --}}
        <button
            id="openModal"
            class="fixed bottom-4 right-4 bg-blue-600 text-white px-4 py-2 rounded-full shadow-lg hover:bg-blue-700"
        >
            Se présenter
        </button>

        {{-- Modal de candidature --}}
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-40">
            <div class="bg-white rounded-lg p-6 w-full max-w-md">
                <h2 class="text-xl font-semibold mb-4">Candidature délégué</h2>
                <form action="{{ route('election.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="block mb-1">Nom</label>
                        <input type="text" name="name" class="w-full border px-3 py-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Prénom</label>
                        <input type="text" name="lastname" class="w-full border px-3 py-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Email</label>
                        <input type="email" name="mail" class="w-full border px-3 py-2" required>
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Suppléant</label>
                        <input type="text" name="suppleant" class="w-full border px-3 py-2">
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Vidéo de propagande (YouTube URL)</label>
                        <input type="url" name="video_link" class="w-full border px-3 py-2">
                    </div>
                    <div class="mb-3">
                        <label class="block mb-1">Description</label>
                        <textarea name="description" class="w-full border px-3 py-2" rows="3" placeholder="Présentez-vous en quelques mots..."></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="mr-2 px-4 py-2">Annuler</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Modal vidéo --}}
        <div
            id="videoModal"
            class="fixed inset-0 bg-black bg-opacity-75 flex items-center justify-center hidden z-50"
        >
            <div class="bg-white rounded-lg overflow-hidden w-full max-w-3xl">
                <div class="flex justify-between items-center p-2 border-b">
                    <h2 id="videoTitle" class="text-lg font-semibold px-4"></h2>
                    <button id="closeVideo" class="text-gray-700 hover:text-gray-900 text-2xl px-4">&times;</button>
                </div>
                <div class="p-4">
                    <div class="relative" style="padding-top:56.25%;">
                        <iframe
                            id="videoFrame"
                            class="absolute top-0 left-0 w-full h-full"
                            src=""
                            frameborder="0"
                            allow="autoplay; encrypted-media"
                            allowfullscreen
                        ></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
