<?php
define('SERVER', 'localhost');
define('DATABASE', 'svl');
define('USERNAME', 'root');
define('PASSWORD', '');

$conn = new mysqli(
    SERVER, 
    USERNAME, 
    PASSWORD, 
    DATABASE
);

if ($conn->connect_error) {
   echo 'Connection Failed, '.$conn->connect_error;
} 
// else {
//     echo 'Connected Successfully';
// }


?>