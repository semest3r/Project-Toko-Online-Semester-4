<aside class="w-64 min-h-screen border" aria-label="Sidebar">
    <div class="overflow-y-auto py-4 px-3 min-h-full bg-gradient-to-b from-slate-50 to-violet-400 border-r border-violet-600">
        <ul class="space-y-2">
            <div class="mx-auto text-center py-5 text-gray-700 border-b-2 border-sky-500">
                <a href="<?= base_url('Market'); ?>" class="flex items-center text-2xl font-bold p-1"><img src="<?= base_url('assets/img/g39243.png') ?>" alt="" class="w-[2.5rem]"><span class="p-1">ELECTRIK</span></a>
            </div>
            <li class="">
                <a href="<?= base_url('Market_produk'); ?>" class="flex items-center p-2 text-base font-semibold   text-gray-800  hover:bg-gray-300">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    <span class="ml-3">All Product</span>
                </a>
            </li>
            <li>
                <button type="button" class="flex items-center p-2 w-full text-base font-normal transition duration-75 group text-gray-700 hover:bg-gray-200" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="flex-1 ml-3 test-base font-semibold text-left whitespace-nowrap" sidebar-toggle-item>Category</span>
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2">
                    <?php foreach ($kategori as $k) { ?>
                        <li>
                            <a href="<?= base_url('Market_produk/kategori/index/') . $k['id'] ?>" class="flex border-b text-sm border-slate-300 items-center pl-11 w-full font-normal transition duration-75 group text-gray-600 hover:text-gray-900 hover:bg-gray-300"><?= $k['nama_kategori'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </li>
            <li class="border-b border-slate-400">
                <a href="#" class="flex items-center p-2 text-base font-semibold  text-gray-800  hover:bg-gray-300">
                    <span class="ml-3">About Us</span>
                </a>
            </li>
        </ul>
    </div>
</aside>