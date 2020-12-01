<?php
	$varEmail=$_GET["email"];
	include './connection.php';
	$sql="SELECT * FROM userdetails where email='$varEmail' ";
	$result=mysqli_query($link,$sql);
	$count=mysqli_num_rows($result);
	if($count!=0)
	{
		if($row=mysqli_fetch_array($result))
		{
			echo "<b> $varEmail is already taken. Try Another </b>";
 		}
	}
	mysqli_close($link);
?>