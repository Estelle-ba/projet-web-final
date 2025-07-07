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
let list_element= document.getElementsByClassName('representative');

function appear(id){
    //Browse the list of element opened and close it
    for(let i = 0; i < list_element.length; i++) {
        old_div = list_element[i];
        old_div.style.display = 'none';
    }

    //Replace all the element of the list by the one in the representatives one
    if(id === 'all_representatives') {
        list_element = Array.from(document.getElementsByClassName('representative'));
        new_div = document.getElementById('button_representatives');
        list_element.push(new_div);
    }

    //Replace all the element of the list by the one in the questions one
    else if(id.includes('all_students')){
        list_element = Array.from(document.getElementsByClassName('students'));
        new_div = document.getElementById('button_students');
        list_element.push(new_div);
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

let all=[];
let eventpeople=[];
let element;
let form = document.getElementById('form');
let temp;

function event_change(select){
    let id = select.value;
    for(let i = 0; i < all.length; i++) {
        element = all[i];
        element.style.display = 'none';
    }
    all=[];
    switch(id){
        case 'meeting':
            temp = form.querySelector('[id = people_type]');
            temp.style.display = 'block';
            all.push(temp);
            temp = form.querySelectorAll('[class = other]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }

            temp = form.querySelector('[id = select_hour]');
            temp.style.display = 'block';
            all.push(temp);

            temp = form.querySelectorAll('[class = hour]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }

            break;
        case 'class_council':
            temp = form.querySelector('[id = people_type]');
            temp.style.display = 'block';
            all.push(temp);
            temp = form.querySelector('[id = select_hour]');
            temp.style.display = 'block';
            all.push(temp);
            temp = form.querySelectorAll('[class = hour]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }
            break;
        case 'delegate_election':
            temp = form.querySelector('[id = attention]');
            temp.style.display = 'block';
            all.push(temp);
            all.push(temp);
            temp = form.querySelectorAll('[class = day]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }
            break;
        default:
            temp = form.querySelector('[id = people_type]');
            temp.style.display = 'block';
            temp = form.querySelector('[id = other_thing]');
            temp.style.display = 'block';
            all.push(temp);
            temp = form.querySelectorAll('[class = other]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }
            temp = form.querySelector('[id = select_hour]');
            temp.style.display = 'block';
            all.push(temp);
            temp = form.querySelectorAll('[class = hour]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }
            temp = form.querySelectorAll('[class = day]');
            for(let i = 0; i < temp.length; i++) {
                element = temp[i];
                element.style.display = 'block';
                all.push(element);
            }
            break;

    }
}

function people_change(select){
    let id = select.value;
    for(let i = 0; i < eventpeople.length; i++) {
        element = eventpeople[i];
        element.style.display = 'none';
    }
    eventpeople=[];
    switch(id){
        case 'admin':
            element = form.querySelector('[id = manager]');
            console.log(element);
            element.style.display = 'block';
            all.push(element);
            eventpeople.push(element);
            break;
        case 'teacher':
            element = form.querySelector('[id = teacher]');
            console.log(element);
            element.style.display = 'block';
            all.push(element);
            eventpeople.push(element);
            break;
        case 'representative':
            element = form.querySelector('[id = representative]');
            element.style.display = 'block';
            all.push(element);
            eventpeople.push(element);
            break;
        case 'class':
            element = form.querySelector('[id = class]');
            element.style.display = 'block';
            all.push(element);
            eventpeople.push(element);
            break;
        case 'student':
            element = form.querySelector('[id = student]');
            element.style.display = 'block';
            all.push(element);
            eventpeople.push(element);
            break;
        default:
            break;
    }
}
