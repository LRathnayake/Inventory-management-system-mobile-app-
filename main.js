//add hoverd class to selected list item
let list =document.querySelectorAll(".navigation li");

function activeLink(){
    list.forEach((item) =>{
        item.classList.add("hovered");
    });
    this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover",activeLink));