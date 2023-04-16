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
    background-image:url(elf.png);
    background-repeat: no-repeat;
    background-size: cover;
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
#next-button{
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
#next-button1{
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
  margin-left:10px
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
    height: 40px;
    border-radius: 10px;
    border: 2px solid white;
    background-color: green;
    color: white;
    margin-left:800px;
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
#button{
    width: 100px;
    height: 40px;
    border-radius: 10px;
    border: 2px solid white;
    background-color: green;
    color: black;
    margin-left:10px;
    margin-top:0px;
}
</style>
</head>
<body>
<div class="pop-up-wrapper">
  <div class="pop-up">
    <p id="pop-up">You have already approached Santa's village to give him gifts, but at the entrance you are met by a group of elves. They ask you for a secret password. Fortunately, Santa wrote one letter of the password on each of the boxes. Can you name the correct password?:</p>
    <div class="button-wrapper">
    <input type="text" id="answer">
    <input type="button" id="next-button1" onclick="verify()" value="Submit">
    <input id="next-button" onclick="goBack()" value="Back">
    </div>
  </div>
</div>
  <div class="q2_2">
    <p id="msg"><b>Good Job!It's time to give all the gifts back to Santa!</b></p>
    <input type="submit" value="Go To North Pole" id="submit" onclick="northpole()"> 
  </div>
</div>
 <script>
startTimer();
const next = document.querySelector("#next-button");
const popupResponse = document.querySelector("#pop-up");
const popupDiv = document.querySelector(".pop-up-wrapper");
const spriteResponse = ['It is time to give all the gifts back to Santa!', 'Can u find the missing boxes of Santa?','There are totally five missing Gift boxes of Santa'];
const answer=document.getelementbyid("answer");
const gameEndResponse = ['congratulations! you have saved my home from destruction.For this i shall reward you'];

let click = 0, track = 0;
function verify()
{
    if(answer.value=="Xerox")
    {
        windows.location.href="treasure.php";
    }
    else
    {
        alert("Wrong Answer");
    }
}
next.addEventListener("click", sResponse);
bgWrapper.addEventListener("click", validate);

function goBack(){
    window.location.href="challenges1.php";
}
function validate(event)
{
  //track how many time correct elem is selected
  if(event.target.id != "spirit-sprites")
    {
      alert("wrong score decreased by 5 points ");
      score -= 5;
      <?php
     $_SESSION['level1']=$_SESSION['level1']-5;
     if($_SESSION['level1']<0)
     {
         $_SESSION['level1']=0;
     }
     ?>

      if(score < 0)
        {
          score = 0;
        }
      document.getElementById('current-score').textContent = score;
 
    } else {
      track++;
      increaseScore();
       event.target.style.background = "var(--green)"
      if(track == 3)
        {
          endGame();
        }
    }
}

function endGame()
{
  let click = 0;
  popupDiv.style.display = "flex";
  popupResponse.innerHTML = gameEndResponse;
  next.innerHTML = "claim reward";
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
 window.location.href = "updatescore1.php";

}


let timeLeft = 65; // Starting time in seconds
let score = 0; // Starting score

// Timer function that updates the timer display and ends the game when time is up
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

function increaseScore() {
score += 10;
<?php
     $_SESSION['level1']=$_SESSION['level1']+10;
     ?>
  document.getElementById('current-score').textContent = score;
}
document.getElementById('hidden-object-image').addEventListener('click', increaseScore);


</script>
</body>
</html>