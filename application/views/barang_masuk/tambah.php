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
                            <label for="id_barang_masuk">ID Barang Masuk</label>
                            <input type="text" name="id_barang_masuk" id="id_barang_masuk" class="form-control" value="<?= set_value('id_barang_masuk'); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="id_user">ID User</label>
                            <select name="id_user" id="id_user" class="form-control" required>
                                <?php foreach ($user as $usr): ?>
                                    <option value="<?= $usr['id_user']; ?>"><?= $usr['id_user']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="id_supplier">Supplier</label>
                            <select name="id_supplier" id="id_supplier" class="form-control" required>
                                <?php foreach ($supplier as $sup): ?>
                                    <option value="<?= $sup['id_supplier']; ?>"><?= $sup['id_supplier']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tanggal_masuk">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control" value="<?= set_value('tanggal_masuk'); ?>" required>
                        </div>

                        <hr>
                        <h5>Detail Barang Masuk</h5>
                        <?php foreach ($barang as $b): ?>
                            <div class="form-group">
                                <label for="jmlh_masuk_<?= $b['id_barang']; ?>">Jumlah Masuk (<?= $b['nama_barang']; ?>)</label>
                                <input type="number" name="jmlh_masuk_<?= $b['id_barang']; ?>" id="jmlh_masuk_<?= $b['id_barang']; ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="harga_beli_<?= $b['id_barang']; ?>">Harga Beli (<?= $b['nama_barang']; ?>)</label>
                                <input type="number" name="harga_beli_<?= $b['id_barang']; ?>" id="harga_beli_<?= $b['id_barang']; ?>" class="form-control">
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="<?= base_url('barangmasuk'); ?>" class="btn btn-danger mt-3">Batal</a>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>