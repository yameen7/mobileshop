<?php
include('verify.php');
include('config.php');
$name = '';
$img = '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
if ($id) {
    $select_brand = "select * from brands where brand_id=$id";
    $res = $conn->query($select_brand);
    $rows = $res->fetch_assoc();
    $name = $rows['brand_name'];
    $img = $rows['brand_logo'];
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
        <form action="handle_brands.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
            <div class="mb-4">
                <input type="text" class="form-control" value="<?=$name ?>" name="name" required placeholder="Enter SKU Number">
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