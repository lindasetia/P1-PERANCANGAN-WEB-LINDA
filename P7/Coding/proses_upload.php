<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // ==== PROSES UPLOAD FOTO ====
    $namaFile = $_FILES['foto']['name'];
    $tmpName  = $_FILES['foto']['tmp_name'];

    // Lokasi folder upload
    $folder = "uploads/";

    // Buat nama unik
    $namaBaru = time() . "_" . $namaFile;

    // Pindahkan file
    if (move_uploaded_file($tmpName, $folder . $namaBaru)) {

        // Insert ke database
        $query = mysqli_query($koneksi,
            "INSERT INTO admin (username, password, foto)
             VALUES ('$username', '$password', '$namaBaru')"
        );

        if ($query) {
            echo "<script>
                    alert('Admin berhasil ditambahkan!');
                    window.location='admin.php';
                  </script>";
        } else {
            echo "<script>
                    alert('Gagal menyimpan ke database!');
                    window.location='tambah_admin.php';
                  </script>";
        }

    } else {
        echo "<script>
                alert('Upload foto gagal!');
                window.location='tambah_admin.php';
              </script>";
    }

}
?>
