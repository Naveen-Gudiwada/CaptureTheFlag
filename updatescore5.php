<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
$conn=mysqli_connect('localhost',"root","","capturetheflag");
$score=$_SESSION['level1'];
if($score<0)
{
    $score=0;
}
$sql="UPDATE levels SET score = '$score' WHERE username = '".$_SESSION['username']."' AND level='Level 5'";
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
header("Location:challenges1.php");
?>