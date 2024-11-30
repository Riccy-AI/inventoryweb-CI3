<div class="container mt-3">

    <!-- Flashdata untuk Sukses -->
    <?php if ($this->session->flashdata('flash_success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= $this->session->flashdata('flash_success'); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Tombol Tambah Data -->
    <div class="row">
        <?php if ($role === '"admin"'): ?>
            <div class="col-md-12 d-flex justify-content-end">
                <a href="<?= base_url(); ?>barang/tambah" class="btn btn-success mb-3">Tambah Data Barang</a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Tabel Data Barang -->
    <h3>Data Barang</h3>
    <table class="table">
        <thead>
            <tr>
                <th>ID Barang</th>
                <th>ID User</th>
                <th>Nama Barang</th>
                <th>Jumlah Barang</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($barang)): ?>
                <?php foreach ($barang as $brg): ?>
                    <tr>
                        <td><?= $brg['id_barang']; ?></td>
                        <td><?= $brg['id_user']; ?></td>
                        <td><?= $brg['nama_barang']; ?></td>
                        <td><?= $brg['jmlh_barang']; ?></td>
                        <td><?= $brg['deskripsi']; ?></td>
                        <td class="text">

                            <?php if ($role === '"staff"'): ?>
                                <!-- Form Counter -->
                                <form method="post" action="<?= base_url('barang/updateQuantity'); ?>" class="d-inline">
                                    <!-- Hidden Input untuk ID Barang -->
                                    <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">

                                    <!-- Tombol Kurangi -->
                                    <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">-</button>

                                    <!-- Input Jumlah -->
                                    <input type="text" name="quantity"
                                        value="<?= $this->session->userdata('quantity_' . $brg['id_barang']) ?? 0; ?>"
                                        class="form-control d-inline-block mx-2 text-center"
                                        style="width: 60px;">

                                    <!-- Tombol Tambah -->
                                    <button type="submit" name="action" value="increase" class="btn btn-outline-success btn-sm">+</button>
                                </form>
                            <?php endif; ?>

                            <?php if ($role === '"admin"'): ?>
                                <a href="<?= base_url(); ?>barang/edit/<?= $brg['id_barang']; ?>"
                                    class="btn btn-primary btn-sm ms-2" title="Edit Data" onclick="return confirm('Yakin ingin edit data ini?')">
                                    Edit
                                </a>
                                <a href="<?= base_url(); ?>barang/hapus/<?= $brg['id_barang']; ?>"
                                    class="btn btn-danger btn-sm ms-2" title="Hapus Data" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                    Hapus
                                </a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-center">Data Barang Tidak Ditemukan</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>