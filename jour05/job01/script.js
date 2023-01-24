 
//                                  Masquer par défaut le form d'inscription et l'afficher onclick

    const subscribe_form = document.querySelector("#subscribe_form");
    subscribe_form.style.display = "none";

    const show_subscribe = document.querySelector("#show_subscribe");

    show_subscribe.addEventListener("click", function() {

        if(login_form.style.display == "flex") login_form.style.display = "none";

        subscribe_form.style.display = "flex";
    })


//                                  Masquer par défaut le form de connexion et l'afficher onclick

    const login_form = document.querySelector("#login_form");
    login_form.style.display = "none";

    const show_login = document.querySelector("#show_login");

    show_login.addEventListener("click", function() {

        if(subscribe_form.style.display == "flex") subscribe_form.style.display = "none";

        login_form.style.display = "flex";
    });



    const subscribe_btn = document.querySelector("#subscribe_btn");
    
    subscribe_btn.addEventListener("click", function(ev) {

        ev.preventDefault();

        const request = new FormData(subscribe_form);

        fetch("./Classes/User.php", {

            method: "POST",

            body: request
        })
        
        .then((response) => {

            return response.json();

        })
        
        .then((data) => {

            if(data.success == true) {

                subscribe_form.innerHTML = data.message;

            }

            if(data.success == false) {

                if(data.type == "name") {

                    const error_name = document.querySelector("#error_name");
                    error_name.innerHTML = data.message;

                }

                if(data.type == "email") {

                    const error_email = document.querySelector("#error_email");
                    error_email.innerHTML = data.message;
                }

                if(data.type == "name_email") {

                    const error_name = document.querySelector("#error_name");
                    error_name.innerHTML = "Ce prénom est déjà pris";

                    const error_email = document.querySelector("#error_email");
                    error_email.innerHTML = "Cet email est déjà pris";
                }

                if(data.type == "general" || data.type == "server") { 

                    const error_subscribe = document.querySelector("#error_subscribe");
                    error_subscribe.innerHTML = data.message;
                }
            }
        });                   
    });


    

    const login_btn = document.querySelector("#login_btn")
    
    login_btn.addEventListener("click", function(ev) {

        ev.preventDefault();

        const request = new FormData(login_form);
                               
        fetch("./Classes/User.php", {

            method: "POST",

            body: request
        })
        
        .then((response) => {

            return response.json();

        })
        
        .then((data) => {

            if(data.success == true) {

                login_form.innerHTML = data.message + "<br> Bienvenue " + data.name;

            }

            else if(data.success == false) {

                const error_login = document.querySelector("#error_login");

                error_login.innerHTML = data.message;
            }
        });  
    });