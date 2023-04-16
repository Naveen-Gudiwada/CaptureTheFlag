<?php
session_start();
?>
<html>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bona+Nova&display=swap');

:root {
  --gold: #4f4029;
  --creme: #bab299;
  --yellow: #d9b95b;
  --green: rgba(54, 179, 83, 0.5);
}
*, *:after, *:before {
  box-sizing: border-box;
}
body, html {
  height: 100vh;
  width: 100vw;
  padding:0;
  margin:0;
}
body {
  font-family: 'Bona Nova', serif;
}
p {
   color: var(--gold);
  font-size: 1.5em;
  font-weight: 500;
}
.bg-wrapper {
  height: 100vh;
  width: 100ve;
  background-image: url('1.webp');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
   display: grid; 
  grid-template-columns: 1fr 1fr 1fr 1fr; 
  grid-template-rows: 1fr 1fr 1fr 1fr; 
  gap: 0px 0px; 
  grid-template-areas: 
    ". . . ."
    ". . . ."
    ". . . ."
    ". . . ."; 
}
.cubes {
  display: none;
  justify-content: center;
  align-items: center;
}

.pop-up-wrapper {
  position: absolute;
  z-index: 1;
  display: flex;
  flex-direction: row;
  justify-content: center;
  align-items: center;
  height: 100vh;
  width: 100vw;
  background: rgb(211,210,216);
background: radial-gradient(circle, rgba(211,210,216,0) 0%, rgba(54,48,54,1) 100%);
}
.pop-up {
  width: 500px;
  height: auto;
  padding: 20px;
  background: lightblue;
  border: 5px;
  border-radius: 5px;
  margin-right:150px;
}
.pop-up>p::first-letter {
  text-transform: uppercase;
  font-weight: 600;
}
#sprite {
  height: 450px;
  width: 200px;
}
.button-wrapper {
  width: 100%;
  height: 50px;
  display: flex;
  flex-direction: row-reverse;
  align-items: center;
  justify-content: flex-start;
}
#next-button {
  outline: 0;
  margin:0;
  background: green;
  color: white;
  padding: 5px;
  height: 40px;
  min-width: 60px;
  width: auto;
  font-size: 0.8em;
  font-weight: 600;
  border-radius: 15px;
  text-transform: capitalize;
}
#box1{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:450px;
  margin-left:-100px;
}
#box2{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:250px;
  margin-left:-390px;
}
#box3{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:200px;
  margin-left:-250px;
}
#box4{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:420px;
  margin-left:100px;
}
#box5{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:20px;
  margin-left:500px;
}

#answer{
    width: 300px;
    height: 30px;
    border-radius: 10px;
    border: 2px solid white;
    background-color: transparent;
    color: white;
    margin-left:8%;
}
#msg{
    color:black;
    width:600px;
    height:30px;
    background: lightblue;
    border: 5px;
    border-radius: 5px;
    font-size: 20px;
    margin-left:450px;
    margin-top:-100px;
    text-align:center;
}
#submit{
    width: 200px;
    height: 30px;
    border-radius: 10px;
    border: 2px solid white;
    background-color: transparent;
    color: black;
    margin-left:650px;
    margin-top:-10px;
}
</style>
</head>
<body>
<div class="pop-up-wrapper">
  <div class="pop-up">
    <p id="pop-up">Santa's been accidentally dropping gifts on his trips! He has asked for help collecting them. Click on the gift boxes and complete tasks! 🎁</p>
    <div class="button-wrapper">
    <button id="next-button">next</button>
    </div>
  </div>
</div>
<div class="bg-wrapper">
  <div class="cubes">
    <a href="stage11.php">
      <div id="box1">
        <img src="box.png" id="box1">
      </div>
    </a>
  </div>
  <div class="cubes">
    <a href="stage12.php">
      <div id="box2">
        <img src="box.png" id="box2">
      </div>
    </a>
  </div>
  <div class="cubes">
    <a href="stage13.php">
      <div id="box3">
        <img src="box.png" id="box3">
      </div>
    </a>
  </div>
  <div class="cubes">
    <a href="stage14.php">
      <div id="box4">
        <img src="box.png" id="box4">
      </div>
  </a>
  </div>
  <div class="cubes">
    <a href="stage15.php">
      <div id="box5">
        <img src="box.png" id="box5">
      </div>
    </a>
  </div>
</div>
  
  <div class="q2_2">
    <p id="msg"><b>Good Job!It's time to give all the gifts back to Santa!</b></p>
    <form action="northpole.php">
      <input type="submit" value="Go To North Pole" id="submit">
    </form>   
  </div>
</div>
 <script>
const next = document.querySelector("#next-button");
const popupResponse = document.querySelector("#pop-up");
const popupDiv = document.querySelector(".pop-up-wrapper");
const bgWrapper = document.querySelector(".bg-wrapper");
const cubes = document.querySelectorAll(".cubes");

const spriteResponse = ['It is time to give all the gifts back to Santa!', 'Can u find the missing boxes of Santa?','There are totally five missing Gift boxes of Santa'];

const gameEndResponse = ['congratulations! you have saved my home from destruction.For this i shall reward you'];

let click = 0, track = 0;

next.addEventListener("click", sResponse);
bgWrapper.addEventListener("click", validate);


function sResponse()
{
  click++;
  popupResponse.innerHTML = spriteResponse[click];
  if(click == 3 )
    {
      popupDiv.style.display = "none";
      for(i=0; i<cubes.length; i++)
        {
      cubes[i].style.display = "flex";
        }
    }
}
</script>
</body>
</html>