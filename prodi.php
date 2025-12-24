<?php
include "koneksi.php";
include "navbar.php";

/* =====================
   PROSES INSERT / UPDATE
===================== */
if (isset($_POST['simpan'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $jenjang    = $_POST['jenjang'];
    $akreditasi = $_POST['akreditasi'];
    $keterangan = $_POST['keterangan'];

    if ($_POST['id'] == "") {
        mysqli_query($conn, "INSERT INTO program_studi 
            (nama_prodi, jenjang, akreditasi, keterangan)
            VALUES ('$nama_prodi','$jenjang','$akreditasi','$keterangan')");
    } else {
        $id = $_POST['id'];
        mysqli_query($conn, "UPDATE program_studi SET
            nama_prodi='$nama_prodi',
            jenjang='$jenjang',
            akreditasi='$akreditasi',
            keterangan='$keterangan'
            WHERE id='$id'");
    }
    header("Location: prodi.php");
}

/* =====================
   PROSES DELETE
===================== */
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM program_studi WHERE id='$id'");
    header("Location: prodi.php");
}

/* =====================
   AMBIL DATA EDIT
===================== */
$edit = null;
if (isset($_GET['edit'])) {
    $id   = $_GET['edit'];
    $edit = mysqli_fetch_assoc(
        mysqli_query($conn, "SELECT * FROM program_studi WHERE id='$id'")
    );
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Program Studi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

<!-- FORM PRODI -->
<div class="card shadow mb-4">
<div class="card-body">
<h4 class="mb-3">Form Program Studi</h4>

<form method="post">
<input type="hidden" name="id" value="<?= $edit['id'] ?? '' ?>">

<div class="mb-2">
    <label>Nama Prodi</label>
    <input type="text" name="nama_prodi" class="form-control"
           value="<?= $edit['nama_prodi'] ?? '' ?>" required>
</div>

<div class="mb-2">
    <label>Jenjang</label>
    <select name="jenjang" class="form-control" required>
        <option value="">- Pilih -</option>
        <?php
        $opsi = ['D2','D3','D4','S1','S2'];
        foreach ($opsi as $o) {
            $sel = ($edit && $edit['jenjang']==$o) ? "selected" : "";
            echo "<option $sel>$o</option>";
        }
        ?>
    </select>
</div>

<div class="mb-2">
    <label>Akreditasi</label>
    <input type="text" name="akreditasi" class="form-control"
           value="<?= $edit['akreditasi'] ?? '' ?>" required>
</div>

<div class="mb-2">
    <label>Keterangan</label>
    <textarea name="keterangan" class="form-control"><?= $edit['keterangan'] ?? '' ?></textarea>
</div>

<button name="simpan" class="btn btn-primary mt-2">
    <?= $edit ? 'Update' : 'Simpan' ?>
</button>
</form>
</div>
</div>

<!-- TABEL PRODI -->
<div class="card shadow">
<div class="card-body">
<h4>Data Program Studi</h4>

<table class="table table-bordered mt-3">
<thead class="table-dark">
<tr>
    <th>No</th>
    <th>Nama Prodi</th>
    <th>Jenjang</th>
    <th>Akreditasi</th>
    <th>Aksi</th>
</tr>
</thead>
<tbody>

<?php
$no=1;
$data = mysqli_query($conn, "SELECT * FROM program_studi");
while ($d = mysqli_fetch_assoc($data)) {
?>
<tr>
    <td><?= $no++ ?></td>
    <td><?= $d['nama_prodi'] ?></td>
    <td><?= $d['jenjang'] ?></td>
    <td><?= $d['akreditasi'] ?></td>
    <td>
        <a href="?edit=<?= $d['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
        <a href="?hapus=<?= $d['id'] ?>" class="btn btn-danger btn-sm"
           onclick="return confirm('Hapus data?')">Hapus</a>
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
