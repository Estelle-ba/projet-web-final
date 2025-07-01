@section('title', 'Élection des délégués')


<h1 class="text-2xl font-bold mb-4">Élection des délégués</h1>

<div id="all_representatives">

    {{--Create some card by class with the representative--}}
    @foreach($class_id as $c)
        <div id="representatives{{$c->id}}" class="representative">
            <h2>{{$c->name}} - {{$c->place}} </h2>
            @php

                $rep= $candidats->where('class_id',$c->id);

            @endphp
            @foreach($rep as $candidat)
                @php
                    #Take all the representatives in a class
                    $rep = $alluser->firstWhere('id', $candidat->id_representative);

                    #Take the representative's suppleant
                    $suppleant = $alluser->firstWhere('id', $candidat->id_suppleant);

                    #Take the suppleant's profile picture
                    $pp_suppleant = $profile_picture->firstwhere('user_id', $candidat->id_suppleant);

                @endphp
                <div class="candidate">

                    {{-- Affiche l'avatar ou un placeholder --}}
                    @php
                        $img = $candidat->user && $candidat->user->profileImage
                            ? Storage::url($candidat->user->profileImage->image)
                            : "https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e";
                    @endphp
                    <img
                        src="{{ $img }}"
                        alt="Photo de {{ $candidat->name }} {{ $candidat->lastname }}"
                    >
                    <div class="information">
                        {{-- Bouton qui ouvre la modal vidéo --}}
                        <button
                            class="name hover:underline open-video"
                            data-video-url="{{ $candidat->video_link }}"
                            data-name="{{ $candidat->name }} {{ $candidat->lastname }}"
                            title="{{ $candidat->description }}"
                        >
                        {{ $candidat->name }} {{ $candidat->lastname }}
                        </button>
                        <p>{{$candidat->description}}</p>
                        @if($candidat->suppleant)
                            <div class="suppleant">
                                @if($pp_suppleant== null)
                                    <img
                                        src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                                        alt=""/>
                                @else
                                    <img
                                        src="{{asset('storage/' . $pp_suppleant->image)}}"
                                        alt=""/>
                                @endif
                                <div class="name">
                                    <p>{{ $suppleant->name }} {{ $suppleant->lastname }}</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>


{{-- Bouton “Se présenter” --}}
<div class="fixed_button">
    <button onclick="openModal('modal_candidature')" class="button_computer" >
        Se présenter
    </button>
    <button onclick="openModal('modal_candidature')" class="button_phone">
        Se présenter
    </button>
</div>


{{-- Modal de candidature --}}
<div id="modal_candidature" class="custom-modal">
    <div class="modal-body">
        <h2 class="modal-title ">Candidature délégué</h2>
        <form action="{{ route('election.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <input type="hidden" name="id_representative" value="{{$user->id}}">
                <label class="block mb-1">Nom</label>
                <input  type="hidden" name="lastname" value="{{$user->lastname}}">
                <div class="input" >{{$user->lastname}}</div>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Prénom</label>
                <input type="hidden" name="name" value="{{$user->name}}">
                <div class="input" >{{$user->name}}</div>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Email</label>
                <input type="hidden" name="mail" value="{{$user->email}}">
                <div class="input" >{{$user->email}}</div>
            </div>
            <div class="mb-3">
                <label class="block mb-1">Suppléant</label>
                <select name="id_suppleant">
                    @foreach($alluser as $suppleant)
                        @if($suppleant -> class_id == $user -> class_id && $suppleant -> id != $user -> id)
                            <option value="{{$suppleant->id}}">{{$suppleant->name}} {{$suppleant->lastname}}</option>
                        @endif
                    @endforeach
                </select>

            </div>
            <div class="mb-3">
                <label class="block mb-1">Vidéo de propagande (YouTube URL)</label>
                <input type="url" name="video_link">
            </div>
            <div class="mb-3">
                <label class="block mb-1">Description</label>
                <textarea name="description" class="w-full border px-3 py-2" rows="3" placeholder="Présentez-vous en quelques mots..."></textarea>
            </div>
            <div class="container_button">
                <button type="button" onclick="closeModal('modal_candidature')" class="button_1">Annuler</button>
                <button type="submit" class="button_2">Confirmer</button>
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


@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

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
