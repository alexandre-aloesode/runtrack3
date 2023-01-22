document.addEventListener("DOMContentLoaded", function() {

    function jsonValueKey(file, key) {

        fetch(file)

            .then(response => response.json())

            .then(response => console.log(response[key]));

    }

    jsonValueKey("info.json", "city");
})



