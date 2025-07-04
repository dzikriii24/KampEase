<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");

$Lantai1 = "SELECT * FROM ruang WHERE lantai = 1";
$result1 = $conn->query($Lantai1);

$Lantai2 = "SELECT * FROM ruang WHERE lantai = 2";
$result2 = $conn->query($Lantai2);

$Lantai3 = "SELECT * FROM ruang WHERE lantai = 3";
$result3 = $conn->query($Lantai3);

$Lantai4 = "SELECT * FROM ruang WHERE lantai = 4";
$result4 = $conn->query($Lantai4);
?>


<!DOCTYPE html>
<html lang="en" class="bg-[#F3F4F6]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gedung UIN SGD</title>

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.scrollTo(0, 0);
    </script>

    <!-- Flaticon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-chubby/css/uicons-regular-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/hover.css">

    <!--logo web-->
    <link rel="icon" type="image/ico" href="/KampEase/images/log2.png" />
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto">
    <!-- Tombol Back di pojok kiri atas -->
    <a href="javascript:history.back()"
        class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
    </a>

    <!-- Header -->
    <section
        class="overflow-hidden text-center items-center flex justify-center w-full bg-[#1F2937] bg-cover bg-no-repeat bg-center pt-5">
        <div class="p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-2xl font-bold text-white sm:text-3xl md:text-5xl">Fakultas Sains dan Teknologi</h2>

                <p class="hidden max-w-lg text-white/90 md:mt-6 md:block md:text-lg md:leading-relaxed">
                    Gedung ini merupakan pusat kegiatan akademik untuk program studi di bidang sains dan teknologi, seperti Biologi, Kimia, Fisika, Matematika, dan Teknik Informatika. Dilengkapi dengan laboratorium dan ruang kuliah modern.
                </p>

                <div class="mt-4 sm:mt-8">
                    <a
                        href="https://fst.uinsgd.ac.id/"
                        target="_blank"
                        class="inline-block rounded-full bg-indigo-600 px-12 py-3 text-sm font-medium text-white transition hover:bg-indigo-700 focus:ring-3 focus:ring-yellow-400 focus:outline-hidden">
                        Lihat Website Fakultas
                    </a>
                </div>
            </div>
        </div>
    </section>
    <label class="mt-10 poppins-regular bg-[#FFFFFF] aret-[#1F2937] text-[#1F2937] input items-center -mt-5 flex justify-self-center outline-none rounded-xl hover:outline-hidden focus:outline-hidden lg:w-[500px]" style="outline:none;">
        <input type="search" name="q" required placeholder="Cari Ruang di Gedung FST" class="poppins-reguler caret-[#1F2937] text-[#1F2937] bg-[#1F2937 ] outline-none lg:p-4 rounded-lg" style="outline:none;" id="searchInput" onkeyup="searchGedung()" />
        <button class="hover:text-[#7C3AED] transition-colors duration-300 cursor-pointer" type="submit">
            <svg class="h-[1em] opacity-70" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <g
                    stroke-linejoin="round"
                    stroke-linecap="round"
                    stroke-width="2.5"
                    fill="none"
                    stroke="currentColor">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </g>
            </svg>
        </button>

    </label>
    <!-- Header End -->

    <!-- List Ruangan -->

    <div class="mt-8 w-full max-w-full px-4">
        <div class="bg-base-100 shadow-md rounded-xl mt-2">
           

            <!-- Header -->
            <div class="bg-base-100 shadow-md rounded-xl">
            

                <!-- Header -->
                <label class="btn btn-ghost text-xl text-left w-full rounded-t-xl">
                    Lantai 1 FST
                </label>

                <!-- Isi Dropdown -->
                <div class="list bg-base-100 px-4 pb-4 rounded-b-xl" id="gedungTable">
                    <?php while ($row = $result1->fetch_assoc()): ?>
                        <li class="list-row">
                            <i class="<?= htmlspecialchars($row['path']) ?>"></i>
                            <div>
                                <div class="nama_gedung"><?= htmlspecialchars($row['nama_ruang']) ?></div>
                                <div class="text-xs font-semibold opacity-60">
                                    <?= htmlspecialchars($row['deskripsi']) ?>
                                </div>
                                <div class="text-xs font-regular opacity-60">
                                    <?= htmlspecialchars($row['detail_tempat']) ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="bg-base-100 shadow-md rounded-xl mt-2">
            <input type="checkbox" class="peer hidden" id="" />

            <!-- Header -->
            <div class="bg-base-100 shadow-md rounded-xl">
                <input type="checkbox" class="peer hidden" id="" />

                <!-- Header -->
                <label for="" class=" btn btn-ghost text-xl text-left w-full rounded-t-xl">
                    Lantai 2 FST
                </label>

                <!-- Isi Dropdown -->
                <div class="list bg-base-100 px-4 pb-4 rounded-b-xl" id="gedungTable">
                    <?php while ($row = $result2->fetch_assoc()): ?>
                        <li class="list-row">
                            <i class="<?= htmlspecialchars($row['path']) ?>"></i>
                            <div>
                                <div class="nama_gedung"><?= htmlspecialchars($row['nama_ruang']) ?></div>
                                <div class="text-xs font-semibold opacity-60">
                                    <?= htmlspecialchars($row['deskripsi']) ?>
                                </div>
                                <div class="text-xs font-regular opacity-60">
                                    <?= htmlspecialchars($row['detail_tempat']) ?>
                                </div>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="bg-base-100 shadow-md rounded-xl mt-2">
            <input type="checkbox" class="peer hidden" id="" />

            <!-- Header -->
            <div class="bg-base-100 shadow-md rounded-xl">
                <input type="checkbox" class="peer hidden" id="" />

                <!-- Header -->
                <label for="" class="btn btn-ghost text-xl text-left w-full rounded-t-xl">
                    Lantai 3 FST
                </label>

                <!-- Isi Dropdown -->
                <div class="list bg-base-100 px-4 pb-4 rounded-b-xl" id="gedungTable">
                    <?php while ($row = $result3->fetch_assoc()): ?>
                        <li class="list-row">
                            <i class="<?= htmlspecialchars($row['path']) ?>"></i>
                            <div>
                                <div class="nama_gedung"><?= htmlspecialchars($row['nama_ruang']) ?></div>
                                <div class="text-xs font-semibold opacity-60">
                                    <?= htmlspecialchars($row['deskripsi']) ?>
                                </div>
                                <div class="text-xs font-regular opacity-60">
                                    <?= htmlspecialchars($row['detail_tempat']) ?>
                                </div>
                            </div>

                        </li>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <div class="bg-base-100 shadow-md rounded-xl mt-2">
            <input type="checkbox" class="peer hidden" id="" />

            <!-- Header -->
            <div class=" bg-base-100 shadow-md rounded-xl">
                <input type="checkbox" class="peer hidden" id="" />

                <!-- Header -->
                <label for="" class=" btn btn-ghost text-xl text-left w-full rounded-t-xl">
                    Lantai 4 FST
                </label>
                <!-- Isi Dropdown -->
                <div class="list bg-base-100 px-4 pb-4 rounded-b-xl" id="gedungTable">
                    <?php while ($row = $result4->fetch_assoc()): ?>
                        <li class="list-row">
                            <i class="<?= htmlspecialchars($row['path']) ?>"></i>
                            <div>
                                <div class="nama_gedung"><?= htmlspecialchars($row['nama_ruang']) ?></div>
                                <div class="text-xs font-semibold opacity-60 nama_gedung">
                                    <?= htmlspecialchars($row['deskripsi']) ?>
                                </div>
                                <div class="text-xs font-regular opacity-60">
                                    <?= htmlspecialchars($row['detail_tempat']) ?>
                                </div>
                            </div>

                        </li>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </div>
    <div class="mt-8 w-full max-w-full px-4">
<<<<<<< HEAD
        <div class="collapse bg-base-100 shadow-md rounded-xl">
            <input type="checkbox" class="peer hidden" id="collapse-fst4" />

            <!-- Header -->
            <label for="collapse-fst4" class="collapse-title btn btn-ghost text-xl text-left w-full rounded-t-xl">
                Lantai 4 FST
            </label>

            <!-- Isi Dropdown -->
            <div class="collapse-content list bg-base-100 px-4 pb-4 rounded-b-xl">

                <li class="list-row">
                    <i class="fi fi-br-restroom-simple text-4xl"></i>
                    <div>
                        <div>Kelas A </div>
                        <div class="text-xs font-semibold opacity-60">Ujung Kanan Lantai 1</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                            </g>
                        </svg>
                    </button>
                </li>

                <li class="list-row">
                    <i class="fi fi-rr-mosque-moon text-4xl"></i>
                    <div>
                        <div>Musholla</div>
                        <div class="text-xs font-semibold opacity-60">Ujung Kanan Lantai 1</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                            </g>
                        </svg>
                    </button>
                </li>

                <li class="list-row">
                    <i class="fi fi-rc-books text-4xl"></i>
                    <div>
                        <div>R 4.01</div>
                        <div class="text-xs font-semibold opacity-60">Perpustakaan Fakultas Sains & Teknologi</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        <svg class="size-[1.2em]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <g stroke-linejoin="round" stroke-linecap="round" stroke-width="2" fill="none" stroke="currentColor">
                                <path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"></path>
                            </g>
                        </svg>
                    </button>
                </li>
=======
>>>>>>> a6930a1 (update page & finishing)


    </div>
    <script src="../js/mapsGedung.js"></script>
    <script>
        function searchGedung() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#gedungTable li");

            rows.forEach(function(row) {
                let namaEl = row.querySelector(".nama_gedung");
                if (!namaEl) return; // skip kalau tidak ada

                let nama = namaEl.textContent.toLowerCase();    

                if (nama.includes(input)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    </script>


</body>

</html>