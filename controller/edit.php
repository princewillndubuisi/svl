<?php
    session_start();
    require '../db/db.php';
    
    if($_SERVER['REQUEST_METHOD'] == 'GET'){
        header('location: ../edit.php');

        $sql = "SELECT * FROM students WHERE id = $id";

        $update = $conn->query($sql);
        $data = mysqli_fetch_array($update);
        $id = $data['id'];
        $first = $data['firstname'];
        $last = $data['lastname'];
        $email = $data['email'];
        $number = $data['phone'];
        $password = $data['password'];

        $first = $conn->real_escape_string(htmlspecialchars($_GET['first']));
        $last = $conn->real_escape_string(htmlspecialchars($_GET['last']));
        $email = $conn->real_escape_string(htmlspecialchars($_GET['email']));
        $number = $conn->real_escape_string(htmlspecialchars($_GET['number']));
        $password = $conn->real_escape_string(htmlspecialchars($_GET['password']));
        $cpassword = $conn->real_escape_string(htmlspecialchars($_GET['cpassword']));

        $_SESSION['message'] = null;

        // validate first name
        if(!$first || $first == "" || empty($first) || strlen($first) < 3 || is_numeric($first)) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
            Enter a valid First Name
            </div>';
            echo "<script>
                window.history.back();
                </script>";
            exit;
        }

         // validate last name 
         if(!$last || $last == "" || empty($last) || strlen($last) < 3 || is_numeric($last)) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
            Enter a valid last Name
            </div>';
            echo "<script>
                window.history.back();
                </script>";
            exit;
        }

        // validating email
        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = '<div class="alert alert-danger" role="alert">
            Enter a valid Email Address
            </div>';
            echo "<script>
                window.history.back();
            </script>";
            exit;
        }
        

        // validate phone number 
        if(strlen($number) < 11 || strlen($number) > 11 || empty($number) || !is_numeric($number)) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
            Enter a phone number
            </div>';
            echo "<script>
                window.history.back();
                </script>";
            exit;
        }

        // validate password
        if(empty($password) || $password == "" || strlen($password) < 6) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
           Confirm Password is required with a min. of 6 characters
            </div>';
            echo "<script>
                window.history.back();
                </script>";
            exit;
      
        }

         // validate confirm password
         if(empty($password) || $password == "" || strlen($password) < 6) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
           Confirm Password is required with a min. of 6 characters
            </div>';
            echo "<script>
                window.history.back();
                </script>";
            exit;
      
        }

        // check if passwords matched
        if($cpassword !== $password) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
          Passwords do not match
            </div>';
            echo "<script>
                window.history.back();
                </script>";
            exit;
      
        }

        // check if email has been used
        $sql= "SELECT email FROM students WHERE email = '$email'";
        $check = $conn->query($sql);
        if($check->num_rows > 0) {
            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
            Email has already been used
            </div>';
              echo "<script>
                  window.history.back();
                  </script>";
              exit;
        }

        // sql statement
        $sql = "UPDATE students SET id = $id, firstname = '$first', lastname = '$last', email = '$email', phone = '$number', password = '$password' WHERE id = $id";

        // run query
        $update = $conn->query($sql);
        

        // if query is true
        if($update) {

            $_SESSION['message'] = '<div class ="alert alert-success role = "alert">
            User Updated Successfully
            </div>';
              header('location: ../index.php');
              return;

        } else {

            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
            Could not update user.
            </div>';
              echo "<script>
                  window.history.back();
                  </script>";
              exit;
        }
}
    
?>