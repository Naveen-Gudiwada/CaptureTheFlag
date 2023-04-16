<?php
session_start();
if(!isset($_SESSION['username']))
{
    header("Location: login.html");
}
$conn=mysqli_connect('localhost',"root","","capturetheflag");
$score=$_SESSION['level2'];
if($score<0)
{
    $score=0;
}
$sql="UPDATE levels SET score = '$score' WHERE username = '".$_SESSION['username']."' AND level='Level 2'";
$result = mysqli_query($conn, $sql);
if($score!=0)
{
    $sql="UPDATE levels SET unlocked=TRUE WHERE username = '".$_SESSION['username']."' AND level='Level 3'";
    $res=mysqli_query($conn,$sql);
}
mysqli_close($conn);
header("Location:challenges1.php");
?>