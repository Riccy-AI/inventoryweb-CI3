<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Data Supplier
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
            <a href="<?= base_url(); ?>supplier/tambah" class="btn btn-primary">Tambah data Supplier</a>
            <h3>Data Supplier</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Supplier</th>
                        <th>Nama Supplier</th>
                        <th>Alamat</th>
                        <th>Contact Person</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($supplier as $sup): ?>
                        <tr>
                            <td><?= $sup['id_supplier']; ?></td>
                            <td><?= $sup['nama_supplier']; ?></td>
                            <td><?= $sup['alamat']; ?></td>
                            <td class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <?= $sup['cp']; ?>
                                </div>
                                <div>
                                    <a href="<?= base_url(); ?>supplier/edit/<?= $sup['id_supplier']; ?>"
                                        class="badge text-bg-primary" onclick="return confirm('Yakin ingin edit?')">Edit</a>
                                    <a href="<?= base_url(); ?>supplier/hapus/<?= $sup['id_supplier']; ?>"
                                        class="badge text-bg-danger ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </div>
                            </td>


                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>