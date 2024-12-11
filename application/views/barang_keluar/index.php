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
        <div class="col-md-12 d-flex justify-content-end">
            <a href="<?= base_url(); ?>barangkeluar/tambah" class="btn btn-success mb-3">Tambah Data Barang Keluar</a>
        </div>

        <!-- Tabel Data Barang -->
        <h3>Data Barang Keluar</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Barang Keluar</th>
                    <th>ID User</th>
                    <th>Tanggal Keluar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($barang_keluar)): ?>
                    <?php foreach ($barang_keluar as $brgk): ?>
                        <tr>
                            <td><?= $brgk['id_barang_keluar']; ?></td>
                            <td><?= $brgk['id_user']; ?></td>
                            <td><?= $brgk['tanggal_keluar']; ?></td>
                            <td class="text">
                                <a href="<?= base_url(); ?>barangkeluar/edit/<?= $brgk['id_barang_keluar']; ?>"
                                    class="btn btn-primary btn-sm" onclick=" return confirm('Yakin ingin ubah data ini?')">Ubah</a>
                                <a href="<?= base_url(); ?>barangkeluar/hapus/<?= $brgk['id_barang_keluar']; ?>"
                                    class="btn btn-danger btn-sm ms-2" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">Data Barang Tidak Ditemukan</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>