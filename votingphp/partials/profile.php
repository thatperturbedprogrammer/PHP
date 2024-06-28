<?php

include('../actions/connect.php');
session_start();

if(!isset($_SESSION['id']))
{
    // Redirect to homepage
    header("location:../");
}

$data = $_SESSION['data'];

// status
if($_SESSION['status'] == 1)
{
    $status = '<b class="text-success">Voted</b>';
}
else
{
    $status = '<b class="text-danger">Not Voted</b>';
}

// verified
if($data['verified'] == "verified")
{
    $verifystatus = '<b class="text-success">Verified</b>';
}
elseif($data['verified'] == "denied")
{
    $verifystatus = '<b class="text-danger">Denied</b>';
}
else
{
    $verifystatus = '<b class="text-warning">Pending</b>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS file link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="p-2 m-4 border border-success rounded">

    <!-- Profile -->
    <div class="mx-3">
        <h2 class="my-3 mb-3 px-3 py-2 bg-outline-success text-outline-green rounded border border-dark"><strong>Profile</strong></h2>

        <a href="dashboard.php"><button class="btn btn-outline-dark">Back</button></a>
        <a href="dashboard.php"><button class="btn btn-outline-success mx-2">Home</button></a>
        <a href="logout.php"><button class="btn btn-outline-danger">Logout</button></a>

        <center>
        <div class="font-sm">
            <img src="../uploads/<?php echo $data['photo'];?>" alt="User Image">
        </div>

        <br>

        <strong class="fs-5">ID:</strong>
        <?php
        echo '<b class="text-primary">' . $data['username'] . '</b>';
        ?>
        <br><br>

        <strong class="fs-5">Password:</strong>
        <?php
        echo $data['password'];
        ?>
        <br><br>

        <strong class="fs-5">Mobile:</strong>
        <?php
        echo $data['mobile'];
        ?>
        <br><br>

        <strong class="fs-5">Verification Status:</strong>
        <?php
        echo $verifystatus;
        ?>
        <br><br>

        <strong class="fs-5">Voting Status:</strong>
        <?php
        echo $status;
        ?>
        <br><br>
    </center>
    </div>


    <!-- Document Upload -->

        <div class="border border-success rounded w-50 mx-auto my-auto mb-3" align="center">
                <h2 class="text-center my-3 pt-3 text-success">Upload Document</h2>
                <div class="container text-center">

            <!-- Form -->
            <form action="../actions/profiledocupload.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">

                <div class="mb-3">
                    <label for="photo" class="text-dark mb-1"><b>Upload Document</b></label>
                    <input class="form-control w-50 m-auto input-group rounded" type="file" name="pdf" id="pdf"
                        required="required">
                </div>

                <button type="submit" class="btn btn-light btn-outline-dark mb-3 my-4 mx-auto">Submit</button>

            </form>

            <?php

            ?>
        </div>

    <!-- End of Document Upload -->

    <!-- <?php

    if($data['standard'] == 'candidate')
    {
        ?>

    <div class="mb-3">
        <form action="candidatedocuments.php?id=<?php echo $data['id']; ?>" method="post">
            <div class="mx-3">
                <label for="candidatemilestone" class="form-label">Enter your milestones</label>
                <textarea class="form-control" id="candidatemilestone" name="candidatemilestone" rows="3"></textarea>
            </div>
    </div>

    <button type="submit" class="btn btn-outline-success mb-3 mx-3">Submit</button>
    </form>


    <?php

    $cid = $data['id'];
    
    $sql = "SELECT `milestone` FROM `candidatedocuments` WHERE `candidatedocuments`.`id` = $cid";

    $result = mysqli_query($con, $sql);

    $milestone = mysqli_fetch_assoc($result);

    ?>
    <div class=" mx-3 mb-2">
    <strong class="fs-5"="fs-6"="fs-4"="font-md"="h5">Milestones:</strong><br>
    <?php
        // echo $milestone["milestone"];
        if ($milestone == ""){
            echo "Nothing";
        } else {
            echo $milestone["milestone"];
        }
    ?>
    <br><br>
    </div>

    
    <?php
    }

    ?>
-->

</body>
</html>