<div class="container mt-3">

    <!-- Flashdata untuk Sukses -->
    <?php if ($this->session->flashdata('flash_success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('flash_success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Tombol Tambah Data -->
    <div class="row">
        <div class="col-md-12 d-flex justify-content-end mb-3">
            <a href="<?= base_url(); ?>detailbarangmasuk/tambah" class="btn btn-success">Tambah Data Detail Barang Masuk</a>
        </div>
    </div>

    <!-- Tabel Data -->
    <h3>Data Detail Barang Masuk</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID Detail Barang Masuk</th>
                <th>ID Barang Masuk</th>
                <th>ID Barang</th>
                <th>Jumlah Masuk</th>
                <th>Harga Beli</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($detail_barang_masuk)): ?>
                <?php foreach ($detail_barang_masuk as $dbgm): ?>
                    <tr>
                        <td><?= $dbgm['id_detail_barang_masuk']; ?></td>
                        <td><?= $dbgm['id_barang_masuk']; ?></td>
                        <td><?= $dbgm['id_barang']; ?></td>
                        <td><?= $dbgm['jmlh_masuk']; ?></td>
                        <td><?= $dbgm['harga_beli']; ?></td>
                        <td class="text">
                            <a href=" <?= base_url(); ?>detailbarangmasuk/edit/<?= $dbgm['id_detail_barang_masuk']; ?>"
                                class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin ubah?')">Ubah</a>
                            <a href="<?= base_url(); ?>detailbarangmasuk/hapus/<?= $dbgm['id_detail_barang_masuk']; ?>"
                                class="btn btn-danger btn-sm ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Data Tidak Ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>