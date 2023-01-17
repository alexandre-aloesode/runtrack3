document.addEventListener("DOMContentLoaded", function() {

const btn = document.querySelector("#button")

function showhide() {
            

    if(btn.textContent == "Show") {

        let quote = document.createElement("article");

        ajout = document.querySelector("body");

        quote.textContent = "L'important n'est pas la chute, mais l'atterrissage.";

        ajout.append(quote);

        btn.textContent = "Hide";

        }
        
    else {
            
        document.querySelector("article").remove();

        btn.textContent = "Show";

    }

}
    
    
btn.addEventListener("click", showhide)
    
})



