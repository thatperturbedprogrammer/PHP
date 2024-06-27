<?php

include('../actions/connect.php');
session_start();

if(!isset($_SESSION['id']))
{
    // Redirect to homepage
    header("location:../");
}

$cid = $_SESSION['id'];
$data = $_SESSION['data'];

// if($data['verified'] == "denied")
// {
//     echo '<div class="alert alert-danger mb-0" role="alert">
//     <strong>Verification Pending</strong> You should check in after some time.
//   </div>';

// }

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
    <title>Dashboard</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS file link -->
    <link rel="stylesheet" href="../style.css">
</head>

<body class="p-2 m-4 border border-success rounded">
    <!-- Welcome Username -->
    <div class="text-success px-3 py-2 m-3 border border-dark rounded">
        <strong>Welcome, <?php echo $data['username']; ?></strong>
    </div>

    <div class="mx-3 my-3">
        <a href="dashboard.php"><button class="btn btn-outline-dark">Back</button></a>

        <a href="profile.php"><button class="btn btn-outline-success mx-1">Profile</button></a>

        <a href="logout.php"><button class="btn btn-outline-danger mx-1">Logout</button></a>
    </div>

    <!-- <hr class="bg-primary py-2">

    <h1 align="center" class="text-success my-3">Voting System</h1>

    <div class="row-md-5 mx-4"> -->

        <!--  
        <div class="col-md-5">

            Voter profile
            <h3 class="mb-3">Voter Profile</h3>

            <img src="../uploads/<?php echo $data['photo'];?>" alt="User Image">

            <br><br>

            <strong class="h5">Name:</strong>
            <?php
             echo $data['username'];
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
        -->

        <!-- <hr class="border border-dark py-1"> -->

        <div class="col-md-7"></div>
        <!-- Candidates -->

        <?php
        // var_dump($data['verified']);

        if($data['verified'] == "verified")
        {

        if(isset($_SESSION['candidate']))
        {

            $candidate = $_SESSION['candidate'];
        ?>

            <h2 align="center" class="rounded bg-success text-light mb-3 py-2 mx-3"><strong>Candidates</strong></h2>

            <div class="mx-3">
        
            <?php
            for($i=0; $i<count($candidate); $i++)
            {
            ?>
        
            <div class="row">

            <div class="col-md-4 mb-3">
                <img src="../uploads/<?php echo $candidate[$i]['photo']?>" alt="Candidate Image">
            </div>
            <div>

                <strong class="h5 my-4 py-2">Candidate Name:</strong>
                <?php echo $candidate[$i]['username']?><br>

                
                <!-- //<?php
                // $sql = "SELECT `milestone` FROM `candidatedocuments` WHERE `candidatedocuments`.`id` = $i+1";

                // $result = mysqli_query($con, $sql);

                // $milestone = mysqli_fetch_assoc($result); -->

                // ?>
                <!-- <div class="my-2">
                    <strong class="h5 my-4 py-2">Milestones:</strong><br>
                    <?php
                    // echo $milestone["milestone"];
                    // if ($milestone == ""){
                        // echo "Not added";
                    // } else {
                        // echo $milestone["milestone"];
                    // }
                //?> -->


                    <!-- <strong class="h5">Votes received:</strong>
                <?php echo $candidate[$i]['votes']?><br> -->

                </div>

            </div>



            <!-- Vote for this candidate -->
            <!-- Form -->
            <form action="../actions/voting.php" method="POST">

                <!-- Hidden Input Fields -->
                <input type="hidden" name="candidatevotes" value="<?php echo $candidate[$i]['votes']?>">
                <input type="hidden" name="candidateid" value="<?php echo $candidate[$i]['id']?>">


                <?php

        // if user has voted
        if($_SESSION['status'] == 1)
        {
            ?>

                <button class="bg-success my-3 text-white px-3">Voted</button>

                <?php
        }
        else
        {
            ?>

                <button class="bg-danger my-3 text-white px-3" type="submit">Vote</button>

                <?php
        }

        ?>
            </form>

            <hr class="text-success">

            <?php
        }
        }

        else
        {
            ?>
            <div class="container text-center">
                <h1><b>Nothing to display</b></h1>
            </div>
            <?php
        }
        ?>

            <?php

    }

    else
    {
        ?>
            <div class="container text-center">
                <h1 class="text-danger mb-2" align="center"><b>You are not verified</b></h1>
                <span class="text-danger text-center"><em>Verification Pending, Please Logout and check in after some time...</em></span>

            </div>
            <?php
        
    }

    ?>

    </div>
    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
</body>

</html>