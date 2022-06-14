<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/output.css" type="text/css">
    <link href="img/favicon.ico" rel="icon">

    <title>Admin Login</title>
</head>

<body>
    <div class="container mx-auto">
        <div class="grid justify-self-stretch">
            <div class="h-[6rem]"></div>
            <div class="w-1/2 pt-10 justify-self-center border border-slate-500 p-5 rounded-md">
                <form action="<?= base_url('Login') ?>" method="POST" class="w-3/4 mx-auto">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="mb-6 pt-5">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Your Username</label>
                        <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Username" required="">
                        <?= form_error('username', '<small class="text-sm pl-3">', '</small>'); ?>
                    </div>
                    <div class="mb-6">
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Your password</label>
                        <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Password" required="">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <button type="submit" class="mb-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>