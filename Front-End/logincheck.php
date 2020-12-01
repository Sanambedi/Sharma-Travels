<?php
session_start();
include "../connection.php";
$_SESSION['email']=$_POST['email'];
$password=$_POST['password'];
if(isset($_POST['button']))
{
	
				
    $sqlchk="SELECT * FROM userdetails where email='".$_POST['email']."' and password='".$_POST['password']."'";
	$result = mysqli_query($link,$sqlchk);
	$count=mysqli_num_rows($result);
	if($count==0)
	{
		echo "wrong password";
		unset($_SESSION['uid']);
		session_destroy(); 
	}
	else
	{
		if($row=mysqli_fetch_array($result))
		{
			$_SESSION['uid']= $row['name'];
			$_SESSION['email']=$row['email'];
			$_SESSION['phoneNumber']=$row['phoneNumber'];
			header('location:./index.php');
		}
	
	}
}
?>