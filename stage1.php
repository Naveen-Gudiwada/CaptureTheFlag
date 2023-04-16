<!--MAP-->
<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
$_SESSION['level1']=100;
?>
<html>
    <head>
    
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
        <style>
            
            body{
                background-image: url("clue1.png");
                background-repeat: no-repeat;
                background-size: cover;
            }
            .s1body{
                margin-top: 10%;
                margin-left: 10%;
                
                color:white;
            }
            #answer{
                width: 300px;
                height: 30px;
                border-radius: 10px;
                border: 2px solid white;
                background-color: transparent;
                color: white;
                margin-left:30%;
            }
            #submit{
                width: 100px;
                height: 30px;
                border-radius: 10px;
                border: 2px solid white;
                background-color: transparent;
                color: white;
                margin-left: 2%;
            }
            .hint{
                float: right;
                margin-left: 95%;
                margin-top: 2%;
                border-radius: 10px;
                border: 2px solid white;
                background-color: transparent;
                width: 50px;
                height: 25px;
                text-align: center;
                padding-top: 5px;
            }
            b{
                color: white;
            }
            .container{
                display: grid;
                grid-template-rows: 5% 95%;
            }
            i{
                color: yellow;
            }
            nav {
                background-color: #333; /* Set background color */
                color: #fff; /* Set text color */
                display: flex; /* Use flexbox for layout */
                justify-content: space-between; /* Align items to left and right */
                padding:10px; /* Add padding */
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
        </style>
    </head>
    <body>
    <nav>
        <ul>
            <li id="timer">Time Left: <span id="time">100</span> seconds</li>
            <li id="score">Score: <span id="current-score">0</span></li>
        </ul>
    </nav>
        <div class="container">
        <div class="hint" id="myDiv"><i class='fa fa-lightbulb-o yellow-color'></i><b>  hint</b></div>
        <div class="s1body">
            <p><h2>I have seas without water. I have forests without wood. I have deserts without sand. I have houses with no brick. What am I?</h2></p>
            <input type="text" name="answer" id="answer">
            <input type="submit" value="Submit" id="submit" onclick="verify()">   
        </div>
        </div>
        <script>
            var timeLeft = 100;
            var score=0;
            startTimer();
            function startTimer() {
                let timer = setInterval(() => {
                timeLeft--;
                <?php $_SESSION['level1']=$_SESSION['level1']-1;?>
                document.getElementById('time').innerHTML = timeLeft;
                if (timeLeft === 0) {
                    clearInterval(timer);
                    endGame();
                }
                },1000);
            }

            function verify(){
            var answer=(document.getElementById("answer").value).toLowerCase();
            if(answer==="map")
            {
                alert("Correct Answer");
                score=score+100;
                document.getElementById('current-score').innerHTML = score;
                correct();
            }
            else{
                alert("Wrong Answer");
            }
        }
        function correct()
        {
            window.location.href = "clue1.php";
        }
        function endGame() {
                window.location.href = "updatescore1.php";
            }
        </script>
    </body>
</html>