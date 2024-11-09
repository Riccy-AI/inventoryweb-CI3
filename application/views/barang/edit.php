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
                            <label for="nama_supplier" class="form-label">Nama Barang</label>
                            <input type="text" name="nama_barang" class="form-control" id="nama_barang">
                        </div>
                        <div class="form-group">
                            <label for="harga_satua" class="form-label">Harga Satuan</label>
                            <input type="text" name="harga_satuan" class="form-control" id="harga_satuan">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                        </div>
                        <button type="submit" name="tambah" class="btn btn-primary float">Edit data</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
