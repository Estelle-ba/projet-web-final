let date = new Date();
let calendar = document.getElementById('calendar');

calendar.innerHTML = GenerateTable(date.getMonth(), date.getFullYear());
function plusMonth(month, n) {
    month += n;
    calendar.innerHTML = GenerateTable(month, date.getFullYear());
}

function GenerateTable(month, year) {

    let table = '<div class="table">';
    let date = new Date(year, month, 1);

    let days_computer = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
    let days_phone = ['L', 'M', 'M', 'J', 'V', 'S', 'D'];
    let length_month = new Date(year, month + 1, 0).getDate();
    let last_month = new Date(year, month, 0).getDate();

    let name_month = ["Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Decembre"];

    console.log(month);
    table += `<div class="row">`
    table +=`<div class="title"><a class="prev" onclick ="plusMonth(month, -1)" >❮</a>${name_month[month]}<a class="next" onClick="plusMonth(month, 1)">❯</a></div>`
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

    let day = 0;
    let j = 0;

    while (date.getMonth() === month) {
        if (j === 0) {
            if (day % 7 !== 1) {
                table += '<div class="row">';
                for (let i = 6 - (day + 1); i >= 0; i--) {
                    table += `<div class="other_month">${(last_month - (day + i))}</div>`;
                }
            }
            j++;
        } else {
            if (day % 7 === 1) {
                table += '<div class="row">';
            }

            table += `<div class="actual_month">${(date.getDate() < 10) ? '0' + date.getDate() : date.getDate()}</div>`;

            if (day % 7 === 0) {
                table += '</div>';
            }

            date.setDate(date.getDate() + 1);
            ++day;
        }
    }
    console.log(day)
    if (day % 7 !== 0) {
        console.log(6 - (day % 7))
        for (let i = 0; i <= 7 - (day % 7); i++) {
            table += `<div class="other_month">0${i}</div>`;
        }
        table += '</div>';
    }

    table += '</div>';

    return table;
}
