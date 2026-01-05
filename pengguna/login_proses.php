<?php
session_start();
include "../koneksi.php";

$email    = $_POST['email'];
$password = $_POST['password'];

$query = mysqli_query($conn, "SELECT * FROM pengguna WHERE email='$email'");
$user  = mysqli_fetch_assoc($query);

if ($user && password_verify($password, $user['password'])) {

    $_SESSION['login'] = true;
    $_SESSION['id']    = $user['id'];
    $_SESSION['email'] = $user['email'];
    $_SESSION['nama']  = $user['nama_lengkap'];

    header("Location: ../index.php");
    exit;

} else {
    header("Location: login.php?error=1");
    exit;
}
