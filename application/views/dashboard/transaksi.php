<div class="container border min-h-screen">
    <div class="mx-auto px-4 sm:px-8 max-w-full">
        <div class="py-8">
            <div class="flex flex-row mb-1 sm:mb-0 justify-between w-full">
                <h2 class="text-2xl leading-tight">
                    Users
                </h2>
                <div class="text-end">
                    <form action="<?= base_url('Transaksi'); ?>" method="POST" class="flex flex-col md:flex-row w-3/4 md:w-full max-w-sm md:space-x-3 space-y-3 md:space-y-0 justify-center">
                        <div class="relative">
                            <input type="text" name="keyword" class=" rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent" placeholder="Search Here..." autocomplete="off" />
                        </div>
                        <input type="submit" name="submit" class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-purple-600 rounded-lg shadow-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 focus:ring-offset-purple-200" />
                    </form>
                </div>
            </div>
            <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                    <table class="min-w-full leading-normal">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Pembeli
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Approver
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Date
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Status
                                </th>
                                <th scope="col" class="px-5 py-3 bg-white  border-b border-gray-200 text-gray-800 text-sm uppercase font-semibold">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi as $st) : ?>
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="items-center">
                                            <div class="px-2">
                                                <p class="text-left text-gray-900 whitespace-no-wrap">
                                                    <?= $st['nama_pembeli'] ?>
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            <?= $st['nama_user'] ?>
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            12/09/2020
                                        </p>
                                    </td>
                                    <?php $color = '';
                                    if($st['status'] == 1 ){$color = "text-red-900";}
                                        elseif($st['status'] == 2 ){$color = "text-yellow-900";}
                                        elseif($st['status'] == 3 ){$color = "text-yellow-900";}
                                        else{$color = "text-green-900";}?>
                                    <?php $bgcolor = '';
                                    if($st['status'] == 1 ){$bgcolor = "bg-red-200";}
                                        elseif($st['status'] == 2 ){$bgcolor = "bg-yellow-200";}
                                        elseif($st['status'] == 3 ){$bgcolor = "bg-yellow-200";}
                                        else{$bgcolor = "bg-green-200";}?>                                   
                                    <?php $confirmation = '';
                                    if($st['status'] == 1){$confirmation = "Belum Dikonfirmasi";}
                                    elseif ($st['status'] == 2 ){$confirmation ="Proses";}
                                    elseif ($st['status'] == 3 ){$confirmation ="Pengiriman";}
                                    else{$confirmation ="Selesai";}?>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span class="relative inline-block px-3 py-1 font-semibold leading-tight <?= $color ?>">
                                            <span aria-hidden="true" class="absolute inset-0 opacity-50 rounded-full <?= $bgcolor ?>">
                                            </span>
                                            <span class="relative">
                                                <?= $confirmation?>
                                            </span>
                                        </span>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="<?= base_url('Edit_transaksi/index/'). $st['idtransaksi']; ?>" class="text-indigo-600 hover:text-indigo-900">
                                            Update
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                    <div class="px-5 bg-white py-5 flex flex-col xs:flex-row items-center xs:justify-between">
                        <div class="pt-5 pb-2">
                            <?= $this->pagination->create_links(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>