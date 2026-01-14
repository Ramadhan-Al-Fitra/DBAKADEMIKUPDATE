<?php
session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "../navbar.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Pengguna</title>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

    <div class="card shadow border-0 rounded-4">
        <div class="card-header bg-primary text-white fw-bold">
            Informasi Pengguna
        </div>

        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama Lengkap</th>
                    <td><?= $_SESSION['nama'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $_SESSION['email'] ?></td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <span class="badge bg-success">Aktif</span>
                    </td>
                </tr>
            </table>

            <a href="../index.php" class="btn btn-secondary mt-3">
                ⬅ Kembali ke Dashboard
            </a>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
