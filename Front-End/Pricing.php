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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            $("#datepicker").datepicker({
                altField: '#hiddenDate',
                altFormat: 'yy-mm-dd',
                maxDate: '1M',
                minDate: '0D'
            });
        });
    </script>
</head>


<body>
    
    <?php include "../Navbar.php";
          include "../connection.php";
    ?>
    <?php
        if(isset($_POST['button']))
        {
            $Destination=$_POST["Destination"];
            $Arrival=$_POST["Arrival"];
            $Departure=$_POST["Departure"];
            $Members=$_POST["Members"];
        }
    ?>
    <form action="final.php" method="post">
    <div class="bt-4"></div>
    <div class="jumbotron jumbotron-fluid">
        <div class="mt-4 mb-4"></div>
        <div class="container">
            <h1 class="display-4">Sharma Package Manager</h1>
            <p class="lead">Select Your Destination and Book your dates with our intelligent package manager</p>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <select class="form-control mb-4 mt-4" name="Destination" required>
                    <option value="">--Select Destination--</option>
                    <?php 
                        $sql= "SELECT * FROM packages";
                        $result = mysqli_query($link,$sql);
                        while($row=mysqli_fetch_array($result)){
                            echo "<option value='" .$row['tolocation']."'>".$row['tolocation']."</option>" ;
                        } 
                    ?>
                </select>
                </div>                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <input type="text" id="datepicker" name="Arrival" class="form-control" placeholder="Select Booking Date" required>
                </div>                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                    <select class="form-control mb-4 mt-4" name="Departure" placeholder="Select Trip Duration" required>
                        <option value="">--Select Duration--</option>
                        <option value="2">2 days</option>
                        <option value="3">3 days</option>
                        <option value="4">4 days</option>
                        <option value="5">5 days</option>
                        <option value="6">6 days</option>
                        <option value="7">7 days</option>
                        <option value="8">8 days</option>
                        <option value="9">9 days</option>
                    </select>
                </div>                
                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
                <select class="form-control mb-4 mt-4" name="Members" required>
                    <option value="">--Select Members--</option>
                    <option value="4">4 Members</option>
                    <option value="5">5 Members</option>
                    <option value="6">6 Members</option>
                    <option value="7">7 Members</option>
                    <option value="8">8 Members</option>
                    <option value="9">9 Members</option>
                    <option value="10">10 Members</option>
                    <option value="11">11 Members</option>
                    <option value="12">12 Members</option>
                    <option value="13">13 Members</option>
                    <option value="14">14 Members</option>
                </select>
                </div>                
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <input type="submit" value="Search" class="bbtn btn-primary btn-lg btn-block mb-4 mt-4" name="button">
                </div>                
            </nav>
        </div>    
    </div>
    </form>
</body>
</html>