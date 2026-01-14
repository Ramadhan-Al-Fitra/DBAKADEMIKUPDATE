<?php
include "koneksi.php";
include "navbar.php";

/* =====================
   SIMPAN / UPDATE
===================== */
if (isset($_POST['simpan'])) {

    session_start();

if (!isset($_SESSION['role'])) {
    die("Session role belum terbentuk, silakan login ulang");
}

if ($_SESSION['role'] !== 'admin') {
    die("Akses ditolak!");
}


    $nim       = mysqli_real_escape_string($conn, $_POST['nim']);
    $nama_mhs  = mysqli_real_escape_string($conn, $_POST['nama_mhs']);
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat    = mysqli_real_escape_string($conn, $_POST['alamat']);
    $prodi_id  = $_POST['prodi_id'];

    if ($_POST['mode'] == "tambah") {

        $sql = "INSERT INTO mahasiswa 
        (nim, nama_mhs, tgl_lahir, alamat, prodi_id)
        VALUES ('$nim','$nama_mhs','$tgl_lahir','$alamat','$prodi_id')";

    } else {

        $sql = "UPDATE mahasiswa SET
            nama_mhs='$nama_mhs',
            tgl_lahir='$tgl_lahir',
            alamat='$alamat',
            prodi_id='$prodi_id'
            WHERE nim='$nim'";
    }

    $query = mysqli_query($conn, $sql);

    if (!$query) {
        die("Query gagal: " . mysqli_error($conn));
    }

    header("Location: mahasiswa.php");
    exit;
}

/* =====================
   DELETE
===================== */
if (isset($_GET['hapus'])) {
    $nim = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE nim='$nim'");
    header("Location: mahasiswa.php");
}

/* =====================
   EDIT
===================== */
$edit = null;
if (isset($_GET['edit'])) {
    $nim  = $_GET['edit'];
    $edit = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM mahasiswa WHERE nim='$nim'")
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<title>Data Mahasiswa</title>

</head>

<body class="bg-light">

<div class="container mt-4">

    <div class="mb-4">
  <h3 class="fw-bold text-primary">📘 Data Mahasiswa</h3>
  <p class="text-muted mb-0">
    Halaman ini digunakan untuk mengelola data mahasiswa aktif yang terdaftar
    pada sistem akademik. Data yang ditampilkan bersifat resmi dan digunakan
    untuk keperluan administrasi akademik.
  </p>
    </div>


<!-- FORM MAHASISWA -->
<div class="card shadow mb-4">
<div class="card-body">
<h4>Form Mahasiswa</h4>

<form method="post">
<input type="hidden" name="mode" value="<?= $edit ? 'edit' : 'tambah' ?>">

<div class="mb-2">
<label>NIM</label>
<input type="text" name="nim" class="form-control"
value="<?= $edit['nim'] ?? '' ?>"
<?= $edit ? 'readonly' : 'required' ?>>
</div>

<div class="mb-2">
<label>Nama Mahasiswa</label>
<input type="text" name="nama_mhs" class="form-control"
value="<?= $edit['nama_mhs'] ?? '' ?>" required>
</div>

<div class="mb-2">
<label>Tanggal Lahir</label>
<input type="date" name="tgl_lahir" class="form-control"
value="<?= $edit['tgl_lahir'] ?? '' ?>" required>
</div>

<div class="mb-2">
<label>Alamat</label>
<textarea name="alamat" class="form-control" required><?= $edit['alamat'] ?? '' ?></textarea>
</div>

<div class="mb-2">
<label>Program Studi</label>
<select name="prodi_id" class="form-control" required>
<option value="">-- Pilih Prodi --</option>
<?php
$prodi_q = mysqli_query($conn, "SELECT * FROM program_studi");
while ($p = mysqli_fetch_assoc($prodi_q)) {
    $sel = ($edit && $edit['prodi_id'] == $p['id']) ? "selected" : "";
    echo "<option value='{$p['id']}' $sel>
          {$p['nama_prodi']} - {$p['jenjang']} ({$p['akreditasi']})
          </option>";
}
?>
</select>
</div>

<button name="simpan" class="btn btn-primary mt-2">
<?= $edit ? 'Update' : 'Simpan' ?>
</button>
</form>
</div>
</div>

<!-- TABEL MAHASISWA -->
<div class="card shadow">
<div class="card-body">
<h4>Data Mahasiswa</h4>

<table class="table table-bordered table-hover align-middle mt-3">
<thead class="table-dark">
<tr>
<th>NIM</th>
<th>Nama</th>
<th>Tgl Lahir</th>
<th>Alamat</th>
<th>Prodi</th>

<p class="text-muted">
  Data mahasiswa ditampilkan berdasarkan input yang telah disimpan
  ke dalam sistem akademik.
</p>


<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$data = mysqli_query($conn, "
SELECT 
    m.nim,
    m.nama_mhs,
    m.tgl_lahir,
    m.alamat,
    p.nama_prodi,
    p.jenjang
FROM mahasiswa m
JOIN program_studi p ON m.prodi_id = p.id
");

while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
<td><?= $d['nim'] ?></td>
<td><?= $d['nama_mhs'] ?></td>
<td><?= $d['tgl_lahir'] ?></td>
<td><?= $d['alamat'] ?></td>
<td><?= $d['nama_prodi'] ?> - <?= $d['jenjang'] ?></td>
<td>
    <a href="?edit=<?= $d['nim'] ?>" class="btn btn-warning btn-sm">Edit</a>
    <a href="?hapus=<?= $d['nim'] ?>" class="btn btn-danger btn-sm">Hapus</a>
</td>

</tr>
<?php } ?>

</tbody>
</table>
</div>
</div>

</div>
</body>
</html>