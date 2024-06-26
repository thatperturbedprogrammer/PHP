<?php
session_start();

include('connect.php');

$votes = $_POST['candidatevotes'];
$totalvotes = $votes+1;

$cid = $_POST['candidateid'];
$uid = $_SESSION['id'];

// Update Votes
$sql = "update `userdata` set `votes`='$totalvotes' where `id` = '$cid'";
$updatevotes = mysqli_query($con, $sql);

// Update Status
$sql2 = "UPDATE `userdata` SET `status` = '1' WHERE `userdata`.`id` = '$uid'";
$updatestatus = mysqli_query($con, $sql2);

if($updatevotes and $updatestatus)
{
    $sql3 = "SELECT `username`, `photo`, `status`, `id`, `votes` from `userdata` where `standard` = 'candidate'";
    $getcandidate = mysqli_query($con, $sql3);

    $candidate = mysqli_fetch_all($getcandidate, MYSQLI_ASSOC);

    $_SESSION['candidate'] = $candidate;

    $_SESSION['status'] = 1;

    echo '<script>
    alert("Voting Successfull");
    window.location="../partials/dashboard.php";
    </script>
    ';
}
else
{
    echo '<script>
    alert("Technical error!! Vote after sometime");
    window.location="../partials/dashboard.php";
    </script>
    ';
}
?>