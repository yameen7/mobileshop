<?php
include('verify.php');
include('../functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <title>Manage Products</title>
</head>

<body>
  <div class="container mt-5">
    <h2 class="mb-5 d-inline-block">Manage Brands</h2>
    <div class="d-inline-block float-end">
      <a href="index.php"><button class="btn btn-primary">Products</button></a>
      <a href="update_brand.php"><button class="btn btn-success">Add Brands</button></a>
      <a href="logout.php"><button class="btn btn-danger">Logout</button></a>
    </div>
    <table class="table table-hover w-75 mx-auto">
      <thead>
        <tr>
          <th>Name</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $brands = getBrands();
        while ($row = $brands->fetch_assoc()) { ?>
          <tr>
            <td>
              <?= $row['brand_name'] ?>
            </td>
            <td style="width:250px">
              <img src="../images/<?= $row['brand_logo'] ?>" class="w-100" />
            </td>
            <td>
              <a href="update_brand.php?id=<?= $row['brand_id'] ?>"><button class="btn btn-warning">Edit</button></a>
              <a href="delete.php?bid=<?= $row['brand_id'] ?>"><button onclick="return conformDelete()" class="btn btn-danger">Delete</button></a>
            </td>
          </tr>
        <?php }
        ?>
      </tbody>
    </table>
  </div>
</body>
<script>
  function conformDelete() {
    if (confirm('Are you sure you want to delete') === true) {
      return true;
    } else {
      return false;
    }
  }
</script>

</html>