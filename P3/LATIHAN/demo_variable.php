<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo VARIABEL</title>
</head>
<body>

<h2>Selamat Datang di Kedai Pedas Ceria</h2>

<?php
// Membuat beberapa variabel sederhana
$nama_barang = "Seblak Level 5";
$harga = 15000;
$jumlah = 2;

// Menghitung total harga
$total = $harga * $jumlah;

// Menampilkan hasil ke layar
echo "Nama Menu     : $nama_barang <br>";
echo "Harga Satuan  : Rp $harga <br>";
echo "Jumlah Pesanan: $jumlah <br>";
echo "Total Bayar   : Rp $total <br>";

// Menampilkan pesan tambahan
echo "<br>Terima kasih sudah mampir di Kedai Pedas Ceria!";
?>

</body>
</html>
