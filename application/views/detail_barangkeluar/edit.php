<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Form Edit Detail Data Barang Keluar
                </div>
                <div class="card-body">
                    <?= validation_errors(); ?>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="id_detail_barang_keluar" class="form-label">ID Detail Barang Keluar</label>
                            <input type="text" name="id_detail_barang_keluar" class="form-control" id="id_detail_barang_keluar">
                        </div>
                        <div class="form-group">
                            <label for="id_barang" class="form-label">ID Barang</label>
                            <input type="text" name="id_barang" class="form-control" id="id_barang">
                        </div>
                        <div class="form-group">
                            <label for="id_barang_keluar" class="form-label">ID Barang Keluar</label>
                            <input type="text" name="id_barang_keluar" class="form-control" id="id_barang_keluar">
                        </div>
                        <div class="form-group">
                            <label for="jmlh_keluar" class="form-label">Jumlah Keluar</label>
                            <input type="text" name="jmlh_keluar" class="form-control" id="jmlh_keluar">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float">Edit data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>