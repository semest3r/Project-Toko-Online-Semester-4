<div>
    <?php foreach ($checkout as $c) { ?>
        <p><?= $c['nama_barang'] ?></p>
        <p><?= $c['penjualan'] ?></p>
        <p><?= $c['date'] ?></p>
    <?php } ?>
</div>