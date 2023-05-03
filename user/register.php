<?php
include('../admin/config.php');
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
$hash_pass = password_hash($password,PASSWORD_DEFAULT);
$insert = "insert into user set fname = '$fname',lname='$lname',email='$email',password='$hash_pass'";
// echo $insert;
$result = $conn->query($insert);
if($result>0){
    header('location:login.php');
}
?>