<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Data Barang Keluar
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
                <a href="<?= base_url(); ?>barangkeluar/tambah" class="btn btn-success">Tambah Data Barang Keluar</a>
            </div>
            <h3>Data Barang Keluar</h3>
            <table class="table">
                <thead>
                    <div class="row mt-3">
                        <tr>
                            <th>ID Barang Keluar</th>
                            <th>ID User</th>
                            <th>Tanggal Keluar</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang_keluar as $brgk): ?>
                        <tr>
                            <td><?= $brgk['id_barang_keluar']; ?></td>
                            <td><?= $brgk['id_user']; ?></td>
                            <td class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <?= $brgk['tanggal_keluar']; ?>
                                </div>
                                <div>
                                    <a href="<?= base_url(); ?>barangkeluar/edit/<?= $brgk['id_barang_keluar']; ?>"
                                        class="badge text-bg-primary" onclick="return confirm('Yakin ingin edit?')">Edit</a>
                                    <a href="<?= base_url(); ?>barangkeluar/hapus/<?= $brgk['id_barang_keluar']; ?>"
                                        class="badge text-bg-danger ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>