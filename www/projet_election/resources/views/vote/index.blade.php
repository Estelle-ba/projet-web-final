@extends('layouts.app')

@section('title', 'Vote des délégués')

@section('content')
    <div class="container mx-auto p-4">



<?php
use Carbon\Carbon;

// Date actuelle
$now = Carbon::now('Europe/Paris');

// Date de fin

$date_end_raw = \App\Models\Event::where('type_event', 'representatives_election')->value('date_end');
$date_end = Carbon::parse($date_end_raw, 'Europe/Paris');

$date_raw = \App\Models\Event::where('type_event', 'representatives_election')->value('date_beggining');
$date = Carbon::parse($date_raw, 'Europe/Paris');

// Différence entre maintenant et la date de fin
$diff = $now->diff($date_end);

// Affichage formaté

?>



<div id="date">Chargement...</div>
<div id="countdown">Chargement...</div>

    <script>
        //afichage date
        function formatDate(date) {
        const mois = [
            "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
            "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
        ];

        const jour = date.getDate();
        const moisNom = mois[date.getMonth()];
        const annee = date.getFullYear();

        const heures = String(date.getHours()).padStart(2, '0');
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const secondes = String(date.getSeconds()).padStart(2, '0');

        return `${jour} ${moisNom} ${annee} ${heures}:${minutes}:${secondes}`;
    }




        // Date de fin JavaScript
        const finishTime = new Date("{{ $date_end->toIso8601String() }}");
        const start = new Date("{{ $date->toIso8601String() }}");
        const now = new Date("{{ $now->toIso8601String() }}");

        if(now<start){
            window.location.href = '/home';
        }

        function updateCountdown() {
            const now = new Date();
            document.getElementById('date').innerText = formatDate(now);
            const diffMs = finishTime - now;

            if (diffMs <= 0) {
                document.getElementById('countdown').innerText = "Événement terminé.";
                clearInterval(interval);
                window.location.href = '/results'; //page fin de lelection a rentrer
                return;
            }

            const seconds = Math.floor(diffMs / 1000);
            const days = Math.floor(seconds / (3600 * 24));
            const hours = Math.floor((seconds % (3600 * 24)) / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const secs = seconds % 60;

            document.getElementById('countdown').innerText =
                `${String(days).padStart(2, '0')} jours, ` +
                `${String(hours).padStart(2, '0')} heures, ` +
                `${String(minutes).padStart(2, '0')} minutes, ` +
                `${String(secs).padStart(2, '0')} secondes`;
        }

        const interval = setInterval(updateCountdown, 1000);
        updateCountdown(); // Lancer immédiatement
    </script>












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
                autoplay
                playsinline
                class="w-full h-full object-cover"
            ></video>
        </div>

        <ul class="space-y-4">
            @foreach($candidats as $candidat)
                @if($candidat -> class_id == $user->class_id)
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
                @endif
            @endforeach
        </ul>

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

                    // Si jamais on n'a pas encore vu l'intro
                    if (!localStorage.getItem('hasSeenVoteIntro')) {
                        overlay.style.display = 'flex';

                        // Quand la vidéo se termine, on cache l'overlay et on mémorise
                        video.addEventListener('ended', () => {
                            overlay.style.display = 'none';
                            localStorage.setItem('hasSeenVoteIntro', 'yes');
                        });

                        // En cas de clic sur l'écran, on peut aussi passer l'intro
                        overlay.addEventListener('click', () => {
                            video.pause();
                            overlay.style.display = 'none';
                            localStorage.setItem('hasSeenVoteIntro', 'yes');
                        });
                    }
                });
            </script>

        @endpush



        @endsection
