<?php
$conn=new mysqli("localhost","root","","CaptureTheFlag");
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST['username'];
$pass=$_POST['pswd'];
$sql="SELECT * FROM users WHERE username='$user' AND password='$pass'";
$res=mysqli_query($conn,$sql);
if($res->num_rows>0)
{
    session_start();
    $_SESSION['username']=$user;
    header("Location:home.php");
}
else
{   
    header("Location:login3.html");
}
$conn->close();
?>