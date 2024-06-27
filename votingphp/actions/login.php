<?php

session_start();

include('connect.php');

$username = $_POST['username'];
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$std = $_POST['std'];

// Select SQL
$sql = "SELECT * from `userdata` where `username` = '$username' and `mobile` = '$mobile' and `password` = '$password' and `standard` = '$std'";

$result = mysqli_query($con, $sql);

// Login if verified only
$sql2 =  "SELECT * from `userdata` where `username` = '$username' and `mobile` = '$mobile' and `password` = '$password' and `standard` = '$std' and `verified` = 'verified'";
$result2 = mysqli_query($con, $sql);


if($result2)
{
    // > 0  means data is there, then only able to login
    if(mysqli_num_rows($result)>0)
    {
        // 1 - fetching data of candidate
        $sql = "SELECT `username`,`photo`,`votes`,`id` FROM `userdata` WHERE `standard`='candidate'";
        $resultcandidate = mysqli_query($con, $sql);

        if(mysqli_num_rows($resultcandidate)>0)
        {
            // Fetch all candidates
            $candidate = mysqli_fetch_all($resultcandidate, MYSQLI_ASSOC);

            // Set Session variables for candidate
            $_SESSION['candidate'] = $candidate;
        }

        // 2 - fetching data of voter
        $data = mysqli_fetch_array($result);
        
        // Set Session variables for voter
        $_SESSION['id'] = $data['id'];
        $_SESSION['status'] = $data['status'];
        $_SESSION['data'] = $data;

        echo '<script>
        window.location="../partials/dashboard.php";
        </script>';
    }
    else
    {
        echo '<script>
        alert("Invalid credentials");
        window.location="../";
        </script>';
    }

    }

else
{
    echo '<script>
    alert("Verification pending");
    window.location="../";
    </script>';
}
?>