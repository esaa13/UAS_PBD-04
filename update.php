<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="index.php">Manajemen Produk</a>
  </div>
</nav>

<main class="container py-5">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card shadow-sm">
        <div class="card-header bg-white border-bottom">
          <h5 class="mb-0">Edit Produk</h5>
        </div>
        <div class="card-body">
          <?php
          include 'config.php';
          $id = $_GET['id'];
          $result = $conn->query("SELECT * FROM products WHERE productCode='$id'");
          $row = $result->fetch_assoc();

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['productName'];
            $vendor = $_POST['productVendor'];
            $price = $_POST['buyPrice'];

            $sql = "UPDATE products SET 
                      productName='$name', 
                      productVendor='$vendor', 
                      buyPrice='$price' 
                    WHERE productCode='$id'";

            if ($conn->query($sql) === TRUE) {
              echo "<div class='alert alert-success'>Produk berhasil diperbarui.</div>";
            } else {
              echo "<div class='alert alert-danger'>Gagal: " . $conn->error . "</div>";
            }
          }
          ?>
          <form method="post">
            <div class="mb-3">
              <label class="form-label">Nama Produk</label>
              <input type="text" name="productName" class="form-control" value="<?= $row['productName'] ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Vendor</label>
              <input type="text" name="productVendor" class="form-control" value="<?= $row['productVendor'] ?>" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Harga Beli</label>
              <input type="number" step="0.01" name="buyPrice" class="form-control" value="<?= $row['buyPrice'] ?>" required>
            </div>
            <div class="d-flex justify-content-between">
              <a href="index.php" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
              <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
