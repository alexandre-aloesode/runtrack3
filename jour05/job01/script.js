document.addEventListener("DOMContentLoaded", function() {
    
//                                  Masquer par défaut le form d'inscription et l'afficher onclick

    const subscribe_form = document.querySelector("#subscribe_form");
    subscribe_form.style.display = "none";

    const show_subscribe = document.querySelector("#show_subscribe");

    show_subscribe.addEventListener("click", function() {
        subscribe_form.style.display = "flex";
    })


//                                  Masquer par défaut le form de connexion et l'afficher onclick

    const login_form = document.querySelector("#login_form");
    login_form.style.display = "none";

    const show_login = document.querySelector("#show_login");

    show_login.addEventListener("click", function() {
        login_form.style.display = "flex";
    })

    const subscribe_btn = document.querySelector("#subscribe_btn")
    
    subscribe_btn.addEventListener("click", function() {

        let check = true;

        const request = new FormData(subscribe_form);

        const user_input = [...request];

        if(user_input[0][1] == '' || user_input[1][1] == '' || user_input[2][1] == '' || user_input[3][1] == '' || user_input[3][1] == '' ) {

            check = false;

            alert("Certains champs sont vides");
        }

        // if(check ==  true && (user_password.length) <= 8) {

        //     check = false;

        //     alert("Mot de passe trop simple");
            
        // }

        if(check === true) {

            fetch("users.php")

                .then(response => response.json())

                .then((data) => {

                    for(let x in data) {

                        if(user_input[0][1] == data[x].prenom) {

                            const check_name = document.querySelector("#input_name");
                            check_name.textContent = "ss"
                            console.log(check_name.innerHTML);


                            alert("Ce prénom est déjà pris");

                            check = false;

                        }

                        if(user_input[2][1] == data[x].email) {

                            const check_email = document.querySelector("#input_email");
                            check_email.innerHTML = "test";

                            alert("Cet email est déjà pris");

                            check = false;

                        }

                        else if(check === true) {

                            subscribe_btn.setAttribute("name", "subscribe");
                            
                            subscribe_btn.setAttribute("type", "submit");

                        }
                    }
                
                });

        }
    });

    const login_btn = document.querySelector("#login_btn")
    
    login_btn.addEventListener("click", function() {

        let check = 1 ;

        const request = new FormData(login_form);

        const user_input = [...request];

        fetch("users.php")

                .then(response => response.json())

                .then((data) => {     

                    for(let x in data) {

                        if(user_input[0][1] == data[x].prenom) {                           

                            login_btn.setAttribute("name", "login");
                            
                            login_btn.setAttribute("type", "submit");

                            check = 0;

                            break;

                        }
                     
                    }

                    if(check == 1) alert("erreur");

                
                });

        

    });
})



