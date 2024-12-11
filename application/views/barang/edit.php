<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Barang
                </div>
                <div class="card-body">
                    <?= validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <input type="text" name="id_barang" class="form-control" id="id_barang">
                        </div>
                        <div class="form-group">
                            <label for="id_user" class="form-label">ID User</label>
                            <input type="text" name="id_user" class="form-control" id="id_user">
                        </div>
                        <div class="form-group">
                            <label for="nama_supplier" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="jmlh_barang" class="form-label">Jumlah Barang</label>
                            <input type="text" name="jmlh_barang" class="form-control" id="jmlh_barang">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="<?= base_url('barang'); ?>" class="btn btn-danger mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>