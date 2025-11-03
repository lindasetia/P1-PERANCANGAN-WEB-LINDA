<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id_admin = $_GET['id'];

    $query = "DELETE FROM admin WHERE id_admin = '$id_admin'";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        echo "<script>
                alert('Data admin berhasil dihapus!');
                window.location='admin.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data!');
                window.location='admin.php';
              </script>";
    }
} else {
    echo "<script>
            alert('ID tidak ditemukan!');
            window.location='admin.php';
          </script>";
}
?>
