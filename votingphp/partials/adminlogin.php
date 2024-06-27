<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Voting System</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- CSS file link -->
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1 class="text-center p-3 mt-2 text-success">Voting System</h1>

    <center>
    <div class="border border-success m-2 p-2 w-50 rounded">
    <div class="bg-success m-1 p-1 rounded">
        <h2 class="text-center my-3 pt-4 text-light">Admin Login</h2>
        <div class="container text-center">

        <!-- Form -->
            <form action="adminhandler.php" method="POST">
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="text" name="admin" id="" placeholder="Enter your username" required="required">
                </div>
              
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="password" name="adminpassword" id="" placeholder="Enter your password" required="required">
                </div>

                <button type="submit" class="btn btn-light btn-outline-dark mb-3 my-4 mx-auto">Login</button>

            </form>
        </div>
    </div>
    </div> 
    </center>
</body>
</html>
