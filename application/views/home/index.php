<div class="container">
  <div class="row mt-2">
    <div class="col-md-12">

      <h3>Selamat Datang Di Inventory Notaris</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($barang_by_category as $item): ?>
            <tr>
              <td><?= $item['nama_barang']; ?></td>
              <td><?= $item['total']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>