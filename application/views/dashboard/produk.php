<div class="container min-h-screen bg-gray-100">
    <div class="mx-auto max-w-full">
        <div class="pb-8 grid grid-cols-10 ">
            <div class="col-start-1 row-start-1 py-5 px-5">
                <h2 class="text-4xl font-bold leading-tight ">
                    Produk
                </h2>
            </div>
            <div class="col-start-1 row-start-2 grid grid-cols-5 col-span-10 justify-self-strecth ">
                <div class="col-start-1 p-3 mt-2">
                    <a href="<?= base_url('Update_produk'); ?>" class="px-4 py-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">Create</a>
                </div>
                <div class="col-start-2 col-span-3 w-full p-3 justify-self-center">
                    <form action="<?= base_url('Produk'); ?>" method="POST" class="flex justify-center">
                        <input type="text" name="keyword" class="w-2/4 px-2 mx-2 rounded-sm" placeholder="Search Here..." autocomplete="off" />
                        <input type="submit" name="submit" class="px-3 mx-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" />
                    </form>
                </div>
                <div class="col-start-5 justify-self-end p-3 mt-2">
                    <a href="<?= base_url('Produk/spreadsheet_export'); ?>" class="px-4 py-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">download</a>
                </div>
            </div>
            <div class="row-start-3 col-span-10 px-10 pb-5 mt-5 border-t-2 bg-white shadow-lg">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr class="">
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-md uppercase font-semibold">
                                Gambar
                            </th>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-md uppercase font-semibold">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-md uppercase font-semibold">
                                Harga
                            </th>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-md uppercase font-semibold">
                                Stock
                            </th>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-md uppercase font-semibold">
                                kategori
                            </th>
                            <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-md uppercase font-semibold">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $a = 1;
                        foreach ($barang as $b) : ?>
                            <tr class="">
                                <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                    <div class="items-center">
                                        <img class="w-[6rem] h-[7.5rem] mx-auto rounded-md shadow-md shadow-slate-700" src="<?= base_url('assets/img/upload/') . $b['image'] ?>" alt="">
                                    </div>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p class="text-gray-900 text-base whitespace-no-wrap ">
                                        <?= $b['nama_barang']; ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p class="text-gray-900 text-base whitespace-no-wrap ">
                                        <?= $b['harga']; ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p class="text-gray-900 text-base whitespace-no-wrap ">
                                        <?= $b['stock']; ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <p class="text-gray-900 text-base whitespace-no-wrap ">
                                        <?= $b['nama_kategori']; ?>
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                    <a href="<?= base_url('Edit_produk/index/') . $b['id']; ?>" class="text-base mr-2 pr-3 text-indigo-600 hover:text-indigo-900 ">
                                        Edit
                                    </a>
                                    <a href="<?= base_url('Edit_produk/Hapus_barang/') . $b['id']; ?>" class="text-base pl-3 text-indigo-600 hover:text-indigo-900">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <div class="pt-5 pb-2">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>

        </div>
    </div>
</div>