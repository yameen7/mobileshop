<?php
session_start();
include('config.php');
$mail = $_POST['email'];
$pass = $_POST['password'];
// echo ($mail.$pass);
$query = "select * from admin_user where email = '".$mail."'";
// echo $query;
$result = $conn->query($query);
if($result->num_rows==1){
    $row=mysqli_fetch_assoc($result);
    if($row['password']==$pass){
        $_SESSION['admin'] = $mail;
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