<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/output.css" type="text/css">
    <link href="img/favicon.ico" rel="icon">

    <title>Cart</title>
</head>

<body>
    <div class="min-h-full grid grid-cols-5 grid-flow-row auto-rows-max justify-self-stretch">
        <div class="col-span-5 h-20"></div>
        <div class="p-4 col-start-2 col-span-3 w-full shadow-md justify-self-center border-2 rounded-md">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-8 py-4 border-b-2 border-blue-500">
                            <p>Nama</p>
                        </th>
                        <th class="px-8 py-4 border-b-2 border-blue-500">
                            <p>Harga</p>
                        </th>
                        <th class="px-8 py-4 border-b-2 border-blue-500">
                            <p>Quantity</p>
                        </th>
                        <th class="pr-4 py-4 border-b-2 border-blue-500 text-right">
                            <p>Sub Total</p>
                        </th>
                        <th class="border-b-2 border-blue-500">

                        </th>
                    </tr>
                </thead>
                <?php if ($this->cart->total_items() <= 0) { ?>
                    <tbody>
                        <tr>
                            <td colspan="4" class="text-center">
                                <h1 class="pt-5 pb-2 font-medium text-lg">KOSONG</h1>
                            </td>
                        </tr>
                    </tbody>
                <?php } else { ?>
                    <tbody>
                        <?php foreach ($this->cart->contents() as $cb) { ?>
                            <tr>
                                <td class="p-4 border-b-2">
                                    <?= $cb['name']; ?>
                                </td>
                                <td class="p-4 border-b-2 text-center">
                                    <?= $cb['price']; ?>
                                </td>
                                <td class="p-4 border-b-2 text-center">
                                    <input type="number" class="text-center rounded-md w-20" value="<?php echo $cb["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $cb['rowid']; ?>')">
                                </td>
                                <td class="p-4 border-b-2 text-right">
                                    <?= $cb['subtotal'] ?>
                                </td>
                                <td class="p-4 border-b-2 text-right">
                                    <button class="hover:underline underline-offset-2 text-black hover:text-blue-800" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('Cart/removeItem/' . $cb['rowid']); ?>':false;"><i class="itrash"></i>Delete</button>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td class="p-4 border-b-2">
                                <p class="font-semibold">Jumlah</p>
                            </td>
                            <td colspan="3" class="p-4 border-b-2 text-right font-semibold"><?= $this->cart->total(); ?></td>
                            <th class="border-b-2">

                            </th>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        </div>
        <div class="col-start-2 row-start-3 col-span-3 mt-5 justify-self-end">
            <?php if ($this->cart->total_items() <= 0) { ?>
                <a class="px-4 mx-5 py-2 border border-blue-500 hover:border-2 rounded-sm hover:font-semibold" href="<?= base_url('') ?>">Back</a>
            <?php } else { ?>
                <a class="px-5 mx-5 py-2 border border-blue-500 hover:border-2 rounded-sm" href="<?= base_url('') ?> ">Back</a>
                <a class="px-5 mx-5 py-2 border border-blue-500 hover:border-2 rounded-sm" href="<?= base_url('Checkout') ?>">Checkout</a>
            <?php } ?>
        </div>
        <div class="col-span-5 h-20"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Update item quantity
        function updateCartItem(obj, rowid) {
            $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {
                rowid: rowid,
                qty: obj.value
            }, function(resp) {
                if (resp == 'ok') {
                    location.reload();
                } else {
                    alert('Cart update failed, please try again.');
                }
            });
        }
    </script>
</body>

</html>