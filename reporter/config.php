<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME','newsportal');
$conn = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>


<?php
// $db_host = "localhost";
// $db_user = "root";
// $db_password = "";
// $db_name="newsportal";

// // Create connection
// $conn = mysqli_connect($db_host, $db_user, $db_password,$db_name);
// if (!$conn) {
//     die("Connection failed ");
// } 
?>