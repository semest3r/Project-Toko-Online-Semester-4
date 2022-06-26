<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FlowBite -->
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />
    <!-- TailwindCSS -->
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/output.css" type="text/css">
    <title>Document</title>
</head>

<body class="bg-slate-100">
    <div class="container w-[60%] mx-auto h-full">
        <div class="grid">
            <div class="h-20"></div>
            <div class="px-5 pt-5 mt-2 bg-white">
                <h1 class="text-center font-bold text-6xl underline-offset-2 py-3">Pembelian Sukses</h1>
                <div>
                    <p class="fond-bold">
                        ID ORDER : #<?= $transaksi['id']; ?>
                    </p>
                    <p>
                        Nama Pembeli : <?= $transaksi['name']; ?>
                    </p>
                    <p>
                        Nomor Telp : <?= $transaksi['notelp']; ?>
                    </p>
                    <p>
                        Alamat : <?= $transaksi['alamat']; ?>
                    </p>
                </div>
            </div>
            <div class="bg-white p-5">
                <table class="border-collapse border border-slate-500 text-center w-full">
                    <thead class="bg-slate-200">
                        <tr>
                            <th class="border border-slate-600  py-2">
                                <p>Nama Barang</p>
                            </th>
                            <th class="border border-slate-600  py-2">
                                <p>Quantity</p>
                            </th>
                            <th class="border border-slate-600  py-2">
                                <p>Sub Total</p>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($transaksi['items'] as $c) { ?>
                            <tr>
                                <td class="border border-slate-700 text-left pl-2 py-1">
                                    <?= $c['nama_barang']; ?>
                                </td>
                                <td class="border border-slate-700 py-1">
                                    <?= $c['total_barang']; ?>
                                </td>
                                <td class="border border-slate-700 py-1">
                                   Rp. <?= $c['total_harga_barang']; ?>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td class="border border-slate-800">
                                <p class="text-lg font-semibold">Total</p>
                            </td>
                            <td colspan="2" class="border border-slate-800">
                                <p class="text-md font-semibold">Rp. <?= $transaksi['total_harga']; ?></p>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="bg-white pt-2 pb-5  ">
                <a class="px-5 mx-5 py-2 border border-blue-500 hover:border-2 rounded-sm" href="<?= base_url('Market') ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 font-semibold inline-block" fill="none" viewBox="0 0 24 24" stroke="currentColor" strokeWidth={2}>
                        <path strokeLinecap="round" strokeLinejoin="round" d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z" />
                    </svg><span class="inline-block">Ke Belanja</span></a>
            </div>
        </div>

    </div>
</body>

</html>