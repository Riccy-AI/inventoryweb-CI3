<div class="container mt-3">

    <h1 align="center"><?= $judul; ?></h1>

    <h3>Informasi Barang Masuk</h3>
    <ul>
        <li>ID Barang Masuk: <?= $barang_masuk['id_barang_masuk']; ?></li>
        <li>ID User: <?= $barang_masuk['id_user']; ?></li>
        <li>ID Supplier: <?= $barang_masuk['id_supplier']; ?></li>
        <li>Tanggal Masuk: <?= $barang_masuk['tanggal_masuk']; ?></li>
    </ul>


    <?php if (!empty($detail_barang_masuk)): ?>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Detail</th>
                    <th>ID Barang</th>
                    <th>Jumlah Masuk</th>
                    <th>Harga Beli</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($detail_barang_masuk as $detail) : ?>
                    <tr>
                        <td><?= $detail['id_detail_barang_masuk']; ?></td>
                        <td><?= $detail['id_barang']; ?></td>
                        <td><?= $detail['jmlh_masuk']; ?></td>
                        <td><?= $detail['harga_beli']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Data detail barang masuk tidak ditemukan.</p>
    <?php endif; ?>

    <!-- Tombol Kembali -->
    <a href="<?= base_url('barangmasuk'); ?>" class="btn btn-secondary">Kembali</a>