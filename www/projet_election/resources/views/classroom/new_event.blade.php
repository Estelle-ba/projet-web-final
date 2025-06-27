<div id="calendar" >
    {{--The script calendar.js create all the calendar--}}}
    <div id="calendar"></div>
</div>

{{--The modal to create an event--}}
<div class="custom-modal" id="new_event" tabindex="-1" role="dialog" aria-labelledby="new_event">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <form id="form" action="{{ route('add_event') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                <h5>Créer un évènement de type :</h5>
                <select name="event_type" onchange="event_change(this)">
                    <option value="" disabled selected>Evenement de type</option>
                    <option value="meeting">Réunion</option>
                    <option value="class_council">Conseille de classe</option>
                    <option value="delegate_election">Election des délégués</option>
                    <option value="Other_event">Autre</option>
                </select>

                <div id="other_thing" style="display:none">
                    <h5>Créer un évènement pour titre :</h5>
                    <input type="text" name="event_name">
                </div>

                <div id="people_type" style="display:none">
                    <h5>Créer un évènement comme personnes :</h5>
                    <select name="people_type" onchange="people_change(this)">
                        <option value="" disabled selected>Ajouter à l'évènement</option>
                        <option class="other" style="display:none" value="everybody">Tout le monde</option>

                        <option class="other" style="display:none" value="allManager">Tous les gestionnaire</option>
                        <option class="other" style="display:none" value="admin">Un gestionnaire</option>

                        <option class="other" style="display:none" value="allTeacher">Tous les professeur</option>
                        <option class="other" style="display:none" value="teacher">Un professeur</option>

                        <option value="allRepresentative">Tous les délégués et suppléants</option>
                        <option value="representative">un délégue et son supléant</option>

                        <option class="other" style="display:none" value="allClass">Toutes les classe</option>
                        <option class="other" style="display:none" value="class">Une classe</option>

                        <option class="other" style="display:none" value="allStudent">Toutes les élèves</option>
                        <option class="other" style="display:none" value="student">Un élève</option>
                    </select>
                </div>

                <div id="manager" style="display:none">
                    <h5>Créer un évènement avec :</h5>
                    <select name="people">
                        <option value="" disabled selected>Ajouter cette personne l'évènement</option>
                        @foreach($alluser as $users)
                            @if($users->role == 'manager' & $user->id != $users->id)
                                <option value="{{$users->id}}">{{$users->name}} {{$users->lastname}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div id="teacher" style="display:none">
                    <h5>Créer un évènement avec :</h5>
                    <select name="people">
                        <option value="" disabled selected>Ajouter cette personne l'évènement</option>
                        @foreach($alluser as $users)
                            @if($users->role == 'teacher')
                                <option value="{{$users->id}}">{{$users->name}} {{$users->lastname}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div id="representative" style="display:none">
                    <h5>Créer un évènement avec :</h5>
                    <select name="people" >
                        <option value="" disabled selected>Ajouter cette classe l'évènement</option>
                        @foreach($representative as $r)
                            @php
                                $rep=$alluser->firstwhere('id', $r-> id_representative);
                                $sup=$alluser->firstwhere('id', $r-> id_suppleant);
                            @endphp
                            <option value="{{$r->id}}">{{$rep->name}} {{$rep->lastname}} et {{$sup->name}} {{$sup->lastname}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="class" style="display:none">
                    <h5>Créer un évènement avec :</h5>
                    <select name="people" >
                        <option value="" disabled selected>Ajouter cette classe l'évènement</option>
                        @foreach($class_id as $class)
                            <option value="{{$class->id}}">{{$class->name}} {{$class->place}}</option>
                        @endforeach
                    </select>
                </div>
                <div id="student" style="display:none">
                    <h5>Créer un évènement avec :</h5>
                    <select name="people" >
                        <option value="" disabled selected>Ajouter cette personne l'évènement</option>
                        @foreach($alluser as $users)
                            @if($users->role == 'student')
                                <option value="{{$users->id}}">{{$users->name}} {{$users->lastname}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div id="select_hour" style="display:none">
                    <h5>Créer un évènement commençant à :</h5>
                    <input type="time" id="appt" name="hour">
                </div>

                <div id="attention" style="display:none">
                    <p style="color:red">&#9888 Attention la durée de l'évènement représentera la durée égal phase de l'élection :
                        la phase de proposition et la phase de présentation. &#9888</p>
                </div>
                <div id="duration">
                    <h5>Créer un évènement d'une durée de :</h5>
                    <select name="duration">
                        <option value="" disabled selected>Ajouter une durée à l'évènement</option>
                        <option class="hour" value="1" style="display:none">1 heure</option>
                        <option class="hour" value="2" style="display:none">2 heures</option>
                        <option class="hour" value="3" style="display:none">3 heures</option>
                        <option class="hour" value="4" style="display:none">4 heures</option>
                        <option class="hour" value="5" style="display:none">5 heures</option>
                        <option class="hour" value="6" style="display:none">6 heures</option>
                        <option class="hour" value="7" style="display:none">7 heures</option>
                        <option class="hour" value="8r" style="display:none">8 heures</option>
                        <option class="hour" value="9" style="display:none">9 heures</option>
                        <option class="hour" value="10" style="display:none">10 heures</option>

                        <option class="day" value="100" style="display:none">1 jour</option>
                        <option class="day" value="200" style="display:none">2 jours</option>
                        <option class="day" value="300" style="display:none">3 jours</option>
                        <option class="day" value="400" style="display:none">4 jours</option>
                        <option class="day" value="500" style="display:none">5 jours</option>
                        <option class="day" value="600" style="display:none">6 jours</option>
                        <option class="day" value="700" style="display:none">7 jours</option>
                        <option class="day" value="800" style="display:none">8 jours</option>
                        <option class="day" value="900" style="display:none">9 jours</option>
                        <option class="day" value="1000" style="display:none">10 jours</option>
                        <option class="day" value="1100" style="display:none">11 jours</option>
                        <option class="day" value="1200" style="display:none">12 jours</option>
                        <option class="day" value="1300" style="display:none">13 jours</option>
                        <option class="day" value="1400" style="display:none">14 jours</option>
                    </select>
                </div>
                <div class="container_button">
                    <button type="" class="button_1">Ajouter</button>
                    <button type="button" class="button_2" onclick="calendarCloseModal('new_event')">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
