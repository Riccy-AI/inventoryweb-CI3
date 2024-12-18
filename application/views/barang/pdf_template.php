<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Penerima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 30px;
            line-height: 1.5;
        }

        /* Kop Surat */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .img {
            width: 100px;
            height: auto;
        }

        .header h1 {
            margin: 10px 0 5px 0;
            font-size: 20px;
            text-transform: uppercase;
        }

        .header p {
            margin: 0;
            font-size: 12px;
        }

        .header .divider {
            margin: 10px auto;
            border-top: 2px solid #000;
        }

        /* Info Penerima */
        .info {
            margin-bottom: 20px;
        }

        .info p {
            margin: 5px 0;
            font-size: 12px;
        }

        /* Tabel Barang */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }

        th {
            background-color: #f2f2f2;
        }

        /* Footer */
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
        }
    </style>
</head>

<body>
    <!-- Header -->

    <div class="header">
        <h1>Form Penerima</h1>
        <p>Kantor Notaris Mochamad Fardiansyah S.HO.,M.Kn</p>
        <p>Jl. Raya No. 123, Kota ABC</p>
        <div class="divider"></div>
    </div>

    <!-- Info Penerima -->
    <div class="info">
        <p><strong>ID Bagian:</strong> <?= $penerima['id_bagian']; ?></p>
        <p><strong>Nama Bagian:</strong> <?= $penerima['nama_bagian']; ?></p>
        <p><strong>Nama Penerima:</strong> <?= $penerima['nama_penerima']; ?></p>
        <p><strong>Tanggal Keluar:</strong> <?= date('d-m-Y', strtotime($penerima['tanggal_keluar'])); ?></p>
    </div>

    <!-- Tabel Barang -->
    <h3>Data Barang Pesanan</h3>
    <table>
        <thead>
            <tr>
                <th style="width: 10%;">No</th>
                <th style="width: 20%;">ID Barang</th>
                <th style="width: 40%;">Nama Barang</th>
                <th style="width: 20%;">Jumlah Barang</th>
                <th style="width: 20%;">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($barang)): ?>
                <?php
                $no = 1; // Inisialisasi nomor urut
                foreach ($barang as $b):
                ?>
                    <tr>
                        <td><?= $no++; ?></td> <!-- Tampilkan nomor urut -->
                        <td><?= $b['id_barang']; ?></td>
                        <td><?= $b['nama_barang']; ?></td>
                        <td><?= $b['jmlh_barang']; ?></td>
                        <td><?= $b['deskripsi']; ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data barang.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>


    <!-- Footer -->
    <div class="footer">
        <p>Form ini dihasilkan oleh sistem pada <?= date('d-m-Y H:i:s'); ?></p>
    </div>
</body>

</html>