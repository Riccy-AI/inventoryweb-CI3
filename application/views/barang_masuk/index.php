<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h3>Data Barang Masuk</h3>
            <table class="table">
                <thead>
                <div class="row mt-3">
                    <tr>
                        <th>ID Barang Masuk</th>
                        <th>ID User</th>
                        <th>ID Supplier</th>
                        <th>ID Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Masuk</th>
                        <th>Harga Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang_masuk as $brgm): ?>
                        <tr>
                            <td><?= $brgm['id_barang_masuk']; ?></td>
                            <td><?= $brgm['id_user']; ?></td>
                            <td><?= $brgm['id_supplier']; ?></td>
                            <td><?= $brgm['id_barang']; ?></td>
                            <td><?= $brgm['jumlah']; ?></td>
                            <td><?= $brgm['tanggal_masuk']; ?></td>
                            <td><?= $brgm['harga_beli']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>