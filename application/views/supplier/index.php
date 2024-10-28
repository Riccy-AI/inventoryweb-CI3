<div class="container">
    <?php if( $this->session->flashdata('flash') ) : ?>
    <div class="row-mt3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">Data Supplier
                <strong>Berhasil</strong><?= $this->session->flashdata('flash'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <? endif; ?>
    <div class="row mt-2">
        <div class="col-md-12">
            <a href="<?= base_url(); ?>supplier/tambah" class="btn btn-primary">Tambah data Supplier</a>
            <h3>Data Supplier</h3>
            <table class="table">
                <thead>
                    <div class="row mt-3">
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
                            <td><?= $sup['cp']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>