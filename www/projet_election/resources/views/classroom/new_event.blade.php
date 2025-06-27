<div id="calendar" >
    {{--The script calendar.js create all the calendar--}}}
    <div id="calendar"></div>
</div>

{{--The modal to create an event--}}
<div class="custom-modal" id="new_event" tabindex="-1" role="dialog" aria-labelledby="new_event">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <form id="form" action="{{ route('upload_image') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                <select name="test">
                    <option value="type"></option>
                    <option>American Black Bear</option>
                    <option>Asiatic Black Bear</option>
                    <option>Brown Bear</option>
                    <option>Giant Panda</option>
                    <option>Sloth Bear</option>
                    <option>Sun Bear</option>
                    <option>Polar Bear</option>
                    <option>Spectacled Bear</option>
                </select>
                <div class="container_button">
                    <button type="" class="button_1">Ajouter</button>
                    <button type="button" class="button_2" onclick="calendarCloseModal('new_event')">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
