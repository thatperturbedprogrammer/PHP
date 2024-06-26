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
                <th width="8%" scope="col">ID</th>
                <th width="10%" scope="col">Password</th>
                <th width="10%" scope="col">Mobile</th>
                <th width="10%" scope="col">Category</th>
                <!-- <th width="6%" scope="col">Document</th> -->
                <th width="5%" scope="col">Voted Status</th>
                <th width="5%" scope="col">Votes</th>
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
                    <td width=12%"><?php echo $row['password']; ?></td>
                    <td width="12%"><?php echo $row['mobile']; ?></td>
                    <td width="12%"><?php echo $row['standard']; ?></td>
                    <!-- <td>//<?php echo $row['photo']; ?></td> -->
                    <td width="5%"><?php echo $row['status']; ?></td>
                    <td width="5%"><?php echo $row['votes']; ?></td>
                </tr>
            </tbody>
        </table>
        <?php
    }

    }

    ?>

</body>

</html>