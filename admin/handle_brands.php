<?php
include('verify.php');
include('config.php');
$name = $_POST['name'];
$img = $_FILES['img']?$_FILES['img']['name']:'';
$id=$_GET['id']?$_GET['id']:'';

if($id){
	$update_brand='';
	if($img){
		$update_brand = "update brands set brand_name='".$name."', brand_logo='".$img."' where brand_id=$id";
        // echo $update_brand;
	}
	else{
		$update_brand = "update brands set brand_name='".$name."' where brand_id=$id";
        // echo $update_brand;
	}


	$result=$conn->query($update_brand);

	if($result>0){
		header('location:manageBrands.php');
	}
}

else{

	$insert_brand = "insert into brands set brand_name='".$name."',brand_logo='".$img."'";
    // echo $insert_brand;
	$result=$conn->query($insert_brand);

	if($result>0){
		header('location:manageBrands.php');
	}

}


if($img){

	move_uploaded_file($_FILES['img']['tmp_name'],"../images/".$img);
}


?>