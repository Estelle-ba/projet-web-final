<div id="all_representatives">
        @foreach($class_id as $c)
            <div id="representatives{{$c->id}}" class="representative" style="display:none">
                <h2>{{$c->name}} - {{$c->place}} </h2>
                @php

                    $rep=$representative->where('class_id',$c->id);

                @endphp
                @foreach($rep as $r)
                    @php
                        #Take all the representatives in a class
                        $candidate = $alluser->firstwhere('id', $r->id_representative);

                        #Take the representative's suppleant
                        $suppleant = $alluser->firstWhere('id', $r->id_suppleant);

                        #Take the representative's profile picture
                        $pp_candidate = $profile_picture->firstwhere('user_id', $r->id_representative);

                        #Take the suppleant's profile picture
                        $pp_suppleant = $profile_picture->firstwhere('user_id', $r->id_suppleant);
                    @endphp
                    <div class="candidate">
                        <button
                            class="text-blue-600 hover:underline open-video"
                            data-video-url="{{ $candidate->video_link }}"
                            data-name="{{ $candidate->name }} {{ $candidate->lastname }}"
                            title="{{ $candidate->description }}"
                        >
                            @if($pp_candidate == null)
                                <img
                                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                                    alt=""/>
                            @else
                                <img
                                    src="{{asset('storage/' . $pp_candidate->image)}}"
                                    alt=""/>
                            @endif
                        </button>
                        <div class="information">
                            <h3>{{ $candidate->name }} {{ $candidate->lastname }}</h3>
                            <p>{{$r->description}}</p>
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
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach

</div>


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
