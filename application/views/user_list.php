<html><br>

<head>
    <title>User Report</title>
</head>

<body>
    <style>
        h3 {
            font-family: Verdana;
            font-size: 18pt;
            font-style: normal;
            font-weight: bold;
            color: red;
            text-align: center;
        }

        table {
            font-family: Verdana;
            color: black;
            font-size: 12pt;
            font-style: normal;
            font-weight: bold;
            text-align: left;
            border-collapse: collapse;
        }
    </style>
    <h3>Bukti Pembelian Barang</h3>
    <?php foreach ($transaksi as $row) { ?>
        <div align="center">
            <p>Nama Pembeli : <?php echo $row['nama_pembeli'] ?></p>
            <p>Nomor Telepon : <?php echo $row['notelp_pembeli'] ?></p>
            <p>Alamat : <?php echo $row['alamat_pembeli']; ?></p>
        </div>

    <?php } ?>
    <table align="center" cellpadding="5" border="1">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Quantity</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($checkout as $c) { ?>
                <tr>
                    <td><?php echo $c['nama_barang'] ?></td>
                    <td><?php echo $c['total_barang'] ?></td>
                    <td><?php echo $c['total_harga_barang'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>