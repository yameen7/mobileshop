<?php
$hostname = '127.0.0.1';
// $hostname = 'localhost';
$username = 'root';
$password = 'root';
$db_name = 'mobileshop';

$conn = mysqli_connect($hostname,$username,$password,$db_name);
if($conn->connect_error){
    die("Connection failed".$conn->connect_error);
}
?>