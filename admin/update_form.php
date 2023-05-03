<?php
include('verify.php');
include('config.php');
$brand = 'select * from brands';
$result = $conn->query($brand);
$name = '';
$price = '';
$sku = '';
$brand = '';
$desc = '';
$img = '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id) {
    $select_product = "select * from products where pid=$id";
    $res = $conn->query($select_product);
    $rows = $res->fetch_assoc();
    $name = $rows['name'];
    $price = $rows['price'];
    $sku = $rows['sku'];
    $brand = $rows['brand_id'];
    $desc = $rows['description'];
    $img = $rows['image'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
    <title>Update Products</title>
</head>

<body>
    <div class="col-md-6 mx-auto mt-5">
        <h1 class="text-center mb-4">Add Product</h1>
        <form action="handel_update.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <input type="number" class="form-control" value="<?= $sku ?>" name="sku" required placeholder="Enter SKU Number">
            </div>
            <div class="mb-4">
                <input type="text" class="form-control" value="<?= $name ?>" name="name" required placeholder="Product Name">
            </div>
            <div class="mb-4">
                <input type="number" class="form-control" value="<?= $price ?>" name="price" required placeholder="Enter Price">
            </div>
            <div class="mb-4">
                <?php if ($img) { ?>
                    <img src="../images/<?= $img ?>" id="img_disp" />
                    <p type="button" class="btn btn-primary" id="change">Change</p>
                    <input type='file' name='img' id="img" class="form-control d-none" />
                <?php } else { ?>
                    <input type='file' name='img' id="img" class="form-control" required />
                <?php } ?>

            </div>
            <div class="mb-4">
                <select name="brand" required=true class="form-control">
                    <option disabled selected value="">-----Please select Brand-----</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { ?>
                            <option <?php if ($row['brand_id'] == $brand) {
                                        echo 'selected';
                                    } ?> value="<?= $row['brand_id'] ?>"><?= $row['brand_name'] ?></option>

                    <?php }
                    }
                    ?>
                </select>
            </div>
            <div class="mb-4">
                <textarea class="form-control" name="desc" rows="5" cols="10" placeholder="Description"><?= $desc ?></textarea>
            </div>
            <div class="mb-4">
                <input type="submit" value="Submit" class="btn btn-success" />
            </div>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw=" crossorigin="anonymous"></script>
<script>
    // console.log("called");
    $("#change").click(function() {
        // console.log('called');
        $("#change").hide();
        $("#img_disp").hide();
        $("#img").toggleClass('d-none');
        $("#img").attr('required', 'true');
    });
</script>

</html>