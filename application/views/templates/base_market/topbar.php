<div class="container">

    <div class="grid grid-cols-3 h-20">
        <div class="col-span-2 self-center w-full">
            <div class="p-2">
                <form action="" class="flex">
                    <input type="text" class="mx-2 ml-10 rounded-md w-[80%]" placeholder="Search Here">
                    <button class="border px-2 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
        <div class="flex justify-end p-3 my-auto ">
            <a href="<?= base_url('Cart')?>" class="py-1 px-3 border-2 hover:border-sky-500 hover:scale-110 bg-gray-100 flex w-fit ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                <span class=" text-lg font-bold"><?php echo $this->cart->format_number($this->cart->total_items()); ?></span>
            </a>
        </div>
    </div>
    <hr>