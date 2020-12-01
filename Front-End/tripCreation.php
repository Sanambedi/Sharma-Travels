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
        if(isset($_POST['button']))
            {
                move_uploaded_file($_FILES['image1']['tmp_name'],"../images/".$_FILES['image1']['name']);
                $img1="../images/".$_FILES['image1']['name'];
                move_uploaded_file($_FILES['image2']['tmp_name'],"../images/".$_FILES['image2']['name']);
                $img2="../images/".$_FILES['image2']['name'];
                move_uploaded_file($_FILES['image3']['tmp_name'],"../images/".$_FILES['image3']['name']);
                $img3="../images/".$_FILES['image3']['name'];
                $sql="INSERT INTO packages (tolocation,priceforcar,priceforcarnc,pricefortraveller,pricefortravellernc,image1,image2,image3,title,description)
                      VALUES('$_POST[tolocation]',
                             '$_POST[priceforcar]',
                             '$_POST[priceforcarnc]',
                             '$_POST[pricefortraveller]',
                             '$_POST[pricefortravellernc]',
                             '$img1',
                             '$img2',
                             '$img3',
                             '$_POST[title]',
                             '$_POST[description]')";
                            if(!mysqli_query($link, $sql))
                            {
                                die('error:'.mysqli_error($link));
                            } 
            }
    ?>
    <div class="mb-4"></div>
    <br />
    <h1 class="text-white p-2 display-3">Tr<span class="text-warning">i</span><span class="text-primary">p</span>s Creation</h1>
    <form class="text-center p-5 container-fluid" method="post" action='<?php echo $_SERVER['PHP_SELF'];?>' enctype="multipart/form-data">
    <div class="form-row mb-4">
        <div class="col">
            <input type="text"  class="form-control" placeholder="To Location" name="tolocation" required/>
            <small id="" class="text-success">
                Final Destination of the consumer
            </small>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Tour MRP for Car with AC" name="priceforcar" required/>
            <small id="" class="text-success">
                Mrp for car with AC.
            </small>
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <input type="text"  class="form-control" placeholder="Tour MRP for car without AC" name="priceforcarnc" required/>
            <small id="" class="text-danger">
                Mrp for tour in Car without AC.
            </small>
        </div>
        <div class="col">
            <input type="text"  class="form-control" placeholder="Travellers MRP with AC" name="pricefortraveller" required/>
            <small id="" class="text-success">
                MRP for traveller with AC 
            </small>
        </div>
    </div>
    <input type="text"  class="form-control" placeholder="Travellers MRP without AC" name="pricefortravellernc" required/>
    <small id="" class="text-danger">
        MRP for traveller without AC 
    </small>
    <div class="mb-4"></div>
    <input type="file" class="form-control" placeholder="image1" name="image1" required/>
    <small id="" class="text-success">
        First Image for location..
    </small>
    <div class="mb-4"></div>
    <input type="file" class="form-control" placeholder="image2" name="image2" required/>
    <small id="" class="text-success">
        Second Image for location..
    </small>
    <div class="mb-4"></div>
    <input type="file" class="form-control" placeholder="image3" name="image3" required/>
    <small id="" class="text-success">
        Third image for location
    </small>
    <div class="mb-4"></div>
    <input type="text" class="form-control" placeholder="Trip Title" name="title" required/>
    <small id="" class="text-success">
        Title Box Entry
    </small>
    <div class="mb-4"></div>
    <textarea class="form-control mb-4" col="4" row="50" placeholder="Tour Description" name="description" required></textarea>
    <button class="btn btn-danger btn-lg btn-block" name="button">Submit</button>
    </form>
</body>
</html>