<?php
$conn=new mysqli("localhost","root","","CaptureTheFlag");
if($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}
$user=$_POST['username'];
$email=$_POST['email'];
$pass=$_POST['pswd'];
$sql="INSERT INTO users(username,email,password) VALUES('$user','$email','$pass')";
$res=mysqli_query($conn,$sql);
$sql = "INSERT INTO levels (username,level,unlocked) VALUES ('$user','Level 1', TRUE)";
$res=mysqli_query($conn,$sql);
for ($i = 2; $i <= 5; $i++) {
    $sql = "INSERT INTO levels (username,level,unlocked) VALUES ('$user','Level $i',FALSE)";
    $res=mysqli_query($conn,$sql);
}
header("Location:login.html");
$conn->close();
?>