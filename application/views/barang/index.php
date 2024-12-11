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
                                <form method="post" action="<?= base_url('barang/pesanBarang'); ?>" class="d-inline">
                                    <!-- Hidden Input untuk ID Barang -->
                                    <input type="hidden" name="id_barang" value="<?= $brg['id_barang']; ?>">

                                    <div class="input-group">
                                        <!-- Tombol Kurangi -->
                                        <button type="submit" name="action" value="decrease" class="btn btn-outline-secondary btn-sm">-</button>

                                        <!-- Input Jumlah Pesanan -->
                                        <input type="text"
                                            name="quantity"
                                            value="<?= isset($this->session->userdata('pesanan')[$brg['id_barang']]) ? $this->session->userdata('pesanan')[$brg['id_barang']] : 0; ?>"
                                            min="0"
                                            max="<?= $brg['jmlh_barang']; ?>"
                                            class="form-control d-inline-block mx-2 text-center"
                                            style="width: 60px;">

                                        <!-- Tombol Tambah -->
                                        <button type="submit" name="action" value="increase" class="btn btn-outline-success btn-sm">+</button>
                                    </div>
                                </form>


                            <?php endif; ?>

                            <?php if ($role === '"admin"'): ?>
                                <a href="<?= base_url(); ?>barang/edit/<?= $brg['id_barang']; ?>"
                                    class="btn btn-primary btn-sm ms-2" title="Edit Data" onclick="return confirm('Yakin ingin ubah data ini?')">
                                    Ubah
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
    <?php if ($role === '"staff"'): ?>
        <!-- Tombol Pesan dan Reset -->
        <div class="text-end mt-3">
            <a href="<?= base_url('barang/formPenerima'); ?>" class="btn btn-primary ms-2">Pesan</a>
            <a href="<?= base_url('barang/resetPesanan'); ?>" class="btn btn-secondary">Reset</a>

        </div>
    <?php endif; ?>
</div>