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
                <?php if (validation_errors()) :  ?>
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium"> <?= validation_errors(); ?></span>
                    </div>
                <?php endif ?>
                <form action="<?= base_url('Konfirmasi') ?>" method="post">
                    <div class="pt-5 relative z-0 w-full mb-6 group">
                        <input type="hidden" name="status_konfirmasi" id="status_transaksi" value="1">
                        <div class="relative z-0 w-full mb-6 group">
                            <input type="text" name="id_transaksi" id="id_transaksi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                            <label for="name" class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID Transaksi</label>
                        </div>
                        <div class="py-5">
                            <input type="file" class="" id="image" name="image">
                        </div>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</body>

</html>