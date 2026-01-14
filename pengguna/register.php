<?php
include "../koneksi.php";

if (isset($_POST['daftar'])) {
    $email = $_POST['email'];
    $nama  = $_POST['nama'];
    $pass  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $cek = mysqli_query($conn, "SELECT * FROM pengguna WHERE email='$email'");
    if (mysqli_num_rows($cek) > 0) {
        $error = "Email sudah terdaftar!";
    } else {
        mysqli_query($conn, "INSERT INTO pengguna (email, password, nama_lengkap)
        VALUES ('$email','$pass','$nama')");
        header("Location: login.php?daftar=1");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Daftar User</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-4">

<div class="card shadow">
<div class="card-body">
<h4 class="text-center">Daftar User</h4>

<?php if (isset($error)) { ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php } ?>

<form method="post">
<input class="form-control mb-2" name="nama" placeholder="Nama Lengkap" required>
<input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
<input class="form-control mb-2" type="password" name="password" placeholder="Password" required>

<button name="daftar" class="btn btn-success w-100">Daftar</button>
</form>

<a href="login.php" class="d-block text-center mt-3">Login</a>
</div>
</div>

</div>
</div>
</div>
</body>
</html>
