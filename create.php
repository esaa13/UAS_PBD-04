<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Produk</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>body { font-family: 'Inter', sans-serif; }</style>
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white p-8 rounded-2xl shadow-md w-full max-w-lg">
      <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Produk Baru</h2>
      <?php
      include 'config.php';
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $code = $_POST['productCode'];
        $name = $_POST['productName'];
        $vendor = $_POST['productVendor'];
        $price = $_POST['buyPrice'];

        $sql = "INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
                VALUES ('$code', '$name', 'Classic Cars', '1:18', '$vendor', 'Deskripsi produk', 100, '$price', 150.00)";
        if ($conn->query($sql) === TRUE) {
          echo "<div class='mb-4 p-3 bg-green-100 text-green-700 rounded-lg'>Produk berhasil ditambahkan.</div>";
        } else {
          echo "<div class='mb-4 p-3 bg-red-100 text-red-700 rounded-lg'>Error: " . $conn->error . "</div>";
        }
      }
      ?>
      <form method="post" class="space-y-4">
        <div>
          <label class="block mb-1 font-medium">Kode Produk</label>
          <input type="text" name="productCode" class="w-full border border-gray-300 rounded-xl px-4 py-2" required>
        </div>
        <div>
          <label class="block mb-1 font-medium">Nama Produk</label>
          <input type="text" name="productName" class="w-full border border-gray-300 rounded-xl px-4 py-2" required>
        </div>
        <div>
          <label class="block mb-1 font-medium">Vendor</label>
          <input type="text" name="productVendor" class="w-full border border-gray-300 rounded-xl px-4 py-2" required>
        </div>
        <div>
          <label class="block mb-1 font-medium">Harga Beli</label>
          <input type="number" step="0.01" name="buyPrice" class="w-full border border-gray-300 rounded-xl px-4 py-2" required>
        </div>
        <div class="flex justify-between">
          <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-xl hover:bg-blue-700">Simpan</button>
          <a href="index.php" class="bg-gray-200 text-gray-800 px-4 py-2 rounded-xl hover:bg-gray-300">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</body>
</html>
