<?php
include "koneksi.php";

require_once "dompdf/autoload.inc.php";
use Dompdf\Dompdf;

$query = mysqli_query($koneksi, "SELECT * FROM admin");

$html = '
<h2 style="text-align:center;">Data Admin Sistem Reminder</h2>
<table border="1" width="100%" cellspacing="0" cellpadding="8">
<tr>
    <th>No</th>
    <th>Username</th>
    <th>Password</th>
</tr>';

$no = 1;
while ($row = mysqli_fetch_assoc($query)) {
    $html .= "
    <tr>
        <td>{$no}</td>
        <td>{$row['username']}</td>
        <td>{$row['password']}</td>
    </tr>";
    $no++;
}

$html .= '</table>';

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

/* SIMPAN PDF */
$pdfPath = "admin_report.pdf";
file_put_contents($pdfPath, $dompdf->output());

header("Location: kirim_admin_pdf.php?file=$pdfPath");
exit();
