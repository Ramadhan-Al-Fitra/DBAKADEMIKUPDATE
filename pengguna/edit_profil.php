<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

include "../koneksi.php";
include "../navbar.php";

$id = $_SESSION['id'];
$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM pengguna WHERE id='$id'")
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
<title>Edit Profil</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">
<div class="card shadow">
<div class="card-body">

<h4 class="mb-3">✏️ Edit Profil Pengguna</h4>

<?php if (isset($_GET['success'])) { ?>
<div class="alert alert-success">Profil berhasil diperbarui</div>
<?php } ?>

<?php if (isset($_GET['error'])) { ?>
<div class="alert alert-danger">Password minimal 6 karakter</div>
<?php } ?>

<form method="post" action="edit_profil_proses.php">

<div class="mb-3">
<label>Email</label>
<input type="email" class="form-control" value="<?= $data['email'] ?>" readonly>
</div>

<div class="mb-3">
<label>Nama Lengkap</label>
<input type="text" name="nama_lengkap" class="form-control"
       value="<?= $data['nama_lengkap'] ?>" required>
</div>

<div class="mb-3">
<label>Password Baru</label>
<input type="password" name="password" class="form-control"
       placeholder="Kosongkan jika tidak ingin mengganti">
</div>

<button class="btn btn-primary">Simpan Perubahan</button>

</form>

</div>
</div>
</div>

</body>
</html>
