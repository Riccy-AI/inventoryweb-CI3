<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Data Barang Masuk
                    <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url(); ?>barangmasuk/tambah" class="btn btn-success">Tambah Data Barang Masuk</a>
            </div>
            <h3>Data Barang Masuk</h3>
            <table class="table">
                <thead>
                    <div class="row mt-3">
                        <tr>
                            <th>ID Barang Masuk</th>
                            <th>ID User</th>
                            <th>ID Supplier</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang_masuk as $brgm): ?>
                        <tr>
                            <td><?= $brgm['id_barang_masuk']; ?></td>
                            <td><?= $brgm['id_user']; ?></td>
                            <td><?= $brgm['id_supplier']; ?></td>
                            <td class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <?= $brgm['tanggal_masuk']; ?>
                                </div>
                                <div>
                                    <a href="<?= base_url(); ?>barangmasuk/edit/<?= $brgm['id_barang_masuk']; ?>"
                                        class="badge text-bg-primary" onclick="return confirm('Yakin ingin edit?')">Edit</a>
                                    <a href="<?= base_url(); ?>barangmasuk/hapus/<?= $brgm['id_barang_masuk']; ?>"
                                        class="badge text-bg-danger ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>