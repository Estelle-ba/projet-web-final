//function carrousel
let index = 0;
let all_img = document.querySelectorAll('[id=carroussel]');
carousel();

function carousel() {
    //Browse the list of images
    for (let i = 0; i < all_img.length; i++) {
        //Hide all the images
        all_img[i].style.display = "none";
    }
    index++;

    //If the iteration is more than the list of images, go back to 1
    if (index> all_img.length){
        index = 1
    }

    //Show the next image
    all_img[index-1].style.display = "block";
    setTimeout(carousel, 2000); // Change the images every 2 seconds
}
