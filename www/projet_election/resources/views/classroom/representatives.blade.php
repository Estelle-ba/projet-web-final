<div id="all_representatives">

    {{--Create some card by class with the representative--}}
    @foreach($class_id as $c)
        <div id="representatives{{$c->id}}" class="representative">
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
                    {{--Take the representative's profile picture or put a default one if there's no one--}}
                    @if($pp_candidate == null)
                        <img
                            src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                            alt=""/>
                    @else
                        <img
                            src="{{asset('storage/' . $pp_candidate->image)}}"
                            alt=""/>
                    @endif


                    {{--List all the information to know by the representative--}}
                    <div class="information">
                        <h3>{{ $candidate->name }} {{ $candidate->lastname }}</h3>
                        <p>{{$r->description}}</p>

                        {{--List the information to know by the substitute--}}
                        <div class="suppleant">
                            {{--Take the substitute's profile picture or put a default one if there's no one--}}
                            @if($pp_suppleant== null)
                                <img
                                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                                    alt=""/>
                            @else
                                <img
                                    src="{{asset('storage/' . $pp_suppleant->image)}}"
                                    alt=""/>
                            @endif
                            {{--Take the name and the first name of the substitute--}}
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
