<html>
    <head>
        <style>
            body{
                background-image:url("clue2.png");
                background-repeat: no-repeat;
                background-size: cover;
            }
            .music{
                margin-left: 40%;
                margin-top: 3%;
            }
            .q2_1{
                margin-left: 35%;
                margin-top: 10%;
                color: white;
                font-size: 20px;
            }
            .q2_2{
                margin-left: 33%;
                margin-top: 3%;
                color: white;
                font-size: 20px;
            }
            #submit{
                width: 100px;
                height: 30px;
                border-radius: 10px;
                border: 2px solid white;
                background-color: transparent;
                color: white;
                margin-left: 3%;
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
            audio:hover 
            {
                transform: scale(1.1);
                filter: drop-shadow(2px 3px 3px #333);
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
        </style>
    </head>
    <body>
        <nav>
            <ul>
                <li id="timer">Time Left: <span id="time">100</span> seconds</li>
                <li id="score">Score: <span id="current-score">0</span></li>
            </ul>
        </nav>
        <div class="q2_1">
            <p>Listen the music carefully and answer the question below</p>
        </div>
        <audio class="music" src="Baby_320(PaglaSongs) (mp3cut.net).mp3" controls>
            Your browser does not support the audio tag.
        </audio>
        <div class="q2_2">
            <p>The most repeated word count in the song is your requires answer</p>
            <input type="text" name="answer" id="answer">
            <input type="submit" value="Submit" id="submit" onclick="verify()"> 
        </div>
        <script>
             var timeLeft = 100;
            startTimer();
            function startTimer() {
                let timer = setInterval(() => {
                timeLeft--;
                document.getElementById('time').innerHTML = timeLeft;
                if (timeLeft === 0) {
                    clearInterval(timer);
                    endGame();
                }
                },1000);
            }
            function verify(){
            var answer=parseInt(document.getElementById("answer").value);
            if(answer===19)
            {
                <?php
                    session_start();
                      $conn=new mysqli("localhost","root","","CaptureTheFlag");
                      if($conn->connect_error)
                      {
                          die("Connection failed: " . $conn->connect_error);
                      }
                        $sql="UPDATE levels SET unlocked=TRUE WHERE username='$_SESSION[username]' AND level='Level 3'";  
                        $result=$conn->query($sql);
                        $conn->close();
                
                ?>
                    window.location.href="clue2.php";
            }
            else{
                alert("Wrong Answer");
            }
        }
        </script>
    </body>
</html>