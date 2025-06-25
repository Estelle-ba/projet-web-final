let modalOpened = false

function openModal(id) {
    if(modalOpened == false) {
        document.getElementById(id).style.display = 'block';
        modalOpened = true;
    }
}

function closeModal(id) {
    document.getElementById(id).style.display = 'none';
    modalOpened = false;
}

let old_one;

function appear(id){
    if(old_one.isNull == false){
        document.getElementById(old_one).style.display = 'none';
    }
    old_one = id;
    document.getElementById(old_one).style.display = 'block';
}
