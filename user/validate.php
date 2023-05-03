<?php
session_start();
include('../admin/config.php');
$mail = $_POST['email'];
$pass = $_POST['password'];
// echo ($mail.$pass);
$query = "select * from user where email = '".$mail."'";
// echo $query;
$result = $conn->query($query);
if($result->num_rows>0){
    $row=mysqli_fetch_assoc($result);
    if(password_verify($pass,$row['password'])){
        $_SESSION['user'] = $row['uid'];
        header("location: ./index.php");
    }
    else{
        echo ("<script>alert('Invalid Password');location.href='login.php'</script>");
    }
}
else{
    echo ("<script>alert('Invalid username');location.href='login.php'</script>");
}
?>