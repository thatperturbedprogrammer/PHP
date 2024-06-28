<?php

include('connect.php');

$username = $_POST['username'];
$newusername = strrev($username) . rand();
// $_SESSION['newusername'] = $newusername;

$mobile = $_POST['mobile'];

$password = $_POST['password'];
$newpassword = strrev($password) . rand();
// $_SESSION['newpassword'] = $newpassword;

$cpassword = $_POST['cpassword'];

// for image
$photo = $_FILES['photo']['name'];
$tmp_name = $_FILES['photo']['tmp_name'];

// for selection
$std = $_POST['std'];
 
// Checking passwords

if($password != $cpassword)
{
    echo '<script>alert("Passwords do not match");
    window.location="../partials/registration.php"; 
    </script>';
}

else
{

    // Move uploaded images
    move_uploaded_file($tmp_name,"../uploads/$photo");

    // Insert into DB
    $sql = "INSERT INTO `userdata` (username, mobile, password, photo, standard, status, votes) values ('$username', '$mobile', '$password', '$photo', '$std', 0, 0)";

    $result = mysqli_query($con, $sql);
   
    if($result)
    {
            echo '<script>alert("Registration successful, Your account is now pending for approval");
    window.location="../";
    </script>';
    }
    else
    {
            die(mysqli_error($con));
    }


    if($std == "candidate")
    {
        $sql2 = "INSERT INTO `candidatedocuments` (candidatename) values ('$username')";
        $result2 = mysqli_query($con, $sql2);
    }
}

?>
