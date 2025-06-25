let modalOpened = false

function openModal(id) {
    if(modalOpened === false) {
        document.getElementById(id).style.display = 'block';
        modalOpened = true;
    }
}
function closeModal(id) {
    document.getElementById(id).style.display = 'none';
    modalOpened = false;
}


let old_div;
let new_div;
old_div = document.getElementById('calendar');
let list_element =[];
list_element.push(old_div);



function appear(id){
    for(let i = 0; i < list_element.length; i++) {
        old_div = list_element[i];
        old_div.style.display = 'none';
    }

    if(id === 'all_representatives') {
        list_element = document.getElementsByClassName('representative');
    }
    else if(id.includes('all_questions')){

    }
    else{
        list_element=[];
        new_div = document.getElementById(id);
        list_element.push(new_div);
    }
    for(let i = 0; i < list_element.length; i++) {
        new_div = list_element[i];
        new_div.style.display = 'block';
    }
}



var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
        }
    });
}
