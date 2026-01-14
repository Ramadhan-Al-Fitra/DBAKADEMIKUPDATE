<?php
include "koneksi.php";
include "navbar.php";

$jml_mhs  = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM mahasiswa"));
$jml_prodi = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM program_studi"));
?>

    <style>
.hero {
  background: linear-gradient(135deg, #0d6efd, #0b5ed7);
  color: white;
  border-radius: 16px;
}

.hero img {
  max-height: 260px;
  object-fit: cover;
}

.stat-card {
  transition: 0.3s;
}
.stat-card:hover {
  transform: translateY(-5px);
}
</style>

<div class="container mt-4">

    <div class="card shadow-sm border-0 mb-4">
  <div class="card-body px-4 py-4">
    <h3 class="fw-bold mb-3 text-primary">
      Selamat Datang di Sistem Informasi Akademik
    </h3>

    <div class="container mt-4">

<div class="hero p-4 shadow mb-4">
  <div class="row align-items-center">
    
    <div class="col-md-7">
      <h2 class="fw-bold mb-3">
        Sistem Informasi Akademik
      </h2>
      <p class="fs-6">
        Platform pengelolaan data akademik yang terintegrasi untuk mendukung
        proses administrasi perguruan tinggi secara efektif, efisien,
        dan transparan.
      </p>
    </div>

    <div class="col-md-5 text-center">
      <img src="img/kevin-ku-w7ZyuGYNpRQ-unsplash.jpg" class="img-fluid rounded-3 shadow">
    </div>

  </div>
</div>


    <!-- BANNER INFORMASI -->

<div class="mb-4">
  <img 
    src="img/adi-goldstein-EUsVwEOsblE-unsplash.jpg"
    class="img-fluid rounded shadow-sm w-100 d-none d-md-block"
    style="max-height: 300px; object-fit: cover;"
    alt="Banner Akademik">
</div>

    <p class="fs-6 text-muted text-justify">
      Sistem Informasi Akademik ini merupakan media pengelolaan data akademik
      yang dirancang untuk membantu proses administrasi dan manajemen data
      di lingkungan perguruan tinggi secara terstruktur, akurat, dan terintegrasi.
      Melalui sistem ini, pengguna dapat mengelola informasi mahasiswa, program studi,
      serta data pendukung akademik lainnya dengan lebih efektif dan efisien.
      Sangat memudahkan bagi staf akademik, dosen, dan mahasiswa dalam mengakses
      informasi yang dibutuhkan secara cepat dan tepat.
    </p>

    <p class="fs-6 text-muted text-justify">
      Penggunaan sistem ini diharapkan mampu meningkatkan kualitas pengolahan data,
      mempercepat proses pencarian informasi, serta meminimalisir kesalahan
      dalam pencatatan data akademik. Setiap data yang dikelola tersimpan
      dalam basis data terpusat sehingga memudahkan pemantauan dan pemeliharaan
      informasi secara berkelanjutan. Untuk kedepannya sistem ini akan terus
      dikembangkan guna memenuhi kebutuhan akademik yang semakin kompleks.
    </p>

    <p class="fs-6 text-muted text-justify">
      Silakan gunakan menu navigasi yang tersedia untuk mengakses berbagai fitur
      yang telah disediakan dalam Sistem Informasi Akademik ini, seperti
      pengelolaan data mahasiswa, pengelolaan program studi, serta informasi
      pengguna. Setiap menu dirancang untuk memudahkan pengguna dalam mengelola
      dan memperoleh data akademik secara cepat, tepat, dan terstruktur.
      Pastikan Anda menggunakan sistem ini sesuai dengan hak akses yang dimiliki
      demi menjaga keamanan, kerahasiaan, dan keakuratan data akademik yang
      tersimpan di dalam sistem.

    </p>

    <p class="fs-6 text-muted text-justify mb-0">
      Pastikan Anda menggunakan sistem ini sesuai dengan hak akses yang dimiliki
      demi menjaga keamanan, kerahasiaan, dan keakuratan data akademik yang
      tersimpan di dalam sistem. Dengan pemanfaatan sistem yang optimal, diharapkan
      proses administrasi akademik dapat berjalan lebih efektif, efisien, serta
      mendukung peningkatan kualitas layanan akademik di lingkungan perguruan tinggi.
    </p>

  </div>
</div>

<div class="row mb-4">

<div class="col-md-6">
  <div class="card stat-card shadow-sm border-0 text-center">
    <div class="card-body">
      <h6 class="text-muted">Total Mahasiswa</h6>
      <h1 class="text-primary fw-bold"><?= $jml_mhs ?></h1>
      <span class="badge bg-primary">Data Aktif</span>
    </div>
  </div>
</div>

<div class="col-md-6">
  <div class="card stat-card shadow-sm border-0 text-center">
    <div class="card-body">
      <h6 class="text-muted">Total Program Studi</h6>
      <h1 class="text-success fw-bold"><?= $jml_prodi ?></h1>
      <span class="badge bg-success">Terdaftar</span>
    </div>
  </div>
</div>

</div>
