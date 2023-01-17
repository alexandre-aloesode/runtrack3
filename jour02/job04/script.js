document.addEventListener("DOMContentLoaded", function() {

const content = document.querySelector("#keylogger");

function repeat(chars) {

    if(chars.key.length == 1) {

        let str = content.value;

        str += chars.key;

        content.value = str;
    }

}
    
    
document.addEventListener("keydown", repeat);
    
})



