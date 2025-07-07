<div id="all_students">

    {{--Create some card by class with the representative--}}
    @foreach($class_id as $c)
        <div id="students{{$c->id}}" class="students" style="display: none">
            <h2>{{$c->name}} - {{$c->place}} </h2>
            @foreach($alluser as $student)
                @if($student->class_id == $c->id)
                    <li class="flex items-center justify-between p-4 bg-white rounded shadow">
                        <div class="flex items-center">
                            @php
                                $pp_student = $profile_picture->firstwhere('user_id', $student->id);
                            @endphp
                            @if($pp_student == null)
                                <img style="width:2rem; height:2rem"
                                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fvectors%2Fvector-illustration-male-silhouette-profile-picture-with-question-on-vector-id937695038%3Fk%3D20%26m%3D937695038%26s%3D170667a%26w%3D0%26h%3DVwqo48FSEf_hE_ZaESBiEGH6YCbq7n7y6opPpWr1lzg%3D&f=1&nofb=1&ipt=81847cb771d101797b29929664a5ed1b57ef0716efecff7475bb51e2f44d352e"
                                    alt=""/>
                            @else
                                <img style="width:2rem; height:2rem"
                                    src="{{asset('storage/' . $pp_student->image)}}"
                                    alt=""/>
                            @endif
                            <h3>{{$student ->name}} {{$student ->lastname}}</h3>
                        </div>
                    </li>
                @endif
            @endforeach
        </div>
    @endforeach
</div>

<div class="fixed_button" id="button_students" style ="display:none">
    <button class="button_computer" onclick="openModal('add_student')">
        Importer des étudiants
    </button>
    <button class="button_phone" onclick="openModal('add_student')">
        Importer
    </button>
</div>

{{--Modal to change or add a profile picture of the user--}}
<div class="custom-modal" id="add_student" tabindex="-1" role="dialog" aria-labelledby="add_student">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <div class="modal-header">
                <h5 class="modal-title">Choisir un fichier csv</h5>
            </div>
            <form action="{{ route('add_student') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                <label class="block mb-4">
                    <input type="file" name="upload_file"
                           class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                    @error('upload_file')
                    <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </label>
                <div class="container_button">
                    <button type="submit" class="button_1">Ajouter des étudiants</button>
                    <button type="button" class="button_2" onclick="closeModal('add_student')">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>

