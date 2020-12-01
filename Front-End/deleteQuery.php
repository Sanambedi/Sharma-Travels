<?php
session_start();
if($_SESSION['email']!=="arpitabedi4@gmail.com")
{
    header("location:./index.php");
}
if($_SESSION['email']!=="arpitabedi4@gmail.com")
{
    header("location:./index.php");
}
    include '../connection.php';       
    if(isset($_GET['id'])){
        mysqli_query($link,"DELETE FROM userdashboard WHERE id='$_GET[id]'");
    }
    mysqli_close($link);
    header('location:userQueries.php');
?>