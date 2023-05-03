<?php
include('verify.php');
include('config.php');
$name = $_POST['name'];
$sku = $_POST['sku'];
$price = $_POST['price'];
$brand = (int)$_POST['brand'];
$desc = $_POST['desc'];
$img = $_FILES['img']?$_FILES['img']['name']:'';
$id=$_GET['id']?$_GET['id']:'';

if($id){
	$insert_product='';
	if($img){
		$insert_product = "update products set sku=$sku, name='".$name."', price=$price, image='".$img."',brand_id=$brand,description='".$desc."' where pid=$id";
	}
	else{
		$insert_product = "update products set sku=$sku, name='".$name."', price=$price,brand_id=$brand,description='".$desc."' where pid=$id";
	}


	$result=$conn->query($insert_product);

	if($result>0){
		header('location:index.php');
	}
}

else{

	$insert_product = "insert into products set sku=$sku, name='".$name."', price=$price, image='".$img."',brand_id=$brand,description='".$desc."'";

	$result=$conn->query($insert_product);

	if($result>0){
		header('location:index.php');
	}

}


if($img){

	move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$img);
}


?>