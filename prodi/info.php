<?php
include "../koneksi.php";
include "../navbar.php";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Informasi Program Studi</title>
</head>

<body class="bg-light">

<div class="container mt-4">

<!-- JUDUL -->
<div class="mb-4">
  <h3 class="fw-bold text-success">🎓 Informasi Program Studi</h3>
  <p class="text-muted">
    Program studi merupakan unit akademik yang menyelenggarakan proses
    pendidikan sesuai dengan bidang keilmuan tertentu. Informasi berikut
    merupakan data resmi yang tercatat dalam sistem akademik.
  </p>
</div>


<!-- DAFTAR PRODI -->
<?php
$data = mysqli_query($conn, "SELECT * FROM program_studi");
while ($p = mysqli_fetch_assoc($data)) {
?>

<div class="card shadow-sm mb-4">
    <div class="card-body">

        <h5 class="fw-bold text-success mb-3">
            <?= $p['nama_prodi'] ?>
            <span class="badge bg-secondary ms-2"><?= $p['jenjang'] ?></span>
        </h5>

        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                <strong>Jenjang Pendidikan:</strong>
                <?= $p['jenjang'] ?>
            </li>

            <li class="list-group-item">
                <strong>Status Akreditasi:</strong>
                <?= $p['akreditasi'] ?>
            </li>

            <li class="list-group-item">
                <strong>Deskripsi Program Studi:</strong>
                <br>
                <span class="text-muted">
                    <?= $p['keterangan'] ?: 'Belum ada keterangan tambahan.' ?>
                </span>
            </li>

        </ul>

    </div>
</div>

<?php } ?>

</div>

</body>
</html>
