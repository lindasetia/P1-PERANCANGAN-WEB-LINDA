<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$file = $_GET['file'];

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'lndsty62@gmail.com';
    $mail->Password   = 'xbxx pexl bxzg bwzd';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('lndsty62@gmail.com', 'Sistem Reminder');
    $mail->addAddress('tegalcomputer@gmail.com');

    $mail->addAttachment($file);

    $mail->isHTML(true);
    $mail->Subject = 'Laporan Data Admin (PDF)';
    $mail->Body    = 'Terlampir laporan data admin dalam format PDF.';

    $mail->send();

    echo "<script>
        alert('PDF berhasil dikirim ke email!');
        window.location='admin.php';
    </script>";

} catch (Exception $e) {
    echo "Email gagal dikirim: {$mail->ErrorInfo}";
}
