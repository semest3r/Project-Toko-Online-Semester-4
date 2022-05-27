        <div class="h-screen p-5 w-11/12 mx-auto ">
            <div class="grid grid-cols-2 shadow-xl rounded-xl bg-white dark:bg-slate-800">
                <div class="bg-slate-100 dark:bg-gray-800 shadow-lg shadow-gray-900 rounded-lg p-5">
                    <form action="<?= base_url('Edit_produk'); ?>" method="post" enctype="multipart/form-data">
                        <?php foreach ($barang as $b) : ?>
                            <div class="relative text-left z-0 w-full mb-6 group">

                                <input type="hidden" name="id" id="id" value="<?= $b['id']; ?>">

                                <input type="text" name="nama_barang" id="nama_barang" value="<?= $b['nama_barang']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="nama_barang" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Produk</label>
                            </div>
                            <div class="relative text-left z-0 w-full mb-6 group">
                                <input type="text" name="harga" id="harga" value="<?= $b['harga']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="harga" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Harga</label>
                            </div>
                            <div class="relative text-left z-0 w-full mb-6 group">
                                <input type="text" name="stock" id="stock" value="<?= $b['stock']; ?>" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                                <label for="stock" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stock</label>
                            </div>
                            <div class="py-5">
                                <input type="file" class="" id="image" name="image">
                            </div>

                            <div class="px-5 pb-5">
                                <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="" selected="selected"><?= $b['nama_kategori']; ?></option>
                                    <?php
                                    foreach ($kategori as $k) { ?>
                                        <option value="<?= $k['id']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
                <div class="mx-auto my-auto">
                    <img class="rounded-md object-cover h-[20rem] w-[20rem]" src="<?= base_url('assets/img/upload/') . $b['image'] ?>" alt="..." />
                </div>
            <?php endforeach ?>
            </div>
        </div>