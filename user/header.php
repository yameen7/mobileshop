<?php
session_start();
include('../admin/config.php');
$sql = "select fname from user where uid='".$_SESSION['user']."'";
$res=$conn->query($sql);
$name='Guest';
if($res->num_rows>0){
    $row=$res->fetch_assoc();
    $name=$row['fname'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>MobileShope</title>
</head>
<body>
    <nav class="navbar bg-light">
        <div class="container">
          <h2><?=$name?></h2>
          <div class="d-inline-block float-end">
            <?php
            if (isset($_SESSION['user'])) {
                echo "<a href='logout.php'><button class='btn btn-danger'>Logout</button></a>";
            } else {
                echo "<a href='login.php'><button class='btn btn-primary'>Login</button></a>";
            }
            ?>
        </div>
        </div>
    </nav>