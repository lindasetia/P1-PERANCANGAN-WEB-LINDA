<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latihan PHP + HTML</title>
</head>
<body>

<h2>Program PHP Sederhana - Data Mahasiswa</h2>

<?php
// Menampilkan pesan pembuka
echo "<b>Selamat datang!</b><br>";
echo "Ini adalah contoh sederhana penggunaan PHP di dalam HTML.<br><br>";

// Data mahasiswa disimpan dalam variabel
$nama       = "Linda Setia Ardani";
$nim        = "2402037";
$prodi      = "Teknik Informatika";
$alamat     = "Ds. Trayeman RT 02 RW 02, Kec. Slawi, Kab. Tegal";
$umur       = 19;
$kampus     = "Politeknik Purbaya";

// Menampilkan biodata dengan gaya berbeda
echo "<u>=== BIODATA MAHASISWA ===</u><br>";
echo "Nama Lengkap   : <b>$nama</b><br>";
echo "NIM            : $nim<br>";
echo "Program Studi  : $prodi<br>";
echo "Alamat         : $alamat<br>";
echo "Asal Kampus    : $kampus<br>";
echo "Umur           : $umur tahun<br><br>";

// Menambahkan logika kecil untuk menilai usia
if ($umur < 18) {
    echo "Kamu masih muda dan penuh semangat belajar! <br>";
} else {
    echo "Semangat terus menuntut ilmu! <br>";
}

// Menampilkan tanggal dan waktu saat ini
echo "<br>Data ini diakses pada: " . date("l, d F Y - H:i:s");
?>

</body>
</html>
