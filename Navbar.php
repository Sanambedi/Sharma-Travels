<?php
$url= $_SERVER['REQUEST_URI'];
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand text-warning" href="index.php">Sharma Travels </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="
        <?php
        if($url=='/Sharma-Travels/Front-End/index.php' || $url=='/Sharma-Travels/Front-End/#forward')
        {
          echo 'nav-link text-warning';
        }
        else
        {
          echo 'nav-link';
        }
        ?>" 
        href="./index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="
        <?php
        if($url=='/Sharma-Travels/Front-End/Cars.php')
        {
          echo 'nav-link text-warning';
        }
        else
        {
          echo 'nav-link';
        }
        ?>"
        href="./Cars.php">Our Cars</a>
      </li>
      <li class="nav-item">
        <a class="
        <?php
        if($url=='/Sharma-Travels/Front-End/Features.php')
        {
          echo 'nav-link text-warning';
        }
        else
        {
          echo 'nav-link';
        }
        ?>"
        href="./Features.php">Packages</a>
      </li>
      <li class="nav-item">
        <a class="
        <?php
        if($url=='/Sharma-Travels/Front-End/Pricing.php' || $url=='/Sharma-Travels/Front-End/final.php')
        {
          echo 'nav-link text-warning';
        }
        else
        {
          echo 'nav-link';
        }
        ?>"
        href="./Pricing.php">Pricing</a>
      </li>
      <?php
        if(!empty($_SESSION['uid']))
          {
            echo '<li class="nav-item">';
              echo "<a class='";
              if($url=='/Sharma-Travels/Front-End/userDashboard.php')
              {
                echo "nav-link text-warning'";
              }
              else
              {
                echo "nav-link'";
              }
            echo " href='./userDashboard.php'>User Dashboard</a>";
            echo "</li>";
          }
        else{
          echo "";
        }  
      ?>
      <?php
      if(empty($_SESSION['email']))
      {
        echo "</ul>";
      }
      else if($_SESSION['email']=="arpitabedi4@gmail.com")
      {
        if($url=='/Sharma-Travels/Front-End/tripCreation.php' )
          {
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';      
          }
        else if($url=='/Sharma-Travels/Front-End/viewTable.php' )
          {
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';      
          }  
        else if($url=='/Sharma-Travels/Front-End/userQueries.php' )
          {
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-warning" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';      
          }  
        else
          {
            echo '<li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';      
          }
        echo 'Admin Works
              </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="tripCreation.php">Trip Creation</a>
                  <a class="dropdown-item" href="viewTable.php">View Trips</a>
                  <a class="dropdown-item" href="userQueries.php">User Queries</a>
                </div>
              </li>
            </ul>';
        }
        else
        {
          echo "</ul>";
        }
      ?>
    <form class="form-inline my-2 my-lg-0">';
    <?php 
      if(empty($_SESSION['uid']))
      {
        echo "<a href='./Signin.php'>  
          <div class='btn btn-outline-success my-2 my-sm-0 mr-2'>
            <i class='fa fa-user'></i>
            Login
          </div>
        </a> 
        <a href='./Signup.inc.php'>  
          <div class='btn btn-outline-success my-2 my-sm-0 mr-2' href='#'>
            <i class='fa fa-user-plus'></i>
            SignUp
          </div>
        </a>";
      }
      else
      {
        echo "<a href='./Signout.inc.php'>  
          <div class='btn btn-outline-success my-2 my-sm-0 mr-2' href='#'>
            <i class='fa fa-user-times'></i>
            Log Out
          </div>
        </a> ";
      }
    ?>    
     
    </form>
  </div>
</nav>