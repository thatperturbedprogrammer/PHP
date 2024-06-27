<?php
include('./actions/connect.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Voting System</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS file link -->
    <link rel="stylesheet" href="style.css">

</head>

<body class="p-2 m-4 text-dark">
    <h1 class="text-center p-3 text-dark my-2">Voting System</h1>

    <div class="border border-success rounded w-50 mx-auto mb-4" align="center">
        <h2 class="text-center my-3 pt-2 text-success">Login</h2>
        <div class="container text-center">

            <!-- Form -->
            <form action="./actions/login.php" method="POST">
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="text" name="username" id=""
                        placeholder="Enter your ID" required="required">
                </div>
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="text" name="mobile" id=""
                        placeholder="Enter your mobile number" required="required" maxLength="10" minLength="10">
                </div>
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="password" name="password" id=""
                        placeholder="Enter your password" required="required">
                </div>

                <div class="mb-3">
                    <select name="std" id="" class="form-select w-50 m-auto">
                        <option value="candidate">Candidate</option>
                        <option value="voter">Voter</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-light btn-outline-success mb-3 my-4 mx-auto">Login</button>


                <!-- <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Verification Pending">
                    <button class="btn btn-outline-success mb-3 my-4 mx-auto" style="pointer-events: none;"
                        type="button" disabled>Login</button>
                </span> -->

                <!-- <button type="submit" class="btn btn-outline-success mb-3 my-4 mx-auto disabled " aria-disabled="true">Login</button>'; -->

                <p class="text-dark pb-4">Not registered? <a href="./partials/registration.php"
                        class="link-success">Register here</a> </p>

            </form>
        </div>
    </div>
</body>

</html>