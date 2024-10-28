<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <h3>Data Barang</h3>
            <table class="table">
                <thead>
                <div class="row mt-3">
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $brg): ?>
                        <tr>
                            <td><?= $brg['id_barang']; ?></td>
                            <td><?= $brg['nama_barang']; ?></td>
                            <td><?= $brg['harga_satuan']; ?></td>
                            <td><?= $brg['deskripsi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>