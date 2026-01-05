<?php
include "../koneksi.php";

$email = "admin@gmail.com";
$pass  = password_hash("12345", PASSWORD_DEFAULT);
$nama  = "Admin Akademik";

mysqli_query($conn, "INSERT INTO pengguna (email, password, nama_lengkap)
VALUES ('$email', '$pass', '$nama')");

echo "User berhasil dibuat";
