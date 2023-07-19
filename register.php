<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container d-flex justify-content-center">
        <div class="w-75 my-5">
            <h1>Register</h1>
            <form method="POST" action="controller/register.php">
                <div class="mb-3">
                    <label class="form-label">First name</label>
                    <input type="text" class="form-control" name="first"  >
                </div>

                <div class="mb-3">
                    <label  class="form-label">Last name</label>
                    <input type="text" class="form-control" name="last" >
                </div>

                <div class="mb-3">
                    <label class="form-label">Email address</label>
                    <input type="email" class="form-control" name="email"  >
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" class="form-control" name="number"  >
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password"  >
                </div>

                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="cpassword"  >
                </div>

                <div class="mb-3">
                <?php
                    if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                        unset ($_SESSION['message']);
                    }
                ?>
                </div>

                <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <a href="index.php">Back</a>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
