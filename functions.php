<?php
include('admin/config.php');
function getProducts(){
    global $conn;
    $select_query = 'select products.*,brands.brand_name from products,brands where products.brand_id=brands.brand_id';
    $products = $conn->query($select_query);
    if($products->num_rows>0){
        return $products;
    }
}

function getBrands(){
    global $conn;
    $query = "select * from brands";
    $brands = $conn->query($query);
    if($brands->num_rows>0){
        return $brands;
    }
}

?>