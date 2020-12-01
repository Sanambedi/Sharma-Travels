<?php
session_start();
?>
<?php
unset($_SESSION['uid']);
session_destroy(); 
header('Location:index.php');
?>