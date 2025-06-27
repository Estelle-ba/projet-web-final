let d = new Date();

let old_month;
let old_year;

let calendar = document.getElementById('calendar');

calendar.innerHTML = GenerateTable(d.getMonth(), d.getFullYear());
function plusMonth(n) {
    old_month += n;
    if (old_month === 12) {
        old_month=0;
        old_year += n;
    }
    else if(old_month <0) {
        old_month=11;
        old_year += n;
    }
    calendar.innerHTML = GenerateTable(old_month, old_year);
}

function GenerateTable(month, year) {

    let table = '<div class="table">';
    let date = new Date(year, month, 1);

    let days_computer = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    let days_phone = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
    let length_month = new Date(year, month + 1, 0).getDate();
    let last_month = new Date(year, month, 0).getDate();

    let name_month = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"];

    old_month = month;
    old_year = year;
    table += `<div class="row">`
    table +=`<div class="title"><a class="prev" onclick ="plusMonth(-1)" >❮</a>${name_month[month]} ${date.getFullYear()}<a class="next" onClick="plusMonth(1)">❯</a></div>`
    table +=`</div>`


    table += '<div class="row">';
    for (let day of days_computer) {
        table += `<div class="day_computer">${day}</div>`;
    }
    table += '</div>';

    table += '<div class="row">';
    for (let day of days_phone) {
        table += `<div class="day_phone">${day}</div>`;
    }
    table += '</div>';

    let day = date.getDay();
    let counter = 0;
    let j = 0;

    while (length_month !== counter) {
        if (j === 0) {
            if (day % 7 !== 1) {
                table += '<div class="row">';
                if(day === 0){
                    let temp = 7-day
                    day += temp;
                }
                for (let i = day-1 ; i > 0; i--) {
                    table += `<div class="other_month">${(last_month - (i-1))}</div>`;
                }
            }
            j++;
        } else {

            if (day % 7 === 1) {
                table += '<div class="row">';
            }
            let temp = new Date(year, month, 1);

            temp.setDate(date.getDate()+1);
            let day_convert = temp.toISOString().split('T')[0];
            if(day_convert!==d.toISOString().split('T')[0]){
                if(temp>=d){
                    table += `<div class="actual_month hover" id="${day_convert}" onclick="calendarOpenModal('${day_convert}')">
                    ${(date.getDate() < 10) ? '0' + date.getDate() : date.getDate()}</div>`;
                }
                else{
                    table += `<div class="actual_month" id="${day_convert}">
                    ${(date.getDate() < 10) ? '0' + date.getDate() : date.getDate()}</div>`;
                }
            }
            else{
                table += `<div class="actual_date hover" id="${day_convert}" onclick="calendarOpenModal('${day_convert}')">
                ${(date.getDate() < 10) ? '0' + date.getDate() : date.getDate()}</div>`;
            }
            if (day % 7 === 0) {
                table += '</div>';
            }

            date.setDate(date.getDate()+1);
            day++;
            counter++;
        }
    }
    if (day % 7 !== 1) {
        if(day % 7 === 0){
            table +=`<div class="other_month">01</div>`
        }
        else{
            for (let i = 0; i <= 7 - (day % 7); i++) {
                table += `<div class="other_month">0${i+1}</div>`;
            }
        }
        table += '</div>';
    }

    table += '</div>';

    return table;
}


//Function for the modal
let calendarOpened = false


function calendarOpenModal(date) {
    //When the button to activate a modal is clicked and there's not another one opened
    if(calendarOpened === false) {
        //The modal will be opened

        let calendarModal = document.getElementById('new_event');

        let form = document.getElementById('form');

        let date_format = new Date(date);
        calendarOpened = true;


        let title = document.createElement('h5');
        title.className = "modal-title";

        let existingTitle = form.querySelector('[class = modal-title]');
        if (existingTitle) {
            existingTitle.remove();
        }

        title.innerText = `Ajouter un évènement le ${date_format.toLocaleDateString()} :`;
        form.prepend(title);

        calendarModal.style.display = 'block';

    }
}
function calendarCloseModal() {
    let calendarModal = document.getElementById('new_event');

    //When the button to close a modal is clicked, the modal will be closed
    calendarModal.style.display = 'none';
    calendarOpened = false;
}
