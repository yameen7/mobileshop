<?php
session_start();
include('config.php');
unset($_SESSION['user']);
header("location:login.php");
?>