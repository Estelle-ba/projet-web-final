<div id="calendar" >
    <div id="calendar"></div>

</div>
<div class="custom-modal" id="new_event" tabindex="-1" role="dialog" aria-labelledby="new_event">
    <div class="modal-dialog " role="document">
        <div class="modal-content" >
            <form id="form" action="{{ route('upload_image') }}" method="POST" class="shadow p-12" enctype="multipart/form-data">
                @csrf
                <div class="container_button">
                    <button type="" class="button_1">Ajouter l'évènement</button>
                    <button class="button_2" onclick="calendarCloseModal('new_event')">Fermer</button>
                </div>
            </form>
        </div>
    </div>
</div>
