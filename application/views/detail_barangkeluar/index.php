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
            <a href="<?= base_url(); ?>detailbarangkeluar/tambah" class="btn btn-success">Tambah Data Detail Barang Keluar</a>
        </div>

        <!-- Tabel Data -->
        <h3>Data Detail Barang Keluar</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Detail Barang Keluar</th>
                    <th>ID Barang</th>
                    <th>ID Barang Keluar</th>
                    <th>Jumlah Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($detail_barang_keluar)): ?>
                    <?php foreach ($detail_barang_keluar as $dbgk): ?>
                        <tr>
                            <td><?= $dbgk['id_detail_barang_keluar']; ?></td>
                            <td><?= $dbgk['id_barang']; ?></td>
                            <td><?= $dbgk['id_barang_keluar']; ?></td>
                            <td><?= $dbgk['jmlh_keluar']; ?></td>
                            <td class="text">
                                <a href="<?= base_url(); ?>detailbarangkeluar/edit/<?= $dbgk['id_detail_barang_keluar']; ?>"
                                    class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin edit?')">Ubah</a>
                                <a href="<?= base_url(); ?>detailbarangkeluar/hapus/<?= $dbgk['id_detail_barang_keluar']; ?>"
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
</div>