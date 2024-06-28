<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload</title>
    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    
</body>
</html>
<?php

include('connect.php');

session_start();

$id = $_SESSION['id'];
// echo $id;

// for pdf
$pdf = $_FILES['pdf']['name'];
$tmp_pdfname = $_FILES['pdf']['tmp_name'];


// Move uploaded pdfs
move_uploaded_file($tmp_pdfname,"../uploads/documents/$pdf");

// Insert into DB
$sql = "UPDATE `userdata` SET `pdf` = '$pdf' WHERE `userdata`.`id` = '$id'";

$result = mysqli_query($con, $sql);

if($result == "")
{
    echo "";
}
if($result)
{
    $_SESSION['docsuccess'] = "success";

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Document upload successful!</strong> Pending for approval
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    
    echo '<script>
    window.location="../partials/profile.php"</script>';

}
else
{
    $_SESSION['docsuccess'] = "fail";
}


if($_SESSION['docsuccess'] == "fail")
{
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Document upload failed!</strong> Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

?>