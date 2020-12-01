<?php
session_start();
if(!empty($_SESSION['uid']))
{
    header("location:./index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php include "../Navbar.php"?>
    <form class="text-center border border-light p-5 container" action="logincheck.php" method="POST">
    <h2 class="mt-4 mb-4 text-muted">Sign in</h2>
    <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail">
    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">
<button class="btn btn-info btn-block my-4" name="button">Sign in</button>
<p>Not a member?
    <a href="./Signup.inc.php">Register</a>
</p>

</form>
</body>
</html>