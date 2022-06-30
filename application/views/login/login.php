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
                <div class="w-3/4 mx-auto">
                    <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <svg class="inline flex-shrink-0 mr-3 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>

                        <span class="font-medium timing w-full"><?= $this->session->flashdata('pesan'); ?></span>
                        <button class="bg-transparent text-2xl font-semibold leading-none outline-none focus:outline-none" onclick="closeAlert(event)">
                            <span>×</span>
                        </button>
                    </div>
                    <form action="<?= base_url('Login') ?>" method="POST" class="">
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
    </div>
    <script>
        function closeAlert(event) {
            let element = event.target;
            while (element.nodeName !== "BUTTON") {
                element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
    <!-- 
    <script>
        $('.alert-message').alert().delay(3000).slideUp('slow');
    </script>
     -->
</body>

</html>