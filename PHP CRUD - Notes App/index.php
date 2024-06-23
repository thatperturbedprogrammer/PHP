<?php
// Connect to the Database

$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Notes & TODO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand text-success" href="index.html">Notes & TODO</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>

                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>

            </div>
        </div>
    </nav>

    <?php

      try {
        $conn = mysqli_connect($servername, $username, $password, $database);
        }
        
        catch(Exception $e) {
          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>' . $e->getMessage() . '</strong> You cannot save your notes yet.
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>' ;
        
        }

      ?>

    <div class="mb-3"></div>

    <div class="container">
        <h2 class="mb-3">Add a Note</h2>
        <div class="mb-3 text-success">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
        </div>
        <div class="mb-3 text-success">
            <label for="desc" class="form-label">Description</label>
            <textarea class="form-control" id="desc" name="desc" rows="3" aria-describedby="desc"></textarea>
        </div>

        <button type="submit" class="btn btn-outline-success">Add Note</button>
    </div>


    <div class="container mb-3">
        <h2 class="mb-3 mt-3">Your Notes</h2>

        <?php

        $sql = "SELECT * FROM `notes`";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
          echo '<b>' . $row['srno'] . '.</b>' . ' <b class="text-success">Title: </b>' . $row['title'] . '<br><b class="text-success"> Description: </b>' . $row['description'] . ' <br> <small class="text-primary">@ ' . $row['tstamp'] . '</small>' . '<br> <br>';
        }
        ?>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Sr. No</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>