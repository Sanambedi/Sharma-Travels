<?php
    $tolocation=$_GET["request"];
    include './connection.php';
    $sql = "SELECT * from packages where tolocation='$tolocation'";
    $result = mysqli_query($link,$sql);
    echo "<p class='card-text' name='description' id='description'>".$tolocation."</p>";
    mysqli_close($link);  
?>
