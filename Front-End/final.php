<?php
    session_start();
    $Destination=$_POST['Destination'];
    $Members=$_POST['Members'];
    $Arrival=$_POST['Arrival'];
    $Departure=$_POST['Departure'];
    if($_POST['Destination']=="" || $_POST['Members']=="")
    {
        header("Location: Pricing.php");
    } 
?>
<?php
    $DepartureInnova=$Departure*2500;
    $DepartureInnovanc=$Departure*2300;
    $DepartureTraveller=$Departure*3000;
    $DepartureTravellernc=$Departure*2700;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./final.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
    <script>   
        jQuery(function(){
            jQuery('input[type=submit]').click(
            function(){return confirm('Are you sure?');
            });
        });
    </script>
</head>
<body>
    <?php
        include "../Navbar.php";
        include "../connection.php";
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 colored fullVertical">
                <div class="mb-4"></div>
                <div class="p-4"></div>
                <div id="carouselExampleControls" class="carousel slide imageResponsive" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <?php 
                                $sql = "SELECT * from packages where tolocation='$Destination'";
                                $result = mysqli_query($link,$sql);
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo "<img src='".$row['image1']."' class='d-block w-100' height='178px'>";                
                                }    
                            ?>
                        </div>
                        <div class="carousel-item">
                            <?php 
                                $sql = "SELECT * from packages where tolocation='$Destination'";
                                $result = mysqli_query($link,$sql);
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo "<img src='".$row['image2']."' class='d-block w-100' height='178px'>";                
                                }    
                            ?>
                        </div>
                        <div class="carousel-item">
                            <?php 
                                $sql = "SELECT * from packages where tolocation='$Destination'";
                                $result = mysqli_query($link,$sql);
                                while($row=mysqli_fetch_array($result))
                                {
                                    echo "<img src='".$row['image3']."' class='d-block w-100' height='178px'>";                
                                }    
                            ?>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                    <?php 
                        $sql = "SELECT * from packages where tolocation='$Destination'";
                        $result = mysqli_query($link,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            echo "<h1 class='card-title mt-4 mb-4'>".$row['title']."</h1>";
                        }
                    ?>
                    <?php 
                        $sql = "SELECT * from packages where tolocation='$Destination'";
                        $result = mysqli_query($link,$sql);
                        while($row=mysqli_fetch_array($result))
                        {
                            echo "<p class='card-text mt-4'>This trip with ".$Members." members is going to soothe you and refresh you ".$row['description']."</p>";
                        }
                    ?>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 bg-muted fullVertical">
                <div class="mt-4 mb-4"></div>
                <div class="p-3"></div>
                <table class="table table-success semiVertical">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Car-Type</th>
                            <th scope="col">Functionality</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Book</th>
                        </tr>
                    </thead>
                    <tbody>
                    <form action="userDashboard.php" method="post">
                        <th scope='row'>1</th>
                        <?php
                            
                            if($Members<=7)
                            {
                                $Vehicle="Innova";
                                $Type="With AC";
                                echo "<td>".$Vehicle."</td>";
                                echo "<td>".$Type."</td>";
                                $sql = "SELECT * from packages where tolocation='$Destination'";
                                $result = mysqli_query($link,$sql);
                                while($row=mysqli_fetch_array($result))
                                {
                                   $num1 = $row['priceforcar'] +$DepartureInnova;
                                }
                                echo "<td>".$num1."</td>";
                                echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button'></td>";
                            }
                            else
                            {
                                $Vehicle="Tempo Traveller";
                                $Type="With AC";
                                echo "<td>".$Vehicle."</td>";
                                echo "<td>".$Type."</td>";
                                $sql = "SELECT * from packages where tolocation='$Destination'";
                                $result = mysqli_query($link,$sql);
                                while($row=mysqli_fetch_array($result))
                                {
                                    $num1 = $row['pricefortraveller'] +$DepartureTraveller;
                                }
                                echo "<td>".$num1."</td>";
                                echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button' name='button' /></td>";
                            }
                            if(isset($_POST['button']))
                            {
                                $sql="INSERT INTO userdashboard(location,name,email,phonenumber,date,duration,members,price,timestamp,Vehicle,Type,action)
                                      VALUES('$_POST[Destination]',
                                             '$_SESSION[uid]',
                                             '$_SESSION[email]',
                                             '$_SESSION[phoneNumber]',
                                             '$_POST[Arrival]',
                                             '$_POST[Departure]',
                                             '$_POST[Members]',
                                             '$num1',
                                             NOW(),
                                             '$Vehicle',
                                             '$Type',
                                             'Pending')";
                                      if(!mysqli_query($link, $sql))
                                      {
                                          die('error:'.mysqli_error($link));
                                      }        
                            }
                        ?>
                    </form>
                        <tr>
                            <form action="userDashboard.php" method="post">
                                <th scope="row">2</th>
                                <?php
                                    if($Members<=7)
                                    {
                                        $Vehicle="Innova";
                                        $Type="Without AC";
                                        echo "<td>".$Vehicle."</td>";
                                        echo "<td>".$Type."</td>";
                                        $sql = "SELECT * from packages where tolocation='$Destination'";
                                        $result = mysqli_query($link,$sql);
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            $num2 = $row['priceforcarnc'] +$DepartureInnovanc;
                                        }
                                        echo "<td>".$num2."</td>";
                                        echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button1' name='button'></td>";
                                    }
                                    else
                                    {
                                        $Vehicle="Tempo Traveller";
                                        $Type="Without AC";
                                        echo "<td>".$Vehicle."</td>";
                                        echo "<td>".$Type."</td>";
                                        $sql = "SELECT * from packages where tolocation='$Destination'";
                                        $result = mysqli_query($link,$sql);
                                        while($row=mysqli_fetch_array($result))
                                        {
                                            $num2 = $row['pricefortravellernc'] +$DepartureTravellernc;
                                        }
                                        echo "<td>".$num2."</td>";
                                        echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button1' name='button'></td>";
                                    }
                                    if(isset($_POST['button1']))
                                        {
                                            $sql="INSERT INTO userdashboard(location,name,email,phonenumber,date,duration,members,price,timestamp,Vehicle,Type,action)
                                                VALUES('$_POST[Destination]',
                                                        '$_SESSION[uid]',
                                                        '$_SESSION[email]',
                                                        '$_SESSION[phoneNumber]',
                                                        '$_POST[Arrival]',
                                                        '$_POST[Departure]',
                                                        '$_POST[Members]',
                                                        '$num2',
                                                        NOW(),
                                                        '$Vehicle',
                                                        '$Type',
                                                        'Pending')";
                                                if(!mysqli_query($link, $sql))
                                                {
                                                    die('error:'.mysqli_error($link));
                                                }        
                                        }
                                ?>
                            </form>
                        </tr>
                        <tr>
                            <form action="userDashboard.php" method="post">
                                <th scope="row">3</th>
                                <?php
                                    if($Members<=7)
                                    {
                                        $money = "1000 (Base Price) + &#x20B9; 12/Km";
                                        $Vehicle="Innova";
                                        $Type="With AC";
                                        echo "<td>".$Vehicle."</td>";
                                        echo "<td>".$Type."</td>";
                                        echo "<td>".$money."</td>";
                                        echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button2' name='button'></td>";
                                    }
                                    else
                                    {
                                        $money = "2000 (Base Price) + &#x20B9; 15/Km";
                                        $Vehicle="Tempo Traveller";
                                        $Type="With AC";
                                        echo "<td>".$Vehicle."</td>";
                                        echo "<td>".$Type."</td>";
                                        echo "<td> ".$money." </td>";
                                        echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button2' name='button'></td>";
                                    }
                                    if(isset($_POST['button2']))
                                        {
                                            $sql="INSERT INTO userdashboard(location,name,email,phonenumber,date,duration,members,price,timestamp,Vehicle,Type,action)
                                                VALUES('$_POST[Destination]',
                                                        '$_SESSION[uid]',
                                                        '$_SESSION[email]',
                                                        '$_SESSION[phoneNumber]',
                                                        '$_POST[Arrival]',
                                                        '$_POST[Departure]',
                                                        '$_POST[Members]',
                                                        '$money',
                                                        NOW(),
                                                        '$Vehicle',
                                                        '$Type',
                                                        'Pending')";
                                                if(!mysqli_query($link, $sql))
                                                {
                                                    die('error:'.mysqli_error($link));
                                                }        
                                        }
                                ?>
                            </form>
                        </tr>
                        <tr>
                            <form action="userDashboard.php" method="post">
                                <th scope="row">4</th>
                                <?php
                                    if($Members<=7)
                                    {
                                        $money1=" 800 (Base Price) + &#x20B9; 10/Km";
                                        $Vehicle="Innova";
                                        $Type="Without AC";
                                        echo "<td>".$Vehicle."</td>";
                                        echo "<td>".$Type."</td>";
                                        echo "<td>" .$money1. "</td>";
                                        echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button3' name='button'></td>";
                                    }
                                    else
                                    {
                                        $money1="1800 (Base Price) + &#x20B9; 13/Km";
                                        $Vehicle="Tempo Traveller";
                                        $Type="Without AC";
                                        echo "<td>".$Vehicle."</td>";
                                        echo "<td>".$Type."</td>";
                                        echo "<td> ".$money1."</td>";
                                        echo "<td><input type='submit' value='Book' class='btn btn-primary' name='button3' name='button'></td>";
                                    }
                                    if(isset($_POST['button3']))
                                        {
                                            $sql="INSERT INTO userdashboard(location,name,email,phonenumber,date,duration,members,price,timestamp,Vehicle,Type,action)
                                                VALUES('$_POST[Destination]',
                                                        '$_SESSION[uid]',
                                                        '$_SESSION[email]',
                                                        '$_SESSION[phoneNumber]',
                                                        '$_POST[Arrival]',
                                                        '$_POST[Departure]',
                                                        '$_POST[Members]',
                                                        '$money1',
                                                        NOW(),
                                                        '$Vehicle',
                                                        '$Type',
                                                        'Pending')";
                                                if(!mysqli_query($link, $sql))
                                                {
                                                    die('error:'.mysqli_error($link));
                                                }        
                                        }
                                    
                                ?>
                            </form>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>