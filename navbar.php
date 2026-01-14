<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
  <div class="container"> <!-- ⬅ PENTING: container, BUKAN container-fluid -->

    <a class="navbar-brand fw-bold" href="/dbakademik/akademik/index.php">
      Akademik
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">

      <!-- MENU KIRI -->
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="/dbakademik/akademik/index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="/dbakademik/akademik/mahasiswa.php">Data Mahasiswa</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            Program Studi
          </a>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="/dbakademik/akademik/prodi/info.php">
                Informasi Program Studi
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/dbakademik/akademik/prodi/input.php">
                Input Program Studi
              </a>
            </li>
          </ul>

             <li class="nav-item">
              <a class="nav-link" href="/dbakademik/akademik/hubungi.php">
                Hubungi Kami
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/dbakademik/akademik/informasi.php">
                Informasi
              </a>
            </li>
        </li>
      </ul>

      <!-- MENU KANAN -->
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            ⚙ Setting
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li>
              <a class="dropdown-item" href="/dbakademik/akademik/pengguna/info.php">
                Informasi Pengguna
              </a>
            </li>
            <li>
              <a class="dropdown-item text-danger" href="/dbakademik/akademik/pengguna/logout.php">
                Logout
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="/dbakademik/akademik/pengguna/edit_profil.php">
                Edit Profil
              </a>
            </li>

          </ul>
        </li>
      </ul>

    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
