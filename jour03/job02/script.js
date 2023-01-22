document.addEventListener("DOMContentLoaded", function() {

   const game_container = document.querySelector("#game_container");

   const img_container = document.querySelector("#img_container");

   const shuffle_btn = document.querySelector("#shuffle_btn");

   let game_array = [];

   shuffle_btn.addEventListener("click", shuffle_img);

   img_container.addEventListener("click", move_img);

   let turn = 0;


   for(let i = 1; i <= 6; i++) {

      let img_add = document.createElement("img");

      img_add.setAttribute("src", "./images/arc" + i + ".png");

      img_add.setAttribute("id", "img" + i);

      img_container.append(img_add);

      img_add.addEventListener("click", move_img);

   }

   function shuffle_img() {

      let shuffled_images = document.querySelector('#img_container'), i;

      for (i = shuffled_images.children.length; i >= 0; i--) {

          shuffled_images.appendChild(shuffled_images.children[Math.random() * i | 0]);

      }

   }

   function move_img() {

      console.log(this)

      game_container.appendChild(this);

      turn++;

      game_array.push(this);

      console.log(game_array);

      if(game_array.length == 2) alert("GG");
      
   }

   // console.log(img_container.children.length);

   // console.log(img_container);

   // console.log(game_container);

   console.log(game_array);

   

   // // var element = document.getElementById("theElementId");

   // let numberOfChildren = game_container.cb

   // console.log(numberOfChildren);
    console.log(turn);
})



