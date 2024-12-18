<div class="container mt-3">
    <h3>Bagian Penerima</h3>

    <form method="post" action="<?= base_url('barang/simpanPenerima'); ?>">
        <div class="form-group">
            <label for="id_bagian">ID Bagian</label>
            <select name="id_bagian" id="id_bagian" class="form-control" required>
                <?php foreach ($bagian as $b): ?>
                    <option value="<?= $b['id_bagian']; ?>"><?= $b['id_bagian']; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_bagian">Nama Bagian</label>
            <select name="nama_bagian" id="nama_bagian" class="form-control" required>
                <?php foreach ($bagian as $b): ?>
                    <option value="<?= $b['nama_bagian']; ?>"><?= $b['nama_bagian']; ?> </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="nama_penerima">Nama Penerima</label>
            <input type="text" name="nama_penerima" id="nama_penerima" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_keluar">Tanggal Keluar</label>
            <input type="date" name="tanggal_keluar" id="tanggal_keluar" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Cetak</button>
        <a href="<?= base_url('barang'); ?>" class="btn btn-secondary mt-3">Kembali</a>

    </form>

    <h4>Data Pesanan Barang</h4>
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
            <?php foreach ($pesanan as $id_barang => $jumlah): ?>
                <?php
                $barangData = $this->db->get_where('barang', ['id_barang' => $id_barang])->row_array();
                if ($barangData):
                ?>
                    <tr>
                        <td><?= $barangData['id_barang']; ?></td>
                        <td><?= $barangData['nama_barang']; ?></td>
                        <td><?= $jumlah; ?></td>
                        <td><?= $barangData['deskripsi']; ?></td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>