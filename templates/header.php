<?php
define('BASE_URL', 'http://localhost/pelatihan-sekolah');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/bootstrap.min.css">

  <title><?= $title ? $title : 'Utama'; ?></title>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-bg">
    <div class="container">
      <a class="navbar-brand" href="<?= BASE_URL; ?>">Data Sekolah</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="<?= BASE_URL; ?>">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Master Data
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?= BASE_URL; ?>/guru">Guru</a></li>
              <li><a class="dropdown-item" href="<?= BASE_URL; ?>/siswa">Siswa</a></li>
              <li><a class="dropdown-item" href="<?= BASE_URL; ?>/kompetensi">Kompetensi</a></li>
              <li><a class="dropdown-item" href="<?= BASE_URL; ?>/matpel">Mata Pelajaran</a></li>
              <li><a class="dropdown-item" href="<?= BASE_URL; ?>/nilai">Nilai</a></li>
            </ul>
          </li>
        </ul>
        <div class="d-flex">
          <a class="btn btn-danger" href="<?= BASE_URL; ?>/logout.php">Logout</a>
        </div>
      </div>
    </div>
  </nav>