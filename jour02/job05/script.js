document.addEventListener("DOMContentLoaded", function() {

const footer_color = document.querySelector("footer");

function change_color() {

    var scroll = window.pageYOffset;

    if(scroll < 300) footer_color.style.backgroundColor = "red";

    else if (scroll >= 300 && scroll < 1200) footer_color.style.backgroundColor = 'yellow';

    else if (scroll >= 1200 && scroll < 2100) footer_color.style.backgroundColor = 'blue';

    else if (scroll >= 2100 && scroll < 3000) footer_color.style.backgroundColor = 'orange';

    else footer_color.style.backgroundColor = 'green';
}
    
    
document.addEventListener("scroll", change_color);
    
})



