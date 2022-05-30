<div class="border min-h-screen">
    <h1>Content laporan_pejualan</h1>
    <div>
        <table>
            <thead>
                <tr>
                    <th>
                        user
                    </th>
                    <th>
                        Banyak Transaksi
                    </th>
                    <th>
                        Total Pendapatan
                    </th>
                    <th>
                        Date
                    </th>
                    <th>
                        Detail
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan_penjualan as $lp) : ?>
                    <tr>
                        <td>
                            <?= $lp['id_user'] ?>
                        </td>
                        <td>
                            <?= $lp['banyak_transaksi'] ?>
                        </td>
                        <td>
                            <?= $lp['total_pemasukan'] ?>
                        </td>
                        <td>
                            <?= $lp['date'] ?>

                        </td>
                        <td>
                            <a href="<?= base_url('Lpenjualan/detail/') . $lp['date'] ?>"> detail</a>

                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

</div>