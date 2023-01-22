document.addEventListener("DOMContentLoaded", function() {

    const form = document.querySelector("form");

    const select_types = document.querySelector("select");

    const types_array = [];

    

    const display_board = document.querySelector("body");


    function get_types() {

        fetch("pokemon.json")

            .then((response) => {

                return response.json()

            })
            
            .then((data) => {

                for(let t = 0; t < data.length; t++) {

                       if(types_array.includes(String(data[t].type)) == false) types_array.push(String(data[t].type))

                }
                
                push_select();

            })

    }



    function push_select() {

        for(let x = 0; x < types_array.length; x++) {

            option_types = document.createElement("option");

            option_types.textContent = types_array[x];

            select_types.append(option_types);

        }
    }

    form.addEventListener("submit", function (query) {

	    query.preventDefault();

        const request = new FormData(form);

        const user_input = [...request];

        fetch("pokemon.json")

            .then((response) => {

                return response.json()

            })
        
            .then((data) => {

                for(let t = 0; t < data.length; t++) {

                       if(data[t].type == user_input[2][1]) {

                        const display_request = document.createElement("p");

                        display_request.innerHTML = String(data[t].name.french);

                        display_board.appendChild(display_request);

                       }

                       if(user_input[2][1] == '--') {

                        console.log(user_input[2][1])

                            if(data[t].id == user_input[0][1] || data[t].name.french == user_input[1][1]) {

                                const display_request = document.createElement("p");
        
                                display_request.innerHTML = String(data[t].name.french);
        
                                display_board.appendChild(display_request);
    
                           }

                       }

                }
                
                push_select();

            })

    });

    get_types();
    
})



