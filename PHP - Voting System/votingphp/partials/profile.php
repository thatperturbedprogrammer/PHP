<?php

include('../actions/connect.php');
session_start();

if(!isset($_SESSION['id']))
{
    // Redirect to homepage
    header("location:../");
}

$data = $_SESSION['data'];

if($_SESSION['status'] == 1)
{
    $status = '<b class="text-success">Voted</b>';
}
else
{
    $status = '<b class="text-danger">Not Voted</b>';
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

<body>

    <!-- Profile -->
    <div class="mx-3">
        <h2 class="my-3 mb-3 px-3 py-2 bg-success text-white rounded"><strong>Profile</strong></h2>

        <div class="mb-4"></div>

        <a href="dashboard.php"><button class="btn btn-dark">Back</button></a>
        <a href="../index.php"><button class="btn btn-success mx-2">Home</button></a>
        <a href="logout.php"><button class="btn btn-danger">Logout</button></a>

        <hr class="bg-primary py-2">

        <div>
            <img src="../uploads/<?php echo $data['photo'];?>" alt="User Image">
        </div>

        <br>

        <strong class="h5">ID:</strong>
        <?php
        echo $data['username'];
        ?>
        <br><br>

        <strong class="h5">Password:</strong>
        <?php
        echo $data['password'];
        ?>
        <br><br>

        <strong class="h5">Mobile:</strong>
        <?php
        echo $data['mobile'];
        ?>
        <br><br>

        <strong class="h5">Status:</strong>
        <?php
        echo $status;
        ?>
        <br><br>
    </div>

    <?php

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
    <strong class="h5">Milestones:</strong><br>
    <?php
        echo $milestone["milestone"];
    ?>
    <br><br>
    </div>

    
    <?php
    }

    ?>


</body>

</html>