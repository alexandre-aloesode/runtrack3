document.addEventListener("DOMContentLoaded", function() {

    const table_content = document.querySelector("tbody");

    const btn = document.querySelector("button");

    btn.addEventListener("click", get_users);
    

    function get_users() {

        

        fetch("users.php")

            .then((response) => response.json())
            
            .then((data) => {

                table_content.innerHTML ="";

                for(let x in data) {

                    table_content.innerHTML += `

                        <tr>
                            <td>${data[x].id}</td>
                            <td>${data[x].nom}</td>
                            <td>${data[x].prenom}</td>
                            <td>${data[x].email}</td>
                        </tr>`;

                }
                
            });
    }


    get_users();
})



