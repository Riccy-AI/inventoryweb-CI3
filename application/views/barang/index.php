<div class="container">
    <?php if ($this->session->flashdata('flash')) : ?>
        <div class="row mt-2">
            <div class="col-md-6">
                <div class="alert alert-success alert-dismissible fade show" role="alert"> Data Barang
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
                <a href="<?= base_url(); ?>barang/tambah" class="btn btn-success">Tambah Data Barang</a>
            </div>
            <h3>Data Barang</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($barang as $brg): ?>
                        <tr>
                            <td><?= $brg['id_barang']; ?></td>
                            <td><?= $brg['nama_barang']; ?></td>
                            <td><?= $brg['jmlh_barang']; ?></td>
                            <td class="d-flex justify-content-between align-items-center">
                                <div class="flex-grow-1">
                                    <?= $brg['deskripsi']; ?>
                                </div>
                                <div>
                                    <a href="<?= base_url(); ?>barang/edit/<?= $brg['id_barang']; ?>"
                                        class="badge text-bg-primary" onclick="return confirm('Yakin ingin edit?')">Edit</a>
                                    <a href="<?= base_url(); ?>barang/hapus/<?= $brg['id_barang']; ?>"
                                        class="badge text-bg-danger ms-2" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>