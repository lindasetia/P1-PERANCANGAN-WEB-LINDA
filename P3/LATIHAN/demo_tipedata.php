<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo TIPE DATA</title>
</head>
<body>

<h2>Contoh Tipe Data dan Casting</h2>

<?php
// Variabel dengan berbagai tipe data
$nama = "Linda Setia Ardani";
$umur = 20;
$tinggi = 156;
$mahasiswa = true;

// Menampilkan tipe data
echo "Nama (String): $nama <br>";
echo "Umur (Integer): $umur <br>";
echo "Tinggi Badan (Float): $tinggi cm<br>";
echo "Mahasiswa (Boolean): " . ($mahasiswa ? "Ya" : "Tidak") . "<br><br>";

// Contoh casting tipe data
$nilai_string = "95";             // String
$nilai_integer = (int)$nilai_string; // Diubah menjadi integer

echo "Nilai sebelum casting (string): $nilai_string<br>";
echo "Nilai setelah casting (integer): $nilai_integer";
?>

</body>
</html>
