<?php

include('../actions/connect.php');

$cid = $_GET['id'];

$candidatemilestone = $_POST['candidatemilestone'];


$sql = "UPDATE `candidatedocuments` SET `milestone` = '$candidatemilestone' WHERE `candidatedocuments`.`id` = $cid;";


if($result = mysqli_query($con, $sql))
{
    header("location: profile.php");
}

?>