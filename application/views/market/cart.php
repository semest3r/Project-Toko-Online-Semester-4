<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
// Update item quantity
function updateCartItem(obj, rowid){
    $.get("<?php echo base_url('cart/updateItemQty/'); ?>", {rowid:rowid, qty:obj.value}, function(resp){
        if(resp == 'ok'){
            location.reload();
        }else{
            alert('Cart update failed, please try again.');
        }
    });
}
</script>
<div class="min-h-screen">
    Halaman Cart
    <div class="grid grid-cols-1 gap-8 mt-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
        <?php foreach($this->cart->contents() as $cb){ ?>
            <td>nama<?= $cb['name'];?></td>
            <td>harga<?= $cb['price'];?></td>
            <td><input type="number" class="form-control text-center" value="<?php echo $cb["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $cb['rowid']; ?>')"></td>
            <td>subtotal<?= $cb['subtotal']?></td>
            <button class="" onclick="return confirm('Are you sure to delete item?')?window.location.href='<?php echo base_url('Cart/removeItem/'.$cb['rowid']); ?>':false;"><i class="itrash"></i> delete</button> </td>
            <?php }?>
            <FORM>
                <?= form_open('') ?>
                <?= form_hidden('') ?>
            </FORM>
    </div>
    <a href="<?= base_url('') ?>">Back</a>
    <a href="<?= base_url('Checkout')?>">Checkout</a>
</div>