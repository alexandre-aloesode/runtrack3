document.addEventListener("DOMContentLoaded", function() {

const btn = document.querySelector("#button")

function addone() {

    const compteur = document.querySelector('#compteur')

        compteur.textContent++

}
    
    
btn.addEventListener("click", addone)
    
})



