<div class="container mt-3">

    <!-- Flashdata untuk Sukses -->
    <?php if ($this->session->flashdata('flash_success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('flash_success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-12 d-flex justify-content-end mb-3">
            <a href="<?= base_url(); ?>supplier/tambah" class="btn btn-success">Tambah Data Supplier</a>
        </div>
    </div>

    <!-- Tabel Data Supplier -->
    <h3>Data Supplier</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID Supplier</th>
                <th>Nama Supplier</th>
                <th>Alamat</th>
                <th>Contact Person</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($supplier)): ?>
                <?php foreach ($supplier as $sup): ?>
                    <tr>
                        <td><?= $sup['id_supplier']; ?></td>
                        <td><?= $sup['nama_supplier']; ?></td>
                        <td><?= $sup['alamat']; ?></td>
                        <td><?= $sup['cp']; ?></td>
                        <td class="text-center">
                            <a href="<?= base_url(); ?>supplier/edit/<?= $sup['id_supplier']; ?>"
                                class="btn btn-primary btn-sm" title="Edit Data" onclick="return confirm('Yakin ingin edit data ini?')">
                                Edit
                            </a>
                            <a href="<?= base_url(); ?>supplier/hapus/<?= $sup['id_supplier']; ?>"
                                class="btn btn-danger btn-sm ms-2" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                Hapus
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center">Data Supplier Tidak Ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</div>
</div>