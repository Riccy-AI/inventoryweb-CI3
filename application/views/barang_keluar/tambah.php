<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Tambah Data Barang Keluar
                </div>
                <div class="card-body">
                    <?= validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_barang_keluar">ID Barang Keluar</label>
                            <input type="text" name="id_barang_keluar" id="id_barang_keluar" class="form-control" value="<?= set_value('id_barang_keluar'); ?>">
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
                            <label for="tanggal_keluar">Tanggal Keluar</label>
                            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" value="<?= set_value('tanggal_keluar'); ?>">
                        </div>

                        <hr>
                        <h5>Detail Barang Keluar</h5>
                        <?php foreach ($barang as $b): ?>
                            <div class="form-group">
                                <label for="jmlh_keluar_<?= $b['id_barang'] ?>">Jumlah Keluar <?= $b['nama_barang'] ?>:</label>
                                <input type="number" name="jmlh_keluar_<?= $b['id_barang'] ?>" id="jmlh_keluar_<?= $b['id_barang'] ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="harga_jual_<?= $b['id_barang'] ?>">Harga Jual <?= $b['nama_barang'] ?>:</label>
                                <input type="number" name="harga_jual_<?= $b['id_barang'] ?>" id="harga_jual_<?= $b['id_barang'] ?>" class="form-control">
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        <a href="<?= base_url('barangkeluar'); ?>" class="btn btn-danger mt-3">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>