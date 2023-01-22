document.addEventListener("DOMContentLoaded", function() {

    const btn = document.querySelector("#button");

    const hide_btn = document.createElement("button");

    hide_btn.setAttribute("id", "hide_button");

    function citation() {

        const quote = document.createElement("p");
        
        quote.textContent = "Les logiciels et les cathédrales, c\'est un peu la même chose - d\'abord on les construit, ensuite on prie.";
    
        show_quote = document.querySelector("body");

        show_quote.append(quote);      

        hide_btn.textContent = "Cachez-moi";    

        show_quote.append(hide_btn);
    }

    function hide_citation() {

        document.querySelector("p").remove();

        document.querySelector("#hide_button").remove();
    }
    
    
    btn.addEventListener("click", citation);

    hide_btn.addEventListener("click", hide_citation);
    
})



