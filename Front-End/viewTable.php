<?php
session_start();
if($_SESSION['email']!=="arpitabedi4@gmail.com")
{
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./trips.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>
    <?php
        include "../connection.php";
        include "../Navbar.php";
        echo "<div class='mb-4'></div>
        <br />";
        $result = mysqli_query($link,"SELECT * from packages");
        echo "<table class='table'>";
            echo"<thead>";
                echo"<tr class='bg-white'>
                        <th>Trip-id</th>
                        <th>Final Destination</th>
                        <th>Price for Innova(AC)</th>
                        <th>Price for Innova(NON-AC)</th>
                        <th>Price for Traveller(AC)</th>
                        <th>Price for Traveller(NON-AC)</th>
                        <th>First Image</th>
                        <th>Second Image</th>
                        <th>Third Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Delete</th>";
                echo"</tr>";
                while($row = mysqli_fetch_array($result))
                {
                    echo"<tr>";
                    echo"<td><a class='text-danger' href='tripUpdation.php?id=".$row['id']."'>".$row['id']."
                        </a></td>
                            <td class='text-success'>".$row['tolocation']."</td>
                            <td class='text-success'>".$row['priceforcar']."</td>
                            <td class='text-success'>".$row['priceforcarnc']."</td>
                            <td class='text-success'>".$row['pricefortraveller']."</td>
                            <td class='text-success'>".$row['pricefortravellernc']."</td>
                            <td><img src='".$row['image1']."' width='50px' height='50px'/></td>
                            <td><img src='".$row['image2']."' width='50px' height='50px'/></td>
                            <td><img src='".$row['image3']."' width='50px' height='50px'/></td>
                            <td class='text-success'>".$row['title']."</td>
                            <td class='text-success'>".$row['description']."</td>
                            <td><a href='deleteTrip.php?id=".$row['id']."' class='text-danger'>DELETE</a></td>";
                    echo"</tr>";        
                }
            echo "</thead>";
        echo"</table>";        
    ?>
</body>
</html>