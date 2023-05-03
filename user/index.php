<?php
include('header.php');
include('../functions.php');
?>

    <div class="container mt-5">
        <h1 class="mb-5 d-inline-block">PRODUCT LIST</h1>
        <div class="row">
            <?php
                $products = getProducts();
                while ($row = $products->fetch_assoc()) { ?>
                    <div class="col-md-4 mb-5">
                        <div class="card">
                            <img src="../images/<?= $row['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $row['name'] ?></h5>
                                <h5 class="card-title">Rs. <?= $row['price'] ?></h5>
                                <p class="card-text"><?= $row['brand_name'] ?></p>
                                <p class="card-text"><?= $row['description'] ?></p>
                            </div>
                        </div>
                    </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>