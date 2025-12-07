<?php
// Pastikan koneksi tersedia
include "koneksi.php";

// --- KONFIGURASI PAGINASI ---
$limit = 5; // jumlah data per halaman
$page  = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

// --- HITUNG TOTAL DATA ---
$count = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM admin");
$total = mysqli_fetch_assoc($count)['total'];
$total_pages = ceil($total / $limit);

// --- QUERY UNTUK ADMIN.PHP ---
$query = mysqli_query($koneksi, "SELECT * FROM admin LIMIT $start, $limit");

// --- HTML PAGINATION ---
echo '<div style="margin-top: 20px; text-align:center;">';

echo '<div style="display:inline-block; padding:10px;">';

if ($page > 1) {
    $prev = $page - 1;
    echo "<a href='?page=$prev' 
            style='padding:8px 12px; background:#2563EB; color:white; 
                   border-radius:8px; text-decoration:none; margin:0 5px;'>Previous</a>";
}

for ($i = 1; $i <= $total_pages; $i++) {
    if ($i == $page) {
        echo "<span style='padding:8px 12px; font-weight:bold; margin:0 5px;'>$i</span>";
    } else {
        echo "<a href='?page=$i' 
                style='padding:8px 12px; background:#1E3A8A; color:white;
                       border-radius:8px; text-decoration:none; margin:0 5px;'>$i</a>";
    }
}

if ($page < $total_pages) {
    $next = $page + 1;
    echo "<a href='?page=$next' 
            style='padding:8px 12px; background:#2563EB; color:white; 
                   border-radius:8px; text-decoration:none; margin:0 5px;'>Next</a>";
}

echo "</div>";
echo "</div>";
?>
