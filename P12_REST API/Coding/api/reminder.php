<?php
header("Content-Type: application/json");
include "../koneksi.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    // ================= GET =================
    case 'GET':
        $query = mysqli_query($koneksi, "SELECT * FROM reminder ORDER BY tanggal_pengingat ASC");
        $data = [];

        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = $row;
        }

        echo json_encode([
            "status" => true,
            "data" => $data
        ]);
        break;

    // ================= POST =================
    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);

        $id_mahasiswa = $input['id_mahasiswa'];
        $judul        = $input['judul'];
        $deskripsi    = $input['deskripsi'];
        $tanggal      = $input['tanggal_pengingat'];
        $status       = 'aktif';

        $sql = "INSERT INTO reminder 
                (id_mahasiswa, judul, deskripsi, tanggal_pengingat, status)
                VALUES
                ('$id_mahasiswa','$judul','$deskripsi','$tanggal','$status')";

        if (mysqli_query($koneksi, $sql)) {
            echo json_encode([
                "status" => true,
                "message" => "Reminder berhasil ditambahkan"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Gagal menambahkan reminder"
            ]);
        }
        break;

    // ================= PUT =================
    case 'PUT':
        $input = json_decode(file_get_contents("php://input"), true);

        $id     = $input['id_reminder'];
        $status = $input['status'];

        $sql = "UPDATE reminder SET status='$status' WHERE id_reminder='$id'";

        if (mysqli_query($koneksi, $sql)) {
            echo json_encode([
                "status" => true,
                "message" => "Status reminder diperbarui"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Update gagal"
            ]);
        }
        break;

    // ================= DELETE =================
    case 'DELETE':
        $input = json_decode(file_get_contents("php://input"), true);
        $id = $input['id_reminder'];

        $sql = "DELETE FROM reminder WHERE id_reminder='$id'";

        if (mysqli_query($koneksi, $sql)) {
            echo json_encode([
                "status" => true,
                "message" => "Reminder dihapus"
            ]);
        } else {
            echo json_encode([
                "status" => false,
                "message" => "Gagal menghapus reminder"
            ]);
        }
        break;

    default:
        echo json_encode([
            "status" => false,
            "message" => "Method tidak diizinkan"
        ]);
}
