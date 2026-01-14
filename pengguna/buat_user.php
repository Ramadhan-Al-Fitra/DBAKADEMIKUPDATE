<?php
include "../koneksi.php";

$email = "admin@gmail.com";
$password = password_hash("12345", PASSWORD_DEFAULT);
$nama = "Admin Akademik";

$cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE email='$email'");
if (mysqli_num_rows($cek) > 0) {
    echo "❌ Email sudah terdaftar!";
    exit;
}

mysqli_query($conn, "INSERT INTO pengguna (email, password, nama_lengkap)
VALUES ('$email', '$password', '$nama')");

echo "✅ User berhasil dibuat";
