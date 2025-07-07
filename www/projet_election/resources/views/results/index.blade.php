@extends('layouts.app')

@section('title', 'Résultats des élections')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Résultats par classe</h1>

        {{-- Intro vidéo overlay --}}
        <div
            id="introOverlay"
            class="fixed inset-0 bg-black flex items-center justify-center z-50"
            style="display:none;"
        >
            <video
                id="resultsVideo"
                src="{{ asset('videos/intro.mov') }}"

                playsinline
                class="fixed inset-0 w-full h-full object-cover"
            ></video>
        </div>

        {{-- Liste des gagnants --}}
        <ul class="space-y-6">
            @foreach($winnersByClass as $classId => $winner)
                <li class="p-4 bg-white rounded shadow flex items-center">
                    {{-- Avatar --}}
                    <img
                        src="{{ optional($winner->user->profileImage)->image ? Storage::url($winner->user->profileImage->image) : asset('images/avatar-placeholder.png') }}"
                        alt="Avatar"
                        class="w-12 h-12 rounded-full mr-4 object-cover"
                    >

                    <div>
                        <div class="font-semibold">
                            Classe {{ $classId }} :
                            {{ $winner->name }} {{ $winner->lastname }}
                            ({{ $winner->votes_count }} voix)
                        </div>
                        @if($winner->suppleant)
                            <div class="text-sm text-gray-600">
                                Suppléant : {{ $winner->suppleant }}
                            </div>
                        @endif
                    </div>
                </li>
            @endforeach
        </ul>


    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const overlay = document.getElementById('introOverlay');
            const video   = document.getElementById('resultsVideo');
            const replay  = document.getElementById('replayIntro');

            function showIntro(muted = true) {
               
                overlay.style.display = 'flex';
                video.currentTime = 0;
                video.play();
            }

            // Première visite ou replay via bouton
            if (!localStorage.getItem('hasSeenResultsIntro')) {
                showIntro(true);
                localStorage.setItem('hasSeenResultsIntro','yes');
            }

            // Autoriser le son au premier clic n'importe où
            document.addEventListener('click', function enableSoundOnce() {
                video.muted = false;
                document.removeEventListener('click', enableSoundOnce);
            }, { once: true });

            // Fin de vidéo : masquer
            video.addEventListener('ended', () => {
                overlay.style.display = 'none';
            });

            // Clic sur l'overlay : pause et cache
            overlay.addEventListener('click', () => {
                video.pause();
                overlay.style.display = 'none';
            });

            // Replay avec son
            replay.addEventListener('click', () => {
                localStorage.removeItem('hasSeenResultsIntro');
                showIntro(false);
            });
        });
    </script>
@endpush
