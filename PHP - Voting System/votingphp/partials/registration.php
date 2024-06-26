<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class="text-dark">
    <h1 class="text-center p-3 text-dark my-2">Voting System</h1>

    <div class="border border-success rounded w-50 mx-auto my-auto" align="center">
        <h2 class="text-center my-3 pt-3 text-success">Register Account</h2>
        <div class="container text-center">

            <!-- Form -->
            <form action="../actions/register.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="text" name="username" id=""
                        placeholder="Enter your username" required="required">
                </div>
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="text" name="mobile" id=""
                        placeholder="Enter your mobile number" required="required" maxLength="10" minLength="10">
                </div>
                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="password" name="password"
                        id="passwd" placeholder="Enter your password" required="required" maxLength="15" minLength="6">
                    <!-- toggle Password Visibility -->
                    <!-- <input class="form-check-input my-1 mx-2 mt-2" type="checkbox" onclick="showPassword()">Show Password -->
                </div>

                <div class="mb-3">
                    <input class="form-control w-50 m-auto input-group rounded" type="password" name="cpassword"
                        id="cpasswd" placeholder="Confirm password" required="required" maxLength="15" minLength="6">
                    <!-- toggle Password Visibility -->
                    <!-- <input class="form-check-input my-1 mx-2 mt-2" type="checkbox" onclick="showPassword()">Show Password -->
                </div>

                <div class="mb-3">
                    <select name="std" id="std" class="form-select w-50 m-auto">
                        <option value="candidate">Candidate</option>
                        <option value="voter">Voter</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="photo" class="text-dark mb-1"><b>Upload Photo</b></label>
                    <input class="form-control w-50 m-auto input-group rounded" type="file" name="photo" id="photo"
                        required="required">
                </div>

                <button type="submit" class="btn btn-light btn-outline-dark mb-3 my-4 mx-auto">Register</button>

                <p class="text-dark pb-4">Already have an account? <a href="../" class="link-success">Login here</a>
                </p>

            </form>
        </div>
    </div>
<!-- 
    <script>
        function showPassword() 
        {
            var x = document.getElementById("passwd");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script> -->
</body>

</html>