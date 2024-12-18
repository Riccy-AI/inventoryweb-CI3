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
            <a href="<?= base_url(); ?>barangmasuk/tambah" class="btn btn-success">Tambah Data Barang Masuk</a>
        </div>

        <!-- Tabel Data -->
        <h3>Data Barang Masuk</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>ID Barang Masuk</th>
                    <th>ID User</th>
                    <th>ID Supplier</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($barang_masuk)): ?>
                    <?php foreach ($barang_masuk as $brgm): ?>
                        <tr>
                            <td><?= $brgm['id_barang_masuk']; ?></td>
                            <td><?= $brgm['id_user']; ?></td>
                            <td><?= $brgm['id_supplier']; ?></td>
                            <td><?= $brgm['tanggal_masuk']; ?></td>
                            <td class="text">
                                <a href="<?= base_url(); ?>barangmasuk/edit/<?= $brgm['id_barang_masuk']; ?>"
                                    class="btn btn-primary btn-sm" onclick="return confirm('Yakin ingin edit?')">Ubah</a>
                                <a href="<?= base_url(); ?>barangmasuk/hapus/<?= $brgm['id_barang_masuk']; ?>"
                                    class="btn btn-danger btn-sm ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                <a href="<?= base_url('barangmasuk/detail/' . $brgm['id_barang_masuk']); ?>" class="btn btn-info btn-sm ms-2">Detail</a>
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
</div>