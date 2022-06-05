<div class="container min-h-screen">
    <div class="mx-auto max-w-full">
        <div class="pt-4 pb-8 grid grid-cols-10 ">
            <div class="col-start-1 row-start-1 py-5 px-5">
                <h2 class="text-4xl font-bold leading-tight ">
                    Kategori
                </h2>
            </div>
            <div class="col-start-1 row-start-2 grid grid-cols-5 col-span-10 justify-self-strecth ">
                <div class="col-start-5 justify-self-end p-3 mt-2">
                    <a href="#" class="px-4 mr-[3rem] py-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">download</a>
                </div>
            </div>
            <div class="row-start-3 col-span-10 px-10 pb-5 mt-5 bg-gray-100 shadow-lg">

                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                Nama Barang
                            </th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                Banyak Barang
                            </th>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                Date
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($checkout as $c) { ?>
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p><?= $c['nama_barang'] ?></p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p><?= $c['penjualan'] ?></p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p><?= $c['date'] ?></p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>