<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Supplier
                </div>
                <div class="card-body">
                    <?= validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_supplier" class="form-label">ID Supplier</label>
                            <input type="text" name="id_supplier" class="form-control" id="id_supplier">
                        </div>
                        <div class="form-group">
                            <label for="nama_supplier" class="form-label">Nama Supplier</label>
                            <input type="text" name="nama_supplier" class="form-control" id="nama_supplier">
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="form-label">Alamat Supplier</label>
                            <input type="text" name="alamat" class="form-control" id="alamats">
                        </div>
                        <div class="form-group">
                            <label for="cp" class="form-label">Nomor Supplier</label>
                            <input type="text" name="cp" class="form-control" id="cp">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float">Tambah data</button>
                        <a href="<?= base_url('supplier'); ?>" class="btn btn-danger">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
