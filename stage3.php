<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
$_SESSION['level3']=400;
?>

<!DOCTYPE html>
<html>
    <head>
        <style>
		p {
		color: green;
		}
        .container{
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        body{
            margin: 0%;
            background-image: url("homebgblur.png");
            background-color:lightblue;
        }  
        nav {
                background-color: #333; /* Set background color */
                color: #fff; /* Set text color */
                display: flex; /* Use flexbox for layout */
                justify-content: space-between; /* Align items to left and right */
                padding: 10px; /* Add padding */
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
            input{
                width: 300px;
                height: 30px;
                border-radius: 5px;
                border: 1px solid #ccc;
                padding: 5px;
                font-size: 16px;
            }
            button{
                width: 100px;
                height: 30px;
                border-radius: 5px;
                border: 1px solid #ccc;
                padding: 5px;
                font-size: 16px;
                background-color: #333;
                color: #fff;
            }
            .cont{
                margin-left:600px;
            }
	</style>
<body>
        <nav>
            <ul>
                <li id="timer">Time Left: <span id="time">400</span>seconds</li>
                <li id="score">Score: <span id="current-score">0</span></li>
                <li>Hint: <span id="hint">clue</span></li>
            </ul>
        </nav>
    <div class="container">
	  <p>
        There is the clue ??
        </p>
		<a href="file.doc" download="file">
		<button type="button">clue</button>
		</a>
        </div>
        <div class="cont">
            <form>
                <input type="text" id="answer" placeholder="Enter your answer">
                <button type="button" onclick="verify()">Submit</button>
            </form>
        </div>
    </div>
</body>
<script>
    var timeLeft = 400;
            startTimer();
            function startTimer() {
                let timer = setInterval(() => {
                timeLeft--;
               <?php $_SESSION['level3']= $_SESSION['level3']-1 ?>
                document.getElementById('time').innerHTML = timeLeft;
                if (timeLeft === 0) {
                    clearInterval(timer);
                    endGame();
                }
                },1000);
            }
            function endGame() {
                alert("Time's up!");
                window.location.href = "updatescore3.php";
            }
            function verify(){
            var answer=document.getElementById("answer").value;
             answer=answer.toLowerCase();
            if(answer==="santa")
            {
                <?php   $_SESSION['level3']= $_SESSION['level3']+100; ?>
                alert("Correct Answer, score is <?php echo $_SESSION['level3']; ?>"  );
                window.location.href="clue3.php";        
            }
            else{
               <?php $_SESSION['level3']= $_SESSION['level3']-5; ?>
                alert("Wrong Answer");
            }
        }
</script>
</html>