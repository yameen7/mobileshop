<?php
include('verify.php');
include('config.php');
$id=$_GET['id']?$_GET['id']:"";
$bid=$_GET['bid']?$_GET['bid']:"";
if($id){
    $delete_query = "delete from products where pid=$id";
    $result=$conn->query($delete_query);
    if($result>0){
        header('location:index.php');
    }
    else{
        die('Delete Failed');
    }
}
if($bid){
    $delete_query = "delete from brands where brand_id=$bid";
    $result=$conn->query($delete_query);
    if($result>0){
        header('location:manageBrands.php');
    }
    else{
        die('Delete Failed');
    }
}
?>