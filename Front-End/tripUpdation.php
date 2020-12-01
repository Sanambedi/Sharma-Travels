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
        include "../Navbar.php";
        include '../connection.php';
        $id="";
        $tolocation="";
        $priceforcar="";
        $priceforcarnc="";
        $pricefortraveller="";
        $pricefortravellernc="";
        $image1="";
        $image2="";
        $image3="";
        $title="";
        $description="";
        if(isset($_GET['id']))
        {
            $result=mysqli_query($link,"SELECT * FROM packages WHERE id='$_GET[id]'");
            while($row=mysqli_fetch_array($result))
            {
                $id=$row['id'];
                $tolocation=$row['tolocation'];
                $priceforcar=$row['priceforcar'];
                $priceforcarnc=$row['priceforcarnc'];
                $pricefortraveller=$row['pricefortraveller'];
                $pricefortravellernc=$row['pricefortravellernc'];
                $image1=$row['image1'];
                $image2=$row['image2'];
                $image3=$row['image3'];
                $title=$row['title'];
                $description=$row['description'];
            }
        }
        if(isset($_POST['button']))
        {
            if(isset($_FILES['image1']) && !empty($_FILES['image1']['name']))
            {
                move_uploaded_file($_FILES['image1']['tmp_name'],"../images/".$_FILES['image1']['name']);
                $img1="../images/".$_FILES['image1']['name'];
            }
            else
            {
                $img1=$_POST['txtimg'];
            }
            if(isset($_FILES['image2']) && !empty($_FILES['image2']['name']))
            {
                move_uploaded_file($_FILES['image2']['tmp_name'],"../images/".$_FILES['image2']['name']);
                $img2="../images/".$_FILES['image2']['name'];
            }
            else
            {
                $img2=$_POST['txtimg1'];
            }
            if(isset($_FILES['image3']) && !empty($_FILES['image3']['name']))
            {
                move_uploaded_file($_FILES['image3']['tmp_name'],"../images/".$_FILES['image3']['name']);
                $img3="../images/".$_FILES['image3']['name'];
            }
            else
            {
                $img3=$_POST['txtimg2'];
            }
            $sql= "UPDATE packages set
            tolocation='$_POST[tolocation]',
            priceforcar='$_POST[priceforcar]',
            priceforcarnc='$_POST[priceforcarnc]',
            pricefortraveller='$_POST[pricefortraveller]',
            pricefortravellernc='$_POST[pricefortravellernc]',
            image1='$img1',
            image2='$img2',
            image3='$img3',
            title='$_POST[title]',
            description='$_POST[description]'
            WHERE
            id='$_POST[id]'";
            if(!mysqli_query($link,$sql))
            {
                die('error:' .mysqli_error($link));
            }
            mysqli_close($link);
            header('location:viewTable.php');
        }
    ?>
    <div class="mb-4"></div>
    <br />
    
    <h1 class="text-white p-2 display-3">Tr<span class="text-warning">i</span><span class="text-primary">p</span>s Updation</h1>
    <form class="text-center p-5 container-fluid" method="post" action='<?php echo $_SERVER['PHP_SELF'];?>' enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id;?>" name="id">
    <div class="form-row mb-4">
        <div class="col">
            <input type="text"  class="form-control" placeholder="To Location" name="tolocation" value="<?php echo $tolocation ?>"/>
            <small id="" class="text-success">
                Final Destination of the consumer
            </small>
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Tour MRP for Car" name="priceforcar" value="<?php echo $priceforcar;?>" />
            <small id="" class="text-success">
                Mrp for tour in car with AC.
            </small>
        </div>
    </div>
    <div class="form-row mb-4">
        <div class="col">
            <input type="text"  class="form-control" placeholder="Tour Mrp For Car without AC" name="priceforcarncnc" value="<?php echo $priceforcarnc ;?>" />
            <small id="" class="text-danger">
                Mrp for tour in Car without AC
            </small>
        </div>
        <div class="col">
            <input type="text"  class="form-control" placeholder="Tour Mrp For Traveller with AC" name="pricefortraveller" value="<?php echo $pricefortraveller ;?>" />
            <small id="" class="text-success">
                Mrp for tour in traveller with AC
            </small>
        </div>
    </div>
    <input type="text"  class="form-control" placeholder="Tour Mrp For Traveller without AC" name="pricefortravellernc" value="<?php echo $pricefortravellernc ;?>" />
    <small id="" class="text-danger">
        Mrp for tour in traveller without AC
    </small>
    <div class="mb-4"></div>
    <input type="file" class="form-control" placeholder="image1" name="image1" value="<?php echo $image1 ?>"/>
    <small id="" class="text-success">
    <input type ="text" name="txtimg" value="<?php echo $image1; ?>" hidden="hidden" />
        First image for location..
    </small>
    <div class="mb-4"></div>
    <input type="file" class="form-control" placeholder="image2" name="image2" value="<?php echo $image2?>" />
    <small id="" class="text-success">
    <input type ="text" name="txtimg1" value="<?php echo $image2; ?>" hidden="hidden" />
        Second Image for location..
    </small>
    <div class="mb-4"></div>
    <input type="file" class="form-control" placeholder="image3" name="image3" value="<?php echo $image3 ?>" />
    <small id="" class="text-success">
    <input type ="text" name="txtimg2" value="<?php echo $image3; ?>" hidden="hidden" />
        Third image for location
    </small>
    <div class="mb-4"></div>
    <input type="text" class="form-control" placeholder="Trip Title" name="title" value="<?php echo $title ?>" />
    <small id="" class="text-success">
        Title Box Entry
    </small>
    <div class="mb-4"></div>
    <textarea class="form-control mb-4" col="4" row="50" placeholder="Tour Description" name="description"><?php echo $description ;?></textarea>
    <button class="btn btn-danger btn-lg btn-block" name="button" id="button">Submit</button>
    </form>
</body>
</html>