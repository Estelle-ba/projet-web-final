@extends('layouts.app')

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
                    <a href="{{ $candidat->video_link }}" target="_blank" class="text-blue-600 hover:underline">
                        {{ $candidat->name }} {{ $candidat->lastname }}
                    </a>
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

        {{-- Modal --}}
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
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

                    <div class="flex justify-end">
                        <button type="button" id="closeModal" class="mr-2 px-4 py-2">Annuler</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Confirmer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script pour ouvrir/fermer la modal --}}
    <script>
        const modal      = document.getElementById('modal');
        const openModal  = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');

        openModal.addEventListener('click', () => modal.classList.remove('hidden'));
        closeModal.addEventListener('click', () => modal.classList.add('hidden'));
    </script>
@endsection
