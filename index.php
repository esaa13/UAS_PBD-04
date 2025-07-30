<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Produk - Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gray-100">
  <div class="min-h-screen flex flex-col">
    <header class="bg-white shadow-md sticky top-0 z-10">
      <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-gray-800">Dashboard Produk</h1>
        <a href="create.php" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-xl text-sm font-semibold">+ Tambah Produk</a>
      </div>
    </header>

    <main class="flex-1 px-4 py-6 max-w-7xl mx-auto">
      <div class="bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-semibold mb-4 text-gray-700">Daftar Produk</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full table-auto text-left text-sm text-gray-600">
            <thead class="bg-gray-50">
              <tr>
                <th class="px-4 py-2">Kode</th>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Vendor</th>
                <th class="px-4 py-2">Harga</th>
                <th class="px-4 py-2">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              <?php
              include 'config.php';
              $result = $conn->query("SELECT * FROM products LIMIT 10");
              while($row = $result->fetch_assoc()): ?>
              <tr class="hover:bg-gray-50">
                <td class="px-4 py-2 font-medium"><?= $row['productCode'] ?></td>
                <td class="px-4 py-2"><?= $row['productName'] ?></td>
                <td class="px-4 py-2"><?= $row['productVendor'] ?></td>
                <td class="px-4 py-2">$<?= $row['buyPrice'] ?></td>
                <td class="px-4 py-2 space-x-2">
                  <a href="update.php?id=<?= $row['productCode'] ?>" class="inline-block text-sm text-white bg-yellow-500 hover:bg-yellow-600 px-3 py-1 rounded-xl">Edit</a>
                  <a href="delete.php?id=<?= $row['productCode'] ?>" onclick="return confirm('Yakin ingin menghapus?')" class="inline-block text-sm text-white bg-red-500 hover:bg-red-600 px-3 py-1 rounded-xl">Hapus</a>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>