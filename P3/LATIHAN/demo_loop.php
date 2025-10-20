<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo LOOPING</title>
</head>
<body>


<?php
// ===========================================
// PENGULANGAN WHILE
// ===========================================
echo "<h3>1. Pengulangan WHILE</h3>";

$angka = 1; // Inisialisasi variabel
while ($angka <= 5) { // Kondisi selama $angka ≤ 5
    echo "Putaran ke-$angka sedang berjalan<br>";
    $angka++; // Increment
}

// ===========================================
// PENGULANGAN DO-WHILE
// ===========================================
echo "<h3>2. Pengulangan DO-WHILE</h3>";

$x = 1;
do {
    echo "Nilai variabel x saat ini: $x<br>";
    $x++;
} while ($x <= 5); // Kondisi dicek setelah blok dijalankan minimal 1 kali

// ===========================================
// PENGULANGAN FOR
// ===========================================
echo "<h3>3. Pengulangan FOR</h3>";

for ($i = 1; $i <= 5; $i++) {
    echo "Langkah iterasi ke-$i berhasil<br>";
}

// ===========================================
// PENGULANGAN FOREACH
// ===========================================
echo "<h3>4. Pengulangan FOREACH</h3>";

// Contoh array data pelanggan kedai
$pelanggan = [
    "Nama" => "Linda Setia Ardani",
    "Pesanan" => "Mie Jebew Level 4",
    "Jumlah" => 2,
    "Harga Satuan" => "15000",
    "Total Bayar" => 2 * 15000
];

// Menampilkan semua isi array menggunakan foreach
foreach ($pelanggan as $key => $value) {
    echo "$key : $value<br>";
}

?>

</body>
</html>
