//function carrousel
let index_phone = 0;
let index_computer = 0;
let all_img = [];
let show_img_phone = [];
let show_img_computer = [];
let number_display;

let phone = document.getElementsByClassName("carroussel_phone")[0];
let computer = document.getElementsByClassName("carroussel_computer")[0];

let img_1 = document.createElement("img");
let img_2 = document.createElement("img");
let img_3 = document.createElement("img");

img();
instatiation();

carousel();



function img(){
    let image_1 = document.createElement("img");
    image_1.src = "https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-6.jpg";
    image_1.alt = "Image of the coding factory"
    all_img.push(image_1);

    let image_2 = document.createElement("img");
    image_2.src = "https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-5.jpg";
    image_2.alt = "Image of the coding factory"
    all_img.push(image_2);

    let image_3 = document.createElement("img");
    image_3.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/04/Photo-Coding-11.jpg";
    image_3.alt = "Image of the coding factory"
    all_img.push(image_3);

    let image_4 = document.createElement("img");
    image_4.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-24.jpg";
    image_4.alt = "Image of the coding factory"
    all_img.push(image_4);

    let image_5 = document.createElement("img");
    image_5.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/04/Photo-Coding-9.jpg";
    image_5.alt = "Image of the coding factory"
    all_img.push(image_5);

    let image_6 = document.createElement("img");
    image_6.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-6.jpg";
    image_6.alt = "Image of the coding factory"
    all_img.push(image_6);

    let image_7 = document.createElement("img");
    image_7.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/04/Photo-Coding-22.jpg";
    image_7.alt = "Image of the coding factory"
    all_img.push(image_7);

    let image_8 = document.createElement("img");
    image_8.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-28.jpg";
    image_8.alt = "Image of the coding factory"
    all_img.push(image_8);

    let image_9 = document.createElement("img");
    image_9.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-9.jpg";
    image_9.alt = "Image of the coding factory"
    all_img.push(image_9);

    let image_10 = document.createElement("img");
    image_10.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/MicrosoftTeams-image-10.jpg";
    image_10.alt = "Image of the coding factory"
    all_img.push(image_10);

    let image_11 = document.createElement("img");
    image_11.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-6.jpg";
    image_11.alt = "Image of the coding factory"
    all_img.push(image_11);
    console.log(image_11);

    let image_12 = document.createElement("img");
    image_12.src = "https://sp-ao.shortpixel.ai/client/to_webp,q_lossy,ret_img/https://codingfactory.fr/wp-content/uploads/2023/06/Photo-Coding-21.jpg";
    image_12.alt = "Image of the coding factory"
    all_img.push(image_12);
}



function instatiation(){

    number_display = 2;
    img_1 = all_img[0];
    img_2 = all_img[1];
    img_3 = all_img[2];
    show_img_phone.push(img_1.cloneNode(true));
    show_img_phone.push(img_2.cloneNode(true));

    show_img_computer.push(img_1);
    show_img_computer.push(img_2);
    show_img_computer.push(img_3);

    for(let i = 0; i <show_img_phone.length;i++){
        show_img_phone[i].style.display = "block";
        phone.appendChild(show_img_phone[i]);
    }


    for(let i = 0;  i<show_img_computer.length;i++){
        show_img_computer[i].style.display = "block";
        computer.appendChild(show_img_computer[i]);
    }
}

function currentDiv(n) {
    showDivs(index = n);
}

function carousel() {
    phone.innerHTML = "";
    computer.innerHTML = "";
    //Browse the list of images
    for(let i = 0; i <show_img_phone.length;i++){
        let number = index_phone * 2 + i;
        show_img_phone[i] = all_img[number];
        show_img_phone[i].style.display = "block";
        phone.appendChild(show_img_phone[i]);

    }


    for(let i = 0;  i<show_img_computer.length;i++){
        let number = index_computer * 3 + i;
        show_img_computer[i] = all_img[number];
        show_img_computer[i].style.display = "block";
        computer.appendChild(show_img_computer[i]);

    }

    index_phone++;
    index_computer++;

    //If the iteration is more than the list of images, go back to 1
    if (index_phone >= (all_img.length/2)){
        index_phone = 0;
    }
    if (index_computer >= (all_img.length/3)){
        index_computer = 0;
    }

    //Show the next image

    setTimeout(carousel, 5000); // Change the images every 5 seconds
}
