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
}

if(!isset($_SESSION['admin']))
{
    // Redirect to admin login
    header("location:adminlogin.php");
}
else
{
    header("location:../admin/admin.php");
}

