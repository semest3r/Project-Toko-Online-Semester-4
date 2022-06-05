<div class="container border min-h-screen bg-gray-100">
    <div class="mx-auto max-w-full">
        <div class="pt-4 pb-8 grid grid-cols-10">
            <div class="col-span-10 col-start-1 row-start-1">
                <div class="flex flex-row mb-1 justify-between w-full">
                    <h2 class="text-4xl px-4 font-bold leading-tight">
                        Transaksi
                    </h2>
                    <div class="text-end">
                        <form action="<?= base_url('Transaksi'); ?>" method="POST" class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                            <input type="text" name="keyword" class="w-full px-2 mx-2 rounded-sm" placeholder="Search Here..." autocomplete="off" />
                            <input type="submit" name="submit" class="px-3 mx-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200 " />
                        </form>
                    </div>
                    <div class="mt-3">
                        <a href="<?= base_url('Transaksi/spreadsheet_export'); ?>" class="px-4 py-2 text-base font-semibold rounded-md bg-purple-400 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200">Download</a>
                    </div>
                </div>
            </div>
            <div class="col-span-10 col-start-1 row-span-1 mt-5 border-t-2 bg-white">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                    Pembeli
                                </th>
                                <th scope="col" class="px-5 py-3 border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                    Approver
                                </th>
                                <th scope="col" class="px-5 py-3 border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                    Date
                                </th>
                                <th scope="col" class="px-5 py-3 border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                    Status
                                </th>
                                <th scope="col" class="px-5 py-3 border-b-2 border-blue-500 text-gray-800 text-sm uppercase font-semibold">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi as $st) : ?>
                                <tr class="t">
                                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                        <div class="items-center px-2">
                                            <p class="text-center text-gray-900 whitespace-no-wrap">
                                                <?= $st['nama_pembeli'] ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <?= $st['nama_user'] ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <?= $st['date'] ?>
                                        </p>
                                    </td>
                                    <?php $color = '';
                                    if ($st['status'] == 1) {
                                        $color = "text-red-900";
                                    } elseif ($st['status'] == 2) {
                                        $color = "text-yellow-900";
                                    } elseif ($st['status'] == 3) {
                                        $color = "text-yellow-900";
                                    } else {
                                        $color = "text-green-900";
                                    } ?>
                                    <?php $bgcolor = '';
                                    if ($st['status'] == 1) {
                                        $bgcolor = "bg-red-200";
                                    } elseif ($st['status'] == 2) {
                                        $bgcolor = "bg-yellow-200";
                                    } elseif ($st['status'] == 3) {
                                        $bgcolor = "bg-yellow-200";
                                    } else {
                                        $bgcolor = "bg-green-200";
                                    } ?>
                                    <?php $confirmation = '';
                                    if ($st['status'] == 1) {
                                        $confirmation = "Belum Dikonfirmasi";
                                    } elseif ($st['status'] == 2) {
                                        $confirmation = "Proses";
                                    } elseif ($st['status'] == 3) {
                                        $confirmation = "Pengiriman";
                                    } else {
                                        $confirmation = "Selesai";
                                    } ?>
                                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight <?= $color ?>">
                                            <span aria-hidden="true" class="absolute inset-0 opacity-50 rounded-full <?= $bgcolor ?>">
                                            </span>
                                            <span class="relative">
                                                <?= $confirmation ?>
                                            </span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200  text-sm">
                                        <a href="<?= base_url('Edit_transaksi/index/') . $st['idtransaksi']; ?>" class="text-indigo-600 hover:text-indigo-900">
                                            Update
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="px-5  py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="pt-5 pb-2">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>