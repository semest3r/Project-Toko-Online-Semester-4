<aside class="w-64 min-h-screen" aria-label="Sidebar">
   <div class="overflow-y-auto py-4 px-3 min-h-full rounded-r rounded-b-none bg-gray-800">
      <ul class="space-y-2">
         <div class="mx-auto text-center py-5 text-white">
            <a href="<?= base_url('Dashboard'); ?>" class="flex items-center text-2xl font-bold p-1"><img src="<?= base_url('assets/img/g39243.png') ?>" alt="" class="w-[2.5rem]"><span class="p-1">ELECTRIK</span></a>
         </div>
         <li>
            <a href="<?= base_url('Dashboard'); ?>" class="flex items-center p-2 text-base font-normal  rounded-lg text-white  hover:bg-gray-700">
               <svg class="w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                  <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
               </svg>
               <span class="ml-3">Dashboard</span>
            </a>
         </li>
         <li>
            <button type="button" class="flex items-center p-2 w-full text-base font-normal rounded-lg transition duration-75 group text-white hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
               <svg class="flex-shrink-0 w-6 h-6 transition duration-75  text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path>
               </svg>
               <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Produk</span>
               <svg sidebar-toggle-item class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
               </svg>
            </button>
            <ul id="dropdown-example" class="hidden py-2 space-y-2">
               <li>
                  <a href="<?= base_url('Produk'); ?>" class="flex items-center p-2 pl-11 w-full text-base font-normal  rounded-lg transition duration-75 group text-white hover:bg-gray-700">Barang</a>
               </li>
               <li>
                  <a href="<?= base_url('Produk/Kategori') ?>" class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group text-white hover:bg-gray-700">Kategori</a>
               </li>
               <li>
                  <a href="<?= base_url('Produk/Kurir') ?>" class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group text-white hover:bg-gray-700">Kurir</a>
               </li>
            </ul>
         </li>
         <li>
            <a href="<?= base_url('Transaksi'); ?>" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
               <svg class="flex-shrink-0 w-6 h-6  transition duration-75 text-gray-400  group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path>
                  <path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Transaksi</span>
               <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium rounded-full bg-blue-900 text-blue-200"><?php $this->db->where('status', 1 ); $this->db->from('transaksi'); echo $this->db->count_all_results();?></span>
            </a>
         </li>
         <li>
            <a href="<?= base_url('Lpenjualan'); ?>" class="flex items-center p-2 text-base font-normal  rounded-lg text-white  hover:bg-gray-700">
               <svg class="flex-shrink-0 w-6 h-6 transition duration-75 text-gray-400 group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Laporan Penjualan</span>
            </a>
         </li>
         <?php if($this->load->session->userdata('jabatan') == '1') : ?>
         <li>
            <a href="<?=base_url('User') ?>" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-gray-700">
               <svg class="flex-shrink-0 w-6 h-6  transition duration-75 text-gray-400  group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
               </svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
         </li>
         <?php endif ?>
      </ul>
   </div>
</aside>