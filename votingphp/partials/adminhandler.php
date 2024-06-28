<?php

session_start();

$username = $_POST['admin'];
$password = $_POST['adminpassword'];

if($password == "admin")
{
    $_SESSION['admin'] = 'admin';

}
else
{
     // Redirect to admin login
     session_unset();
     session_destroy();
     header("location:adminlogin.php");
    echo "<script>alert('Invalid Credentials')</script>";
}

if(!isset($_SESSION['admin']))
{
    // Redirect to admin login
    echo '<script type="text/javascript">';
    echo 'alert("Invalid Credentials! Try again")';
    echo 'window.location.href="adminlogin.php"';
    echo '</script>';
    
}
else
{
    header("location:../admin/admin.php");
}

?>