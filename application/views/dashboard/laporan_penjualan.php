<div class="min-h-screen w-full bg-gray-100">
    <div class="col-start-1 row-start-2 grid grid-cols-5 col-span-10 justify-self-strecth ">
        <div class="col-start-1 row-start-1 col-span-5 py-5 px-5">
            <h2 class="text-4xl font-bold text-left leading-tight ">
                Laporan Penjualan
            </h2>
        </div>
        <div class="col-start-1 p-3 mt-2">
            <button type="button" data-modal-toggle="pModal" class="px-4 py-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">Create</button>
        </div>
        <div class="col-start-5 justify-self-end p-3 mt-2">
            <a href="#" class="px-4 py-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">download</a>
        </div>
    </div>
    <div class="row-start-3 col-span-10 px-10 pb-5 mt-5 border-t-2 bg-white shadow-lg">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                        user
                    </th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                    <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                        Banyak Transaksi
                    </th>
                    <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                        Total Pendapatan
                    </th>
                    <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                        Date
                    </th>
                    <th scope="col" class="px-5 py-5  border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                        Detail
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($laporan_penjualan as $lp) : ?>
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-500  text-sm">
                            <?= $lp['name'] ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-500  text-sm">
                            <?= $lp['banyak_transaksi'] ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-500  text-sm">
                            <?= $lp['total_pemasukan'] ?>
                        </td>
                        <td class="px-5 py-5 border-b border-gray-500  text-sm">
                            <?= $lp['date'] ?>

                        </td>
                        <td class="px-5 py-5 border-b border-gray-500  text-sm">
                            <a href="<?= base_url('Lpenjualan/detail/') . $lp['date'] ?>"> detail</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Main modal -->
<div id="pModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Laporan Penjualan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="pModal">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>
            <form action="<?= base_url('Lpenjualan/simpanPenjualan') ?> " method="POST" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="p-6 space-y-6 w-11/12 mx-auto">
                    <div class="relative text-left z-0 w-full mb-6 group">
                        <input type="text" name="banyak_transaksi" id="banyak_transaksi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                        <label for="banyak_transkasi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Banyak Transaksi</label>
                    </div>
                    <div class="relative text-left z-0 w-full mb-6 group">
                        <input type="text" name="total_pemasukan" id="total_pemasukan" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                        <label for="total_pemasukan" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Total Pendapatan</label>
                    </div>
                    <div class="relative text-left z-0 w-full mb-6 group h-[7rem]">
                        <textarea name="deskripsi" id="deskripsi" class="block py-2.5 px-0 h-full w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required=""></textarea>
                        <label for="deskripsi" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Deskripsi</label>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="pModal" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-toggle="pModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </form>
        </div>
    </div>
</div>