<div class="container mt-4">
  <h1><?= $judul; ?></h1>
  <div class="row">
    <!-- Card untuk Data Supplier -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Data Supplier</div>
        <div class="card-body">
          <p>Jumlah Supplier: <?= $count_supplier; ?></p>
          <?php if ($role === '"admin"'): ?>
            <a href="<?= base_url('supplier'); ?>" class="btn btn-primary">Lihat Detail</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- Card untuk Data Barang -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Data Barang</div>
        <div class="card-body">
          <p>Jumlah Barang: <?= $count_barang; ?></p>
          <?php if ($role === '"admin"'): ?>
            <a href="<?= base_url('barang'); ?>" class="btn btn-primary">Lihat Detail</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <!-- Card untuk Detail Barang Keluar -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Detail Barang Keluar</div>
        <div class="card-body">
          <p>Total Transaksi: <?= $count_detail_barang_keluar; ?></p>
          <p> Total Barang keluar : <?= $total_detail_barang_keluar ? $total_detail_barang_keluar : 0; ?></p>
          <?php if ($role === '"admin"'): ?>
            <a href="<?= base_url('detailbarangkeluar'); ?>" class="btn btn-primary">Lihat Detail</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <!-- Card untuk Detail Barang Masuk -->
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">Detail Barang Masuk</div>
        <div class="card-body">
          <p>Total Transaksi: <?= $count_detail_barang_masuk; ?></p>
          <p>Total Barang Masuk : <?= $total_detail_barang_masuk ? $total_detail_barang_masuk : 0; ?></p>
          <?php if ($role === '"admin"'): ?>
            <a href="<?= base_url('detailbarangmasuk'); ?>" class="btn btn-primary">Lihat Detail</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>