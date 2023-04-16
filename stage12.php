<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
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
}
#box2{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:250px;
  margin-left:-430px;
}
#box3{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:-350px;
  margin-left:-30px;
}
#box4{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:-100px;
  margin-left:450px;
}
#box5{
  display: flex;
  justify-content: center;
  align-items: center;
  height: 40px;
  width: 40px;
  margin-top:-250px;
  margin-left:150px;
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
    <p id="pop-up"><h2>You found another gift box 🎁</h2>
    <div class="button-wrapper">
    <form action="stage2.php">
        <input id="next-button" type="submit" value="Go">
    </form>
    </div>
  </div>
</div>
<div class="bg-wrapper">
</div>
 <script>
    const next = document.querySelector("#next-button");
    next.addEventListener("click", sResponse);
    function sResponse()
    {
        windows.location.href="stage2.php";
    }
    </script>
</body>
</html>