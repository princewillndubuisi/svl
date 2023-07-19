<?php
    session_start();
    require '../db/db.php';

    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header('location: ../register.php');
        return;
    } else {
        $first = $conn->real_escape_string(htmlspecialchars($_POST['first']));
        $last = $conn->real_escape_string(htmlspecialchars($_POST['last']));
        $email = $conn->real_escape_string(htmlspecialchars($_POST['email']));
        $number = $conn->real_escape_string(htmlspecialchars($_POST['number']));
        $password = $conn->real_escape_string(htmlspecialchars($_POST['password']));
        $cpassword = $conn->real_escape_string(htmlspecialchars($_POST['cpassword']));

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
        $sql = "INSERT INTO students (firstname, lastname, email, phone, password)
        VALUES ('$first', '$last', '$email', '$number', '$password')";

        // run query
        $query = $conn->query($sql);
        

        // if query is true
        if($query) {

            $_SESSION['message'] = '<div class ="alert alert-success role = "alert">
            New User Created Successfully
            </div>';
              header('location: ../index.php');
              return;

        } else {

            $_SESSION['message'] = '<div class ="alert alert-danger role = "alert">
            Could not create new user.
            </div>';
              echo "<script>
                  window.history.back();
                  </script>";
              exit;
        }
}
    
?>