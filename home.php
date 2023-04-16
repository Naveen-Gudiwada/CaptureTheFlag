<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location:login.html");
}
$_SESSION['level1']=100;
$_SESSION['level2']=100;
$_SESSION['level3']=100;
$_SESSION['level4']=100;
$_SESSION['level5']=100;
?>
<html>
    <head>
        <title>Home</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
           /* Add a black background color to the top navigation */
        .navigationbar {
            background-color: #4EA685;
            overflow: hidden;
            
        }

        /* Style the links inside the navigation bar */
        .navigationbar a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        }

        /* Change the color of links on hover */
        .navigationbar a:hover {
        background-color: lightgreen;
        color: black;
        }

        /* Add a color to the active/current link */
        .navigationbar a.active {
        background-color: #04AA6D;
        color: white;
        }
        .logout{
            float:right;
        }
        body{
            margin:0%;
            background-image:url("abstract-blue-geometric-shapes-background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        #rcorners2 {
            border-radius: 25px;
            border: 2px solid #73AD21;
            padding: 20px; 
            width: 200px;
            height: 150px;  
        }
        .bdy{
            margin-top: 1%;
            margin-left: 3%;
            margin-right: 3%;
            display:grid;
            

        }
        </style>
    </head>
    <body>
        <div class="navigationbar">
            <a href="home.php"><i class="fa fa-home">  Home</i></a>
            <a href="challenges1.php"><i class="fa fa-gamepad">  Challenges</i></a>
            <a href="progress.php"><i class="fa fa-bar-chart">  Progress</i></a>
            <div class="logout">
                <a href="profile.php"><i class='fa fa-user' >  <?php echo $_SESSION['username'] ?></i></a>
                <a href="logout.php"><i class="fa fa-sign-out">  Logout</i></a>
            </div>
        </div>
        <div class="bdy">
            <h1>Introduction</h1>
            <p><h3>Welcome to our online treasure hunt game designed to test your soft skills! This game is not only about finding the
                 treasure, but it's also about demonstrating your abilities in verbal aptitude, listening, watching, and problem-solving
                skills.</br>
                You'll need to navigate through a series of challenges that will test your skills in each of these areas. Each challenge
                will provide clues to help you progress to the next level and ultimately lead you to the hidden treasure.</br>
                To succeed in this game, you'll need to pay close attention to details, communicate effectively, and think creatively to 
                solve the puzzles and overcome obstacles. Are you ready to put your skills to the test and claim the treasure? Let's begin!.</br>
                But remember, time is of the essence in this treasure hunt. You'll need to move quickly and efficiently if you want to
                be the first to find the treasure and claim your prize. So, put your thinking cap on, sharpen your mind, and get 
                ready for the adventure of a lifetime!</h3></p>
        </div>
        <script>
            const myDiv = document.getElementById('myDiv');
            myDiv.addEventListener('click', function() {
            alert('Here is your hint!');
        });
        </script>
    </body>
</html>

