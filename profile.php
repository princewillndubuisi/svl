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
        <div class="w-md-75 my-5">
            <h1 class="text-center">User Info</h1>
            <div class="card text-center">
                <div class="card-header">
                    Profile
                </div>
                <div class="card-body">
                    <img src="assets/images/default-profile-pic.jpg" style="width: 120px;" class="mb-3" alt="">
                    <h5 class="card-title"><?php echo $_POST["first"]; ?></h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="edit.php" class="btn btn-primary">Edit</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>