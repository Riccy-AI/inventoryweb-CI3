<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory | <?= $judul; ?></title>
  <link rel="stylesheet" href="<?= base_url('assets/css/header.css'); ?>">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('home'); ?>">
          <img src="<?= base_url('assets/icon/ubsi.png'); ?>" alt="home" width="80" height="auto">
        </a>
        <a class="navbar-brand fw-bold" href="<?= base_url('home'); ?>">
          Inventory Kantor Notaris
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link" href="<?= base_url('home'); ?>">Dashboard</a>

            <!-- Master Barang Dropdown -->
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Master Barang</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('supplier'); ?>">Supplier</a></li>
                <li><a class="dropdown-item" href="<?= base_url('barang'); ?>">Data Barang</a></li>
                <li><a class="dropdown-item" href="<?= base_url('barangmasuk'); ?>">Barang Masuk</a></li>
                <li><a class="dropdown-item" href="<?= base_url('barangkeluar'); ?>">Barang Keluar</a></li>
              </ul>
            </div>

            <!-- Detail Barang Dropdown -->
            <div class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Detail Barang</a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="<?= base_url('detailbarangmasuk'); ?>">Detail Barang Masuk</a></li>
                <li><a class="dropdown-item" href="<?= base_url('detailbarangkeluar'); ?>">Detail Barang Keluar</a></li>
              </ul>
            </div>
          </div>

          <!-- User Dropdown -->
          <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="me-2 d-none d-lg-inline text-black-500">Douglas McGee</span>
                <img class="img-profile rounded-circle" src="<?= base_url('assets/icon/man.png'); ?>" width="30" height="30" alt="Profile">
              </a>
              <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="userDropdown">
                <li><a class="dropdown-item" href="<?= base_url('login'); ?>"><i class="fas fa-cogs fa-sm fa-fw me-2 text-black-400"></i>Log Out</a></li>

              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>