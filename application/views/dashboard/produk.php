<div class="container min-h-screen">
    <div class="mx-auto px-4 sm:px-8 max-w-full">
        <div class="py-8">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full pb-5">
                <h2 class="text-2xl leading-tight text-gray-700 font-bold dark:text-white">
                    Produk
                </h2>
                <div class="text-end">
                    <form action="<?= base_url('Produk'); ?>" method="POST" class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                        <div class="relative">
                            <input type="text" name="keyword" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Search Here..." autocomplete="off" />
                        </div>
                        <input type="submit" name="submit" class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" />
                    </form>
                </div>
                <div>
                    <a href="<?= base_url('Produk/spreadsheet_export');?>">download excel</a>
                </div>
            </div>
            <div class="mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto bg-white dark:bg-slate-800">
                <div class="px-5 mb-4 pb-2 text-left">
                    <a href="<?= base_url('Update_produk'); ?>" class="text-base font-semibold px-4 py-2 text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">Create</a>
                </div>
                <div class="inline-block min-w-full rounded-lg overflow-hidden bg-white dark:bg-slate-600 shadow-lg shadow-slate-900">
                    <h5>Result : <?= $total_rows; ?></h5>
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr class="shadow-lg shadow-gray-800">
                                <th scope="col" class="px-5 py-5 bg-white dark:bg-gray-800 dark:text-white border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Gambar
                                </th>
                                <th scope="col" class="px-5 py-5 bg-white dark:bg-gray-800 dark:text-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Nama Produk
                                </th>
                                <th scope="col" class="px-5 py-5 bg-white dark:bg-gray-800 dark:text-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Harga
                                </th>
                                <th scope="col" class="px-5 py-5 bg-white dark:bg-gray-800 dark:text-white border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Stock
                                </th>
                                <th scope="col" class="px-5 py-5 bg-white dark:bg-gray-800 dark:text-white border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    kategori
                                </th>
                                <th scope="col" class="px-5 py-5 bg-white dark:bg-gray-800 dark:text-white border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $a = 1;
                            foreach ($barang as $b) : ?>
                                <tr class="bg-white dark:bg-slate-700">
                                    <td class="px-5 py-5 border-b border-gray-500 text-sm">
                                        <div class="items-center">
                                            <img class="w-[5rem] h-[8rem] mx-auto rounded-md" src="<?= base_url('assets/img/upload/'). $b['image'] ?>" alt="">
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                        <p class="text-gray-900 text-base whitespace-no-wrap dark:text-gray-200">
                                            <?= $b['nama_barang']; ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                        <p class="text-gray-900 text-base whitespace-no-wrap dark:text-gray-200">
                                            <?= $b['harga']; ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                        <p class="text-gray-900 text-base whitespace-no-wrap dark:text-gray-200">
                                            <?= $b['stock']; ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                        <p class="text-gray-900 text-base whitespace-no-wrap dark:text-gray-200">
                                            <?= $b['nama_kategori']; ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-500  text-sm">
                                        <a href="<?= base_url('Edit_produk/index/') . $b['id']; ?>" class="text-base mr-2 pr-3 text-indigo-600 hover:text-indigo-900 dark:text-gray-200">
                                            Edit
                                        </a>
                                        <a href="<?= base_url('Edit_produk/Hapus_barang/') . $b['id']; ?>" class="text-base pl-3 text-indigo-600 hover:text-indigo-900 dark:text-gray-200">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <div class="pt-5 pb-2">
                    <?= $this->pagination->create_links(); ?>
                </div>
            </div>
        </div>
    </div>
</div>