<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/output.css" type="text/css">
    <link href="img/favicon.ico" rel="icon">
    <title>Checkout</title>
</head>

<body>
    <div class="min-h-screen">
        <div class="h-[7rem]"></div>
        <div class="container">
            <div class="w-1/2 mx-auto p-5 border-2 rounded-md relative">
                <div class="text-center">
                    <?php if (validation_errors()) :  ?>
                        <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            <div>
                                <span class="font-medium"><?= validation_errors(); ?></span>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
                <div class="w-9 h-9 flex absolute -top-3 -left-3 bg-pink-200 rounded-full ">
                    <a class="text-red-700 hover:text-red-300" href="<?= base_url('Cart'); ?>"><span class="iconify w-9 h-9" data-icon="akar-icons:circle-x"></span></a>
                </div>
                <form action="<?= base_url('Checkout') ?>" method="post">
                    <div class="pt-5 relative z-0 w-full mb-6 group">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lengkap</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email </label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="alamat" id="alamat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="alamat" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Alamat Lengkap</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="notelp" id="notelp" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="notelp" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nomor Telepon</label>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <label for="id_kurir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Kurir</label>
                            <select name="id_kurir" id="id_kurir" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option></option>
                                <?php
                                foreach ($kurir as $k) { ?>
                                    <option value="<?= $k['id']; ?>"><?= $k['nama_kurir']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <input type="submit" name="placeOrder" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center "></input>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</body>

</html>