<div class="min-h-screen">
    Halaman
    <?php if (validation_errors()) :  ?>
        <?= validation_errors(); ?>
    <?php endif ?>
    <div>
        <form action="<?= base_url('Checkout') ?>" method="post">
            <div>
                <input type="text" name="name" placeholder="isi Nama Lengkap...">
            </div>
            <div>
                <input type="email" name="email" placeholder="isi Email...">
            </div>
            <div>
                <input type="text" name="alamat" placeholder="isi Alamat Lengkap...">
            </div>
            <div>
                <input type="text" name="notelp" placeholder="isi Nomor Telepon...">
            </div>
            <input type="submit" name="placeOrder"></input>
        </form>
    </div>
    <div>
        <?php foreach ($this->cart->contents() as $cb) { ?>
            <td>nama<?= $cb['name']; ?></td>
            <td>harga<?= $cb['price']; ?></td>
            <td><?php echo $cb["qty"]; ?></td>
            <td>subtotal<?= $cb['subtotal'] ?></td>
        <?php } ?>
    </div>

</div>