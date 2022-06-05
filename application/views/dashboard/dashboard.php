<div class="border h-screen bg-gray-100">
    <div class="grid grid-cols-4 justify-self-stretch grid-flow-row">
        <div class="col-span-4 flex flex-wrap w-10/12 mx-auto p-4 justify-between">
            <div class="flex border py-4 w-[15rem] rounded-md bg-white">
                <div class="text-primary my-auto">
                    <svg class="w-[4rem] h-[4rem] px-2 border-r-2 border-green-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <p class="font-semibold text-lg">Transaksi Sukses</p>
                    <div>
                        10
                    </div>
                </div>
            </div>
            <div class="flex border py-4 w-[15rem] rounded-md bg-white">
                <div class="text-primary my-auto px-2 border-r-2 border-sky-400">
                    <svg class="w-[3rem] h-[3rem]" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <p class="font-semibold text-lg">Total Pemasukan</p>
                    <div>
                        Rp. 10
                    </div>
                </div>
            </div>
            <div class="flex border py-4 w-[15rem] rounded-md bg-white">
                <div class="text-primary my-auto px-2 border-r-2 border-red-500">
                    <svg class="w-[3rem] h-[3rem]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div class="w-full">
                    <p class="font-semibold text-lg">Total Transaksi</p>
                    <div>
                        10
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-3 col-start-1 p-4 ml-5">
            <div class="shadow-lg rounded-lg bg-white overflow-hidden">
                <div class="py-3 px-5 bg-gray-200 font-bold">Toko Electrik Chart</div>
                <canvas class="p-10" id="chartBar"></canvas>
            </div>
        </div>
        <div class="col-start-4 justify-self-end p-4 w-full">
            <div class="bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex flex-col items-center pb-10 px-4 pt-4">
                    <img class="mb-3 w-24 h-24 rounded-full shadow-lg" src="<?= base_url('assets/img/default.jpg') ?>" alt="Profile" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $user['username'] ?></h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400"><?= $user['status_role'] ?></span>
                    <div class="flex mt-4 space-x-3 lg:mt-6">
                        <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Profile</a>
                        <a href="#" class="inline-flex items-center py-2 px-4 text-sm font-medium text-center text-gray-900 bg-white rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700">Message</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>