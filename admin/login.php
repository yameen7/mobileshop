<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin Login</title>
</head>

<body>
    <div class="col-md-6 mx-auto mt-5">
        <h1 class="text-center mb-5">ADMIN LOGIN</h1>
        <form action="validate.php" method="post">
            <div class="mb-4">
                <input type="email" class="form-control" name="email" required placeholder="name@example.com">
            </div>
            <div class="mb-4">
                <input type="password" class="form-control" name="password" required placeholder="Password">
            </div>
            <div class="mb-4">
                <button class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>