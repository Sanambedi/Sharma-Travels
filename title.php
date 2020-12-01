<?php   
    $tolocation=$_GET["request"];
    include 'connection.php';
    $sql = "SELECT * from packages where tolocation='$tolocation'";
    $result = mysqli_query($link,$sql);
    echo "<h5 class='card-title'>".$tolocation."</h5>";
    mysqli_close($link);
?>    