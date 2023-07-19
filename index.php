<?php
session_start();
 require 'db/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .color-blue {
            color: blue;
        }

        .color-red {
            color: red;
        }

        td, th {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">LIST OF STUDENTS</h2>
        <div class="my-3">
                <?php
                if(isset($_SESSION['message'])){
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" action="profile.php">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>FULLNAME</th>
                        <th>GENDER</th>
                        <th>EMAIL</th>
                        <th>NUMBER</th>
                        <th>VIEW</th>
                        <th>EDIT</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                     $sql = "SELECT * FROM students ORDER BY id DESC";
                     $query = $conn->query(query: $sql);
                    //  var_dump($query)
                     if($query->num_rows > 0) {
                        $count = 1;
                        while($data = $query->fetch_assoc()) {
                    ?>

                        <tr>
                        <td><?=$count++?></td>
                        <td><?=$data['firstname']." ".$data['lastname'] ?></td>
                        <td><?=$data['gender']?></td>
                        <td><?=$data['email']?></td>
                        <td><?=$data['phone']?></td>
                        <td><a href="profile.php?id=<?=$data['id']?>"><i class="fa fa-eye color-blue"></i></a></td>
                        <td><a href="controller/edit.php?id=<?=$data['id']?>"><i class="fa fa-edit color-blue"></i></a></td>
                        <td><a href="controller/delete.php?id=<?=$data['id']?>"><i class="fa fa-trash color-red"></i></a></td>
                        </tr>

                    <?php
                           }
                     } else {
                    ?>
                    
                        <td colspan='7'>
                        <span>no Registered Student</span>
                        </td>
                    <?php
                     }
                     ?>
                 
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>