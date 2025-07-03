@extends('layouts.app')

@section('title', 'Vote des délégués')

@section('content')
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Vote des délégués</h1>

        {{-- Overlay plein écran pour la vidéo d’intro --}}
        <div
            id="introOverlay"
            class="fixed inset-0 bg-black flex items-center justify-center z-50"
            style="display:none;"
        >
            <video
                id="introVideo"
                src="{{ asset('videos/intro.mov') }}"
                muted
                playsinline
                class="w-full h-full object-cover"
            ></video>
        </div>

        <ul class="space-y-4">
            @foreach($candidats as $candidat)
                <li class="flex items-center justify-between p-4 bg-white rounded shadow">
                    <div class="flex items-center">
                        {{-- Avatar si besoin --}}
                        <img src="{{ optional($candidat->user->profileImage)->image
                           ? Storage::url($candidat->user->profileImage->image)
                           : asset('images/avatar-placeholder.png') }}"
                             alt="Avatar" class="w-10 h-10 rounded-full mr-3 object-cover">

                        <div>
                            <div class="font-semibold">
                                {{ $candidat->name }} {{ $candidat->lastname }}
                            </div>
                            <div>
                        <span id="votes-{{ $candidat->id }}">
                            {{ $candidat->votes_count }}
                        </span>
                                voix
                            </div>
                        </div>
                    </div>

                    @unless($hasVoted)
                        <button
                            class="vote-button px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700"
                            data-id="{{ $candidat->id }}"
                        >
                            Voter
                        </button>
                    @endunless
                </li>
            @endforeach
        </ul>

    </div>
    <div>
        <button
            id="replayIntro"
            class="fixed bottom-4 right-4 bg-gray-700 text-white text-sm px-2 py-1 rounded-full shadow-lg hover:bg-gray-800"
        >
          intro 🔄
        </button>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const buttons = document.querySelectorAll('.vote-button');
                const token   = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                buttons.forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const repId = btn.dataset.id;
                        if (!confirm('Votre vote est définitif. Confirmer ?')) return;

                        try {
                            const res = await fetch("{{ route('vote.store') }}", {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': token,
                                    'Accept': 'application/json'
                                },
                                body: JSON.stringify({representative_id: repId})
                            });

                            console.log('HTTP status:', res.status);
                            const text = await res.text();
                            console.log('Raw response text:', text);

                            let data;
                            try {
                                data = JSON.parse(text);
                                console.log('Parsed JSON data:', data);
                            } catch (e) {
                                console.error('Erreur JSON.parse:', e);
                                return;
                            }

                            if (data.status === 'ok') {
                                // Récupère le span du candidat voté
                                const span = document.getElementById(`votes-${repId}`);
                                if (span) {
                                    // Parse l'ancienne valeur, ajoute 1, et réécris
                                    const oldCount = parseInt(span.textContent, 10) || 0;
                                    span.textContent = oldCount + 1;
                                }
                                // Puis on fait toujours disparaître les boutons
                                buttons.forEach(b => b.remove());
                                alert('Merci ! Votre vote a été enregistré.');
                            } else {
                                console.warn('Backend returned error status:', data);
                                alert(data.message || 'Erreur lors du vote.');
                            }
                        } catch (err) {
                            console.error('Fetch error:', err);
                            alert('Erreur réseau, veuillez réessayer.');
                        }
                    });
                });
            });
        </script>
       
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    const overlay = document.getElementById('introOverlay');
                    const video   = document.getElementById('introVideo');
                    const replay  = document.getElementById('replayIntro');

                    // Affiche l'overlay et lance la vidéo (muette)
                    function showIntro(muted = true) {
                        video.muted       = muted;
                        overlay.style.display = 'flex';
                        video.currentTime = 0;
                        video.play();
                    }

                    // À la première visite : lance muet
                    if (!localStorage.getItem('hasSeenVoteIntro')) {
                        showIntro(true);
                    }

                    // Quand la vidéo se termine naturellement
                    video.addEventListener('ended', () => {
                        overlay.style.display = 'none';
                        localStorage.setItem('hasSeenVoteIntro','yes');
                    });

                    // Clic sur l’overlay : on coupe la vidéo et on stocke la vue
                    overlay.addEventListener('click', () => {
                        video.pause();
                        overlay.style.display = 'none';
                        localStorage.setItem('hasSeenVoteIntro','yes');
                    });

                    // Bouton “Revoir l’intro” : relance AVEC son
                    replay.addEventListener('click', () => {
                        // On supprime le flag pour rejouer l’intro
                        localStorage.removeItem('hasSeenVoteIntro');
                        // On affiche l'overlay et on lance EN BRUIT
                        showIntro(false);
                    });
                });
            </script>
        @endpush



        @endsection
