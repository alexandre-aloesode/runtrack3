document.addEventListener("DOMContentLoaded", function() {

    const btn = document.querySelector("#button");

    btn.addEventListener("click", citation);

    function citation() {

        const quote = document.createElement("p");

        fetch("expression.txt") 

        .then(response => response.text())

        .then(textString => {
            quote.textContent = textString
        });

        show_quote = document.querySelector("body");

        show_quote.append(quote);   
    }
    
})



