<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Data Detail Barang Masuk
                    <strong> Berhasil </strong><?= $this->session->flashdata('flash'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <div class="row mt-2">
        <div class="col-md-12">
            <div class="d-flex justify-content-end mb-3">
                <a href="<?= base_url(); ?>detailbarangmasuk/tambah" class="btn btn-success">Tambah Data Detail Barang Masuk</a>
            </div>
            <h3>Data Detail Barang Masuk</h3>
            <table class="table">
                <thead>
                    <div class="row mt-3">
                        <tr>
                            <th>ID Detail Barang Masuk</th>
                            <th>ID Barang Masuk</th>
                            <th>ID Barang</th>
                            <th>Jumlah Masuk</th>
                            <th>Harga Beli</th>
                        </tr>
                </thead>
                <tbody>
                    <?php foreach ($detail_barang_masuk as $dbgm): ?>
                        <tr>
                            <td><?= $dbgm['id_detail_barang_masuk']; ?></td>
                            <td><?= $dbgm['id_barang_masuk']; ?></td>
                            <td><?= $dbgm['id_barang']; ?></td>
                            <td><?= $dbgm['jmlh_masuk']; ?></td>
                            <td class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <?= $dbgm['harga_beli']; ?>
                                </div>
                                <div>
                                    <a href="<?= base_url(); ?>detailbarangmasuk/edit/<?= $dbgm['id_detail_barang_masuk']; ?>"
                                        class="badge text-bg-primary" onclick="return confirm('Yakin ingin edit?')">Edit</a>
                                    <a href="<?= base_url(); ?>detailbarangmasuk/hapus/<?= $dbgm['id_detail_barang_masuk']; ?>"
                                        class="badge text-bg-danger ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>