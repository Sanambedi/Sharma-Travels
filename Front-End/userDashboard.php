<?php
    session_start();
    if(empty($_SESSION['uid']))
    {
        header("location:./Signin.php");
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
    <script type="text/javascript">
    jQuery(document).ready(function($) {

      if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
          var hashLocation = location.hash;
          var hashSplit = hashLocation.split("#!/");
          var hashName = hashSplit[1];

          if (hashName !== '') {
            var hash = window.location.hash;
            if (hash === '') {
              alert('Back button was pressed.');
                window.location='userDashboard.php';
                return false;
            }
          }
        });
        window.history.pushState('forward', null, './userDashboard.php');
      }

    });
    </script>
</head>
<body onLoad="noBack();" onpageshow="if (event.persisted) noBack();" onUnload="">
    <?php
        include "../connection.php";
        include "../Navbar.php";
    ?>
    <div class="mb-4 mt-4"></div>
    <div class="p-4"></div> 
    <div class="container">
        <h1>Your Pending Booking Requests</h1>
        <div class="p-2"></div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Location</th>
                    <th scope="col">Booking Date</th>
                    <th scope="col">Planned Date</th>
                    <th scope="col">Members</th>
                    <th scope="col">Price</th>
                    <th scope="col">Vehicle</th>
                    <th scope="col">Type</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <?php
                $sql = "SELECT * from userdashboard where name='$_SESSION[uid]' and email='$_SESSION[email]' ORDER BY id DESC LIMIT 5";
                $result = mysqli_query($link,$sql);
                $i=1;
                echo "<tbody>";
                while($row=mysqli_fetch_array($result))
                {
                    if($row['action']=='Pending')
                        {
                            echo "<tr>";
                                echo "<th scope='row'>".$i."</th>";
                                echo "<td>".$row['location']."</td>";
                                echo "<td>".$row['timestamp']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td>".$row['members']."</td>";
                                echo "<td> &#8377;".$row['price']."</td>";
                                echo "<td>".$row['Vehicle']."</td>";
                                echo "<td>".$row['Type']."</td>";
                                echo "<td>".$row['action']."</td>";
                            echo "</tr>";                        
                            $i=$i+1; 
                        }
                    else
                    {
                        echo "";
                    }               
                }
                echo "</tbody>";
            ?>
        </table>
        <div class="p-4"></div>
        <h1>Your Completed Bookings</h1>
        <div class="p-2"></div>
            <table class="table table-striped table-dark">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Location</th>
                        <th scope="col">Booking Date</th>
                        <th scope="col">Planned Date</th>
                        <th scope="col">Members</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <?php
                $sql = "SELECT * from userdashboard where name='$_SESSION[uid]' and email='$_SESSION[email]'";
                $result = mysqli_query($link,$sql);
                $i=1;
                echo "<tbody>";
                while($row=mysqli_fetch_array($result))
                {
                    if($row['action']!='Pending')
                        {
                            echo "<tr>";
                                echo "<th scope='row'>".$i."</th>";
                                echo "<td>".$row['location']."</td>";
                                echo "<td>".$row['timestamp']."</td>";
                                echo "<td>".$row['date']."</td>";
                                echo "<td>".$row['members']."</td>";
                                echo "<td> &#8377;".$row['price']."</td>";
                                echo "<td>".$row['action']."</td>";
                            echo "</tr>";                        
                            $i=$i+1;
                        }
                    else
                    {
                        echo "";
                    }            
                }
                echo "</tbody>";
            ?>
            </table>
        </div>
</body>
</html>