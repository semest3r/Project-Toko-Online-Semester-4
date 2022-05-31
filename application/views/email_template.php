Selamat Pesanan Anda Berhasil<br>
Pesanan anda akan diproses dalam waktu 1x24jam<br>
<br>
Detail Pemesan :<br>
ID ORDER = #<?php echo $transaksi['id']; ?><br>
Nama Pembeli = <?php echo $transaksi['name']; ?><br>
Nomor Telp = <?php echo $transaksi['notelp']; ?><br>
Alamat = <?php echo $transaksi['alamat']; ?><br>
<br>
Detail Pesanan :<br>
<?php foreach($transaksi['items'] as $item){ ?>
Nama Barang = <?php echo $item['nama_barang'] ?><br>
Quantity = <?php echo $item['total_barang'] ?><br>
Sub Total = <?php echo $item['total_harga_barang'] ?><br>
<?php }?>