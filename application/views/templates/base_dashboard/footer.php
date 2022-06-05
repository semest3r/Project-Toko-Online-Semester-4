            <div class="self-end w-full bg-gray-600 h-8 ">
                <p class="block mt-2 text-sm text-gray-200 dark:text-gray-400">
                    © 2022 Toko Electrik™. All Rights Reserved.
                </p>
            </div>
            </div>
            </div>
            <!-- script untuk flowbite -->
            <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
            <!-- script untuk Timer Alert-->
            <script>
                $('.alert-message').alert().delay(3000).slideUp('slow');
            </script>
            <!-- script untuk Taulwind-Elements Chart-->
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const labelsBarChart = [
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December",
                ];
                const dataBarChart = {
                    labels: labelsBarChart,
                    datasets: [{
                        label: "Monthly Transaction",
                        backgroundColor: "hsl(252, 82.9%, 67.8%)",
                        borderColor: "hsl(252, 82.9%, 67.8%)",
                        data: [<?php foreach($bulan as $b){ echo $b['banyak_transaksi'].',';}?>],
                    }, ],
                };

                const configBarChart = {
                    type: "bar",
                    data: dataBarChart,
                    options: {},
                };

                var chartBar = new Chart(
                    document.getElementById("chartBar"),
                    configBarChart
                );
            </script>
            </body>


            </html>