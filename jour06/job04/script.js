document.addEventListener("DOMContentLoaded", function() {

const navbar = document.querySelector("#navbar");

const burger = document.querySelector("#burger");

const burger_navbar = document.querySelector("#burger_navbar");


// if (window.matchMedia("(max-width: 767px)").matches) {
//     alert("burger")
//   }

burger.addEventListener("click", function() {

    burger_navbar.style.display = "block";

    navbar.style.display = "none";

}

)

});

