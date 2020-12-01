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
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        include "../connection.php";
        include "../Navbar.php";
    ?> 
    <div class="mt-4 mb-4"></div>
    <div class="p-4"></div>
    <div class="container-fluid">
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Location</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Trip Date</th>
      <th scope="col">Duration</th>
      <th scope="col">Members</th>
      <th scope="col">Price</th>
      <th scope="col">Booking Day</th>
      <th scope="col">Vehicle</th>
      <th scope="col">Type</th>
      <th scope="col">Action</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
        <?php
            $sql = "SELECT * from userdashboard ORDER BY id DESC"; 
            $result = mysqli_query($link,$sql);
            $i=1;
            while($row=mysqli_fetch_array($result))
            {
                echo "<tr>";
                    echo "<th scope='row'><a class='text-danger' href='statusUpdation.php?id=".$row['id']."'>".$i."</th>";
                        echo "<td>".$row['location']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['phonenumber']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>".$row['duration']."</td>";
                        echo "<td>".$row['members']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td>".$row['timestamp']."</td>";
                        echo "<td>".$row['Vehicle']."</td>";
                        echo "<td>".$row['Type']."</td>";
                        echo "<td>".$row['action']."</td>";
                        echo "<td><a href='deleteQuery.php?id=".$row['id']."' class='text-danger'>DELETE</a></td>";
                echo "</tr>";
                $i=$i+1;    
            }
        ?>
  </tbody>
</table>
    </div>
</body>
</html>