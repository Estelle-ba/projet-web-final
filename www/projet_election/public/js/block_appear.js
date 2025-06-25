//Function for the modal
let modalOpened = false

function openModal(id) {
    //When the button to activate a modal is clicked and there's not another one opened
    if(modalOpened === false) {
        //The modal will be opened
        document.getElementById(id).style.display = 'block';
        modalOpened = true;
    }
}
function closeModal(id) {
    //When the button to close a modal is clicked, the modal will be closed
    document.getElementById(id).style.display = 'none';
    modalOpened = false;
}



//Function for the showing pages
let old_div;
let new_div;
old_div = document.getElementById('calendar');
let list_element =[];
list_element.push(old_div);

function appear(id){
    //Browse the list of element opened and close it
    for(let i = 0; i < list_element.length; i++) {
        old_div = list_element[i];
        old_div.style.display = 'none';
    }

    //Replace all the element of the list by the one in the representatives one
    if(id === 'all_representatives') {
        list_element = document.getElementsByClassName('representative');
    }

    //Replace all the element of the list by the one in the questions one
    else if(id.includes('all_questions')){

    }

    //Add only one element to the list to open it
    else{
        list_element=[]; //Remove all the element
        new_div = document.getElementById(id);
        list_element.push(new_div); //Add the element in the list
    }

    //Browse the list of element to open and open it
    for(let i = 0; i < list_element.length; i++) {
        new_div = list_element[i];
        new_div.style.display = 'block';
    }
}



//Function for the menu-toggle
let accordion;
let menu_toggle_open = false;
let old_one;

function menu_toggle(id){
    accordion = document.getElementById(id);
    accordion.classList.toggle("active");
    let panel = accordion.nextElementSibling;

    //Close the panel when click again on the acordion
    if (panel.style.display === "block") {
        panel.style.display = "none";
        menu_toggle_open = false;
    }

    //Open the panel when click again on the acordion
    else {
        //If the other one is already open, closed it
        if(menu_toggle_open === true){
            old_one.style.display = "none";
        }
        //Open the panel
        panel.style.display = "block";
        old_one = panel;
        menu_toggle_open = true;
    }
}
