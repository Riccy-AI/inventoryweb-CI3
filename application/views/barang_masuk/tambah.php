<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Barang Masuk
                </div>
                <div class="card-body">
                    <?= validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_barang_masuk" class="form-label">ID Barang Masuk</label>
                            <input type="text" name="id_barang_masuk" class="form-control" id="id_barang_masuk">
                        </div>
                        <div class="form-group">
                            <label for="id_user" class="form-label">ID User</label>
                            <input type="text" name="id_user" class="form-control" id="id_user">
                        </div>
                        <div class="form-group">
                            <label for="id_supplier" class="form-label">ID Supplier</label>
                            <input type="text" name="id_supplier" class="form-control" id="id_supplier">
                        </div>
                        <div class="form-group">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <input type="text" name="id_barang" class="form-control" id="id_barang">
                        </div>
                        <div class="form-group">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input type="text" name="jumlah" class="form-control" id="jumlah">
                        </div>
                        <div class="form-group">
                            <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk">
                        </div>
                        <div class="form-group">
                            <label for="harga_beli" class="form-label">Harga Beli</label>
                            <input type="text" name="harga_beli" class="form-control" id="harga_beli">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary mt-3">Tambah data</button>
                        <a href="<?= base_url('barangmasuk'); ?>" class="btn btn-danger mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>