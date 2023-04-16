<?php 
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: index.html");
}
$conn=mysqli_connect('localhost',"root","","capturetheflag");
?>
<html>
<head>
    <style>
         nav {
  background-color: #333; /* Set background color */
  color: #fff; /* Set text color */
  display: flex; /* Use flexbox for layout */
  justify-content: space-between; /* Align items to left and right */
  padding: 10px; /* Add padding */
}
body{
    margin: 0px;
}
ul {
  list-style: none; /* Remove bullets from list */
  margin: 0; /* Remove default margin */
  padding: 0; /* Remove default padding */
}

li {
  display: inline-block; /* Display items horizontally */
  margin-right: 20px; /* Add spacing between items */
}

span {
  font-weight: bold; /* Make text bold */
}

#time {
  font-size: 1.5em; /* Increase font size for time */
}

#current-score {
  color: yellow; /* Change text color for score */
}

#hint {
  color: #ccc; /* Change text color for hint */
}
        body{
            background-color: #3e8e41;
        }
        .r1{
            font-size: 30px;
            color: white;
            float:left;
            margin-top: 20px;
  color: #3e8e41; /* hide the text */
}
.r2{
    font-size: 30px;
    color: white;
    float:right;
    margin-top: 50px;
  color: #3e8e41; /* hide the text */
}
.r3{
    font-size: 30px;
    color: white;
    text-align: center;
    margin-top: 50px;
  color: #3e8e41; /* hide the text */
}
.r4{
    font-size: 30px;
    color: white;
    float: left;
    margin-top: 50px;
  color: #3e8e41; /* hide the text */
}
.r5{
    font-size: 30px;
    color: white;
    float: right;
    margin-top: 50px;
  color: #3e8e41; /* hide the text */
}
.r6{
    font-size: 30px;
    color: white;
    text-align: center;
    margin-top: 50px;
  color: #3e8e41; /* hide the text */
}
.r7{
    font-size: 30px;
    color: white;
    float: left;
    margin-top: 50px;
  color: #3e8e41; /* hide the text */
}


.guess-btn:hover + .answer-form, .answer-form:hover {
  display: block; /* show the form when the button or form is hovered over */
}

.answer-form {
  display: none; /* hide the form initially */
}

.hidden-message {
  display: none; /* hide the message initially */
}

.answer-form input[type="submit"]:hover ~ .hidden-message {
  display: block; /* show the message when the submit button is hovered over and the answer is correct */
}

       .guess-container {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  margin-top: 20px;
}

.guess-input {
  padding: 10px;
  margin-right: 10px;
  font-size: 16px;
}

.guess-button {
  padding: 10px 20px;
  background-color:brown;
  color: white;
  border: none;
  cursor: pointer;
  font-size: 16px;
}

.guess-button:hover {
  background-color:;
}

.result {
  margin-top: 20px;
  font-size: 18px;
  font-weight: bold;
  color: #4CAF50;
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
  background-image: url('bgimgblur.png');
  background-size: cover;
  background-repeat: no-repeat;
  
}
.pop-up {
  width: 500px;
  height: auto;
  padding: 20px;
  background: lightblue;
  border: 5px;
  border-radius: 5px;
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


    </style>
</head>
<body>
<nav>
  <ul>
    <li id="timer">Time Left: <span id="time">300</span> seconds</li>
    <li id="score">Score: <span id="current-score"> 0</span></li>
    <li>Hints: <span id="hint">The cursor knows the place very well  </span></li>
  </ul>
</nav>
<div class="pop-up-wrapper">
  <div class="pop-up">
    <p id="pop-up">Read Instructions carefully?</p>
    <div class="button-wrapper">
    <button id="next-button">next</button>
    </div>
  </div>
</div>

<div class="r1" id="r1" onclick="changecolor1()">1. I am not alive, </div>
<div class="r2" id="r2" onclick="changecolor2()">2.but I grow; </div>
<div class="guess-container">
  <input type="text" class="guess-input" placeholder="Enter your guess">
  <button class="guess-button">Guess</button>
  <div class="r3" id="r3" onclick="changecolor3()">3.I don't have lungs, </div>
<div class="r4" id="r4" onclick="changecolor4()">4.but I need air; </div>
  <div class="result"></div>
</div>
<div class="r5" id="r5" onclick="changecolor5()">5.I don't have a mouth, </div>
<div> </div>
<div class="r6" id="r6" onclick="changecolor6()">6.but water kills me. </div>
<div class="r7" id="r7" onclick="changecolor7()">7.What am I?</div>
</body>





<script>

   var score=0;
   startTimer();
   const next = document.querySelector("#next-button");
const popupResponse = document.querySelector("#pop-up");
const popupDiv = document.querySelector(".pop-up-wrapper");
const cubes = document.querySelectorAll(".cube");
const spriteResponse = ['Please check the intructions carefully', 'There are some words hidden in page', 'Use them to find the find the riddle'];
const gameEndResponse = ['Congratulations! you have got the item.For this i shall reward you,with this fire make spirts get away' ];

let click = 0, track = 0;

next.addEventListener("click", sResponse);


function sResponse()
{
  click++;
  popupResponse.innerHTML = spriteResponse[click];
  if(click == 3)
    {
      popupDiv.style.display = "none";
      for(i=0; i<cubes.length; i++)
        {
      cubes[i].style.display = "flex";
        }
    }
}
    const guessButton = document.querySelector('.guess-button');
const guessInput = document.querySelector('.guess-input');
const result = document.querySelector('.result');

guessButton.addEventListener('click', () => {
  const guess = guessInput.value.toLowerCase();
  if (guess === 'fire') { 
    <?php $_SESSION['level5']=$_SESSION['level5']+30;?>
    score=100;
    endGame();
  } else {
      alert("Wrong Answer");
  }
  guessInput.value = '';
});
var r1=document.getElementById("r1");
var r2=document.getElementById("r2");
var r3=document.getElementById("r3");
var r4=document.getElementById("r4");
var r5=document.getElementById("r5");
var r6=document.getElementById("r6");
var r7=document.getElementById("r7");
function changecolor2(){
    r2.style.color="red";

    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
function changecolor1(){
    r1.style.color="red";
    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
function changecolor3(){
    r3.style.color="red";
    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
function changecolor4(){
    r4.style.color="red";
    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
function changecolor5(){
    r5.style.color="red";
    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
function changecolor6(){
    r6.style.color="red";
    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
function changecolor7(){
    r7.style.color="red";
    <?php $_SESSION['level5']=$_SESSION['level5']+10;?>
    score=score+10;
    document.getElementById('current-score').textContent = score;
}
let timeLeft = 300;
    function startTimer() {
  let timer = setInterval(() => {
    timeLeft--;
    document.getElementById('time').innerHTML = timeLeft;
    if (timeLeft === 0) {
      clearInterval(timer);
      endGame();
    }
  }, 1000);
}
function endGame()
{
  let click = 0;
  popupDiv.style.display = "flex";
  popupResponse.innerHTML = gameEndResponse;
  next.innerHTML = "claim";
  next.addEventListener("click", function(){
    popupResponse.innerHTML = "score = " + score + "";
    
    next.innerHTML = "game ended";
    var n=next.innerHTML;
    if(n=="game ended")
      {
        
         updatescore();
      }
  }
  )
}
function updatescore(){
  
 window.location.href = "updatescore5.php";

}

</script>

</html>