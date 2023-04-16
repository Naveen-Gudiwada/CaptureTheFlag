<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
?>
<html>
    <head>
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body{
                margin: 0%;
                background-image:url("homebgblur.png");
                background-repeat: no-repeat;
                background-size: cover;

            }
           .topnav {
    background-color: rgb(58, 215, 19);
    overflow: hidden;
}
table {
        border-collapse: collapse;
        width: 50%;
        margin: auto;
      }
      
      th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
      }
      
      th {
        background-color: #333;
        color: #fff;
      }
      
      tr:nth-child(even) {
        background-color: #f2f2f2;
      }
      body
{
    margin: 0;
}
      tr:hover {
        background-color: grey;
        color: white;
      }
.topnav a {
    float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 15px 30px;
  text-decoration: none;
  font-size: 20px;
}

.data{
    margin-top: 10%;
    margin-left: 30%;
    margin-right: 30%;
    background-color: lightgrey;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 0 10px 0 rgba(0,0,0,0.5);
    text-align: center;
}
.topnav a:hover {
  background-color: lightgreen;
  color: green;
}

.topnav a.active {
  background-color: rgb(69, 159, 189);
  color: white;
}   

.topnav-right {
  float: right;
}
.navigationbar {
            background-color: #4EA685;
            overflow: hidden;
            
        }
        .logout{
            float:right;
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
      <div  class="data">
        <h1>Progress</h1>
        <table>
          <tr>
            <th>Level</th>
            <th>Score</th>
          </tr>
          <?php 
          $conn= new mysqli("localhost","root","","capturetheflag");
          $sql="SELECT * FROM levels WHERE username='$_SESSION[username]' AND unlocked='1'";
          $res=$conn->query($sql);
          if($res->num_rows>0)
          {
            while($row=$res->fetch_assoc())
            {
              echo "<tr><td>".$row['level']."</td><td>".$row['score']."</td></tr>";
            }
          }
          $conn->close();
          ?>
    </body>
</html>