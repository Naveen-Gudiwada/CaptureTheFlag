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
body{
  color:lightgrey;
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
  
}
.pop-up {
  width: 1200px;
  height: auto;
  padding: 20px;
  background: lightblue;
  border: 5px;
  border-radius: 5px;
  margin-top: -250px;
  margin-right:50px;
}
h1,h2{
    color:black;
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
  width: 100px;
  font-size: 0.8em;
  font-weight: 600;
  border-radius: 15px;
  text-transform: capitalize;
  text-align:center;
}
#item-sprites {
  height: 60px;
  width: 60px;
}
#portal-sprites {
  height: 80px;
  width: 80px;
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
    <p id="pop-up"><h1>Perfectly done!</h1><br></p>
    <p><h2>Excellent! On the gift box you see the letter "e-2". Good job, my friend!</h2></p>
    <div class="button-wrapper">
    <form action="updatescore3.php" method="post">
         <input type="submit" value="Back" id="next-button">
    </form>
    </div>
  </div>
</div>
</div>
</body>
</html>