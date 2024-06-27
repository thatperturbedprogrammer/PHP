<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-6">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    <!-- Bootstrap CSS link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha364-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container my-3">
        <hr class="text-success">
        <h1 align="center" class="text-success mb-3">Welcome Admin</h1>
        <hr class="text-success">
    </div>

    <!-- <hr class="my-4 py-3 border border-dark"> -->
    <h4 align="center" class="text-dark mb-1">Voters & Candidates List</h4>
    <hr class="my-4 py-2 border border-dark">

    <?php

session_start();

include('../actions/connect.php');

$sql = "select * from  `userdata`";

$result = mysqli_query($con, $sql);

if($result)
{
    ?>
    <table class="table">
        <thead>
            <tr>
                <th width="6%" scope="col">Sr. No</th>
                <th width="10%" scope="col">ID</th>
                <th width="12%" scope="col">Password</th>
                <th width="10%" scope="col">Mobile</th>
                <th width="10%" scope="col">Category</th>
                <!-- <th width="6%" scope="col">Document</th> -->
                <th width="8%" scope="col">Voted Status</th>
                <th width="8%" scope="col">Votes</th>
                <th width="8%" scope="col">Verification</th>
                <!-- <th width="8%" scope="col">Document</th> -->
                <th width="8%" scope="col">Actions</th>
            </tr>
        </thead>

        <?php
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
        <table class="table">
            <!-- <thead>
            <tr>
                <th scope="col">Sr. No</th>
                <th scope="col">Username</th>
                <th scope="col">Standard</th>
                <th scope="col">Document</th>
                <th scope="col">Status</th>
                <th scope="col">Votes</th>
            </tr>
        </thead> -->

            <tbody>
                <tr>
                    <th width="5%"><?php echo $row['id'];?></th>
                    <td width="10%"><?php echo $row['username']; ?></td>
                    <td width=10%"><?php echo $row['password']; ?></td>
                    <td width="10%"><?php echo $row['mobile']; ?></td>
                    <td width="8%"><?php echo $row['standard']; ?></td>
                    <!-- <td>//<?php echo $row['photo']; ?></td> -->
                    <td width="7%"><?php echo $row['status']; ?></td>
                    <td width="7%"><?php echo $row['votes']; ?></td>
                    <td width="7%"><?php echo $row['verified']; ?></td>
                    <div class="font-sm">

            <!-- <img src="../uploads/ <?php echo $data['photo'];?>" alt="User Image">
        </div> -->


                     <td width="7%">
                        <form action="admin.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                            <!-- <input class="btn btn-outline-primary mb-2" type="submit" name="view" value="View"> -->
                            <input class="btn btn-outline-success mb-2" type="submit" name="verify" value="Verify">
                            <input class="btn btn-outline-danger mb-2" type="submit" name="deny" value="Deny">
                            <input class="btn btn-outline-danger mb-2" type="submit" name="delete" value="Delete">

                        </form>
                     </td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    }

    ?>

    <?php


    // View Documents 
    // if(isset($_POST['view']))
    // {
    //     $id = $_POST['id'];

    //     $sql = "SELECT `pdf` FROM `userdata` WHERE `id` = '$id'";
    //     $result = mysqli_query($con, $sql);

    //     $row = mysqli_fetch_assoc($result);
    //     echo '<a href="../uploads/documents .'<?php echo $row['pdf'];?> . '" target="_blank" ></a>';

    // }

    if(isset($_POST['verify']))
    {
        $id = $_POST['id'];

        $sql = "UPDATE `userdata` SET `verified` = 'verified' WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql);

        echo '<script>alert("ID Verified");</script>';

    }

    if(isset($_POST['deny']))
    {
        $id = $_POST['id'];

        $sql = "UPDATE `userdata` SET `verified` = 'denied' WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql);

        echo '<script>alert("ID Denied");</script>';


    }

    if(isset($_POST['delete']))
    {
        $id = $_POST['id'];

        $sql = "DELETE FROM `userdata` WHERE `id` = '$id'";
        $result = mysqli_query($con, $sql);

        echo '<script>alert("ID Deleted");</script>';


    }

    ?>

</body>

</html>