<!DOCTYPE html>
<html lang="en">
<head>
    <title>HARGA MAKANAN PEDAS</title>
</head>
<body>

<h2><b>HARGA MAKANAN PEDAS</b></h2>

<?php
$harga = 18000;
$kategori = "";
$keterangan = "";

// Seleksi kondisi menggunakan if else
if ($harga >= 30000) {
    $kategori = "A";
    $keterangan = "Mahal ";
} elseif ($harga >= 15000) {
    $kategori = "B";
    $keterangan = "Sedang ";
} elseif ($harga >= 10000) {
    $kategori = "C";
    $keterangan = "Terjangkau ";
} else {
    $kategori = "D";
    $keterangan = "Hemat ";
}

// Menampilkan hasil
echo "Harga Makanan: Rp $harga<br>";
echo "Kategori: $kategori ($keterangan)";
?>

</body>
</html>
