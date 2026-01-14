<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "../koneksi.php";

$id   = $_SESSION['id'];
$nama = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);
$pass = $_POST['password'];

if ($pass != "") {
    if (strlen($pass) < 6) {
        header("Location: edit_profil.php?error=1");
        exit;
    }

    $hash = password_hash($pass, PASSWORD_DEFAULT);

    mysqli_query($conn, "UPDATE pengguna SET
        nama_lengkap='$nama',
        password='$hash'
        WHERE id='$id'");
} else {
    mysqli_query($conn, "UPDATE pengguna SET
        nama_lengkap='$nama'
        WHERE id='$id'");
}

$_SESSION['nama'] = $nama;

header("Location: edit_profil.php?success=1");
exit;
