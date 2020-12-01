<?php
session_start();
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
    <link rel="stylesheet" href="./Signup.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script>
  function mobclear()
  {
    document.getElementById("errmsg").innerHTML="";
  }
function checkemail(str)
{
 // alert(str);

  if(str=="")
  {
    document.getElementById("errmsg").innerHTML="";
    return;
  }
  if(window.XMLHttpRequest)
  {
    xmlhttp=new XMLHttpRequest();
  }
  else
  {
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function()
  {
    if(xmlhttp.readyState==4 && xmlhttp.status==200)
    {
      document.getElementById("errmsg").innerHTML=xmlhttp.responseText;
    }
}
//alert(str);

xmlhttp.open("GET", "../checkemail.php?email="+ str,true);
xmlhttp.send();
}
</script>
</head>
<body>
    <?php include "../Navbar.php" ?>
    <?php 
        include "../connection.php";
        if(isset($_POST['button']))
        {
            $sql1="SELECT * FROM userdetails WHERE email='".$_POST['email']."' ";
            $result1=mysqli_query($link,$sql1);
            $count=mysqli_num_rows($result1);
            if($count==0)
            {
                $sql="INSERT INTO userdetails(name,secondName,password,phoneNumber,email,address,registrationdate)
                VALUES('$_POST[name]',
                    '$_POST[secondName]',
                    '$_POST[password]',
                    '$_POST[phoneNumber]',
                    '$_POST[email]',
                    '$_POST[address]',
                    NOW())";
                if(!mysqli_query($link, $sql))
                {
                    die('error:'.mysqli_error($link));
                }  
            }
            else
            {
                echo "<script> alert('Email is Already in use'); </script>";    
            }
        }      
    ?>
    <form class="text-center border border-light p-5" method="post" action='<?php echo $_SERVER['PHP_SELF'];?>' enctype="multipart/form-data">
        <h2 class="mt-4 mb-4 text-muted">Sign up</h2>
        <div class="form-row mb-4">
            <div class="col">
                <input type="text" name="name" minlength="4" class="form-control" placeholder="First name" required/>
            </div>
            <div class="col">
                <input type="text" name="secondName" class="form-control" placeholder="Last name" required/>
            </div>
        </div>
        <input type="email" name="email" id="txtemail" onblur=checkemail(this.value)  class="form-control mb-4" placeholder="E-mail" required/>
        <small name="errmsg" id="errmsg" class="form-text text-danger mb-4">
        </small>
        
        <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required/>
        <small name="password" class="form-text text-muted mb-4">
            At least 8 characters and 1 digit
        </small>
        <textarea col="10" row="120" name="address" class="form-control mb-4" placeholder="Permanent Address" required></textarea>
        <small id="address" class="form-text text-muted mb-4">
            Required - for location authentication
        </small>
        <input type="text" name="phoneNumber" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock" reuired>
        <small id="phoneNumber" class="form-text text-muted mb-4">
            Optional - for two step authentication
        </small>
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Subscribe to our newsletter</label>
        </div>
        <button name="button"  class="btn btn-info my-4 btn-block">Sign Up</button>
        
        <hr>
        <p>By clicking
            <em>Sign up</em> you agree to our
        <a href="" target="_blank">terms of service</a>
    </form>
</body>
</html>