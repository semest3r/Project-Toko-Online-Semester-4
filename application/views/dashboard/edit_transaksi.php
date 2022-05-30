        <div class="h-full p-5 w-11/12 mx-auto ">
            <div class="grid grid-cols-2 shadow-xl rounded-xl bg-white dark:bg-slate-800">
                <div class="bg-slate-100 dark:bg-gray-800 shadow-lg shadow-gray-900 rounded-lg p-5">
                    <?php foreach($transaksi as $tr) :?>
                    <form action="<?= base_url('Edit_transaksi')?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="idtransaksi" id="idtransaksi" value="<?= $tr['idtransaksi']; ?>">
                        <div class="relative text-left z-0 w-full mb-6 group">
                            <input type="text" name="nama_pembeli" id="nama_pembeli" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" value="<?= $tr['nama_pembeli']; ?>">
                            <label for="nama_pembeli" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First name</label>
                        </div>
                        <div class="grid xl:grid-cols-2 xl:gap-6">
                            <div class="relative text-left z-0 w-full mb-6 group">
                                <input type="tel" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="" id="floating_phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " disabled value="<?= $tr['notelp_pembeli']; ?>">
                                <label for="floating_phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone number</label>
                            </div>
                            <div class="relative text-left z-0 w-full mb-6 group">
                                <input type="text" name="" id="floating_company" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" disabled value="<?= $tr['date'] ?>">
                                <label for="floating_company" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Tanggal Pembelian</label>
                            </div>
                        </div>
                        <div class="relative text-left z-0 w-full mb-6 group">
                            <input type="email" name="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?= $tr['email_pembeli'];?> ">
                            <label for="floating_email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email</label>
                        </div>
                        <div class="relative text-left z-0 w-full mb-6 group">
                            <input type="text" name="" id="alamat_pembeli" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " value="<?= $tr['alamat_pembeli'];?>" disabled>
                            <label for="alamat_pembeli" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat</label>
                        </div>
                        <div class="relative text-left z-0 w-full mb-6 group">
                            <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your message</label>
                            <textarea id="message" name="pesan" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                        </div>
                        <div class="px-5 pb-5">
                            <select id="countries" name="user" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <?php foreach($user as $u): ?>
                                <option value="<?= $u['id'] ?>"><?= $u['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="px-5 pb-5">
                            <select id="countries" name="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="1">Belum Dikonfirmasi</option>
                                <option value="2">Proses</option>
                                <option value="3">Pengiriman</option>
                                <option value="4">Selesai</option>
                            </select>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                    <?php endforeach ?>
                </div>
                <div class="p-3">
                    <?php foreach ($checkout as $cc) : ?>
                        <div class="pb-4">
                            <div class="flex max-w-md mx-auto overflow-hidden bg-white rounded-lg shadow-lg shadow-gray-900 dark:bg-gray-800">
                                <!-- <div class="w-1/3 bg-cover" style="background-image: url()"></div> -->
                                <img class="w-1/3" src="<?= base_url('assets/img/upload/'). $cc['image']?>" alt="">
                                <div class="w-2/3 p-4 md:p-4">
                                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white"><?= $cc['nama_barang'] ?></h1>
                                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit In odit</p>
                                    <div class="flex justify-between mt-3 item-center">
                                        <h1 class="text-base font-bold text-gray-700 dark:text-gray-100 md:text-lg"><?= $cc['harga'] ?></h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
        </div>
        </div>