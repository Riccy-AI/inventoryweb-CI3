<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Data Barang Keluar
                </div>
                <div class="card-body">
                    <?= validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_barang_keluar" class="form-label">ID Barang Keluar</label>
                            <input type="text" name="id_barang_keluar" class="form-control" id="id_barang_keluar">
                        </div>
                        <div class="form-group">
                            <label for="id_user" class="form-label">ID User</label>
                            <input type="text" name="id_user" class="form-control" id="id_user">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_keluar" class="form-label">Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" class="form-control" id="tanggal_keluar">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="<?= base_url('barangkeluar'); ?>" class="btn btn-danger mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>