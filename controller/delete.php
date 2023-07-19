<?php
session_start();
require '../db/db.php';

    if($_SERVER['REQUEST_METHOD'] !== 'GET') {
        echo "<script>
            window.history.back();
            </script>";
            return;

    } else {

       if(isset($_GET) && isset($_GET['id'])) {
            $id = $conn->real_escape_string(trim(htmlspecialchars($_GET['id'])));

            // check $id variable

            if(empty($id)) {
                echo "<script>
                    window.history.back();
                    </script>";
                 return;
            }

            $sql = "DELETE FROM students WHERE id = '$id'";

            $delete = $conn->query($sql);

            if($delete == true) {
                $_SESSION['message'] = '<div class ="alert alert-success role = "alert">
                User deleted successfully
                </div>';
                echo "<script>
                    window.history.back();
                    </script>";
                    return;
                    
            } else {
                echo "<script>
                    window.history.back();
                    </script>";
                    return;
            }

        } else {
            echo "<script>
                    window.history.back();
                 </script>";
                 return;
        }

    }

?>