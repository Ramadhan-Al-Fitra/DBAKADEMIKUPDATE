<?php
include "navbar.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow rounded-4 border-0">
        <div class="card-body text-center py-5">
            <h2 class="fw-bold mb-3">Selamat Datang di Sistem Akademik</h2>
            <p class="text-muted mb-4">
                Sistem ini digunakan untuk mengelola data mahasiswa dan program studi.
            </p>

            <div class="d-flex justify-content-center gap-3">
                <a href="mahasiswa.php" class="btn btn-primary btn-lg">
                    📘 Data Mahasiswa
                </a>
                <a href="prodi.php" class="btn btn-success btn-lg">
                    🎓 Program Studi
                </a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
