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
        $id="";
        $action="";
        if(isset($_GET['id']))
        {
            $result=mysqli_query($link,"SELECT * FROM userdashboard WHERE id='$_GET[id]'");
            while($row=mysqli_fetch_array($result))
            {
                $id=$row['id'];
                $action=$row['action'];
            }
        }
        if(isset($_POST['button']))
        {
                $sql = "UPDATE userdashboard set action='$_POST[action]' WHERE id='$_POST[id]'";
                   if(!mysqli_query($link,$sql))
                   {
                       die('error:' .mysqli_error($link));
                   }
                   mysqli_close($link);
                   header('location:userQueries.php');
        } 
    ?>
    <div class="mt-4 mb-4"></div>
    <div class="p-4"></div>
    <form class="text-center p-5 container-fluid" method="post" action='<?php echo $_SERVER['PHP_SELF'];?>' enctype="multipart/form-data">
    <input type="hidden" value="<?php echo $id;?>" name="id">        
    <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Type</th>
                        <th scope="col">Previously Marked as</th>
                        <th scope="col">New Change</th>
                        <th scope="col">Final</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Action</td>
                        <td><?php echo $action ;?></td>
                        <td>
                            <select class="form-control" name="action">
                                <option value="Pending">Pending</option>
                                <option value="Request Recieved">Request Recieved</option>
                                <option value="In Progress">In Progress</option>
                                <option value="Completed">Completed</option>                              
                            </select>
                        </td>
                        <td><button class="btn btn-danger btn-lg btn-block" name="button" id="button">Submit</button></td>
                    </tr>
                </tbody>
            </table>
            </div>
    </form>
    
</body>
</html>