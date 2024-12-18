<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Detail Data Barang Masuk
                </div>
                <div class="card-body">
                    <!-- Menampilkan error validasi -->
                    <?= validation_errors('<div class="alert alert-danger" role="alert">', '</div>'); ?>

                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_detail_barang_masuk" class="form-label">ID Detail Barang Masuk</label>
                            <input type="text" name="id_detail_barang_masuk" class="form-control" id="id_detail_barang_masuk" value="<?= set_value('id_detail_barang_masuk'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_barang_masuk" class="form-label">ID Barang Masuk</label>
                            <input type="text" name="id_barang_masuk" class="form-control" id="id_barang_masuk" value="<?= set_value('id_barang_masuk'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <!-- Validasi variabel PHP agar tidak error -->
                            <input type="text" name="id_barang" class="form-control" id="id_barang" value="<?= isset($id_barang) ? $id_barang : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="jmlh_masuk" class="form-label">Jumlah Masuk</label>
                            <input type="text" name="jmlh_masuk" class="form-control" id="jmlh_masuk" value="<?= set_value('jmlh_masuk'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="harga_beli" class="form-label">Harga Beli</label>
                            <input type="text" name="harga_beli" class="form-control" id="harga_beli" value="<?= set_value('harga_beli'); ?>">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="<?= base_url('detailbarangmasuk'); ?>" class="btn btn-danger mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>