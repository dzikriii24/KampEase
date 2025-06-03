<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");

$sql = "SELECT * FROM gedung";
$result = $conn->query($sql);
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

    <!--logo web-->
    <link rel="icon" type="image/ico" href="/KampEase/images/log2.png" />

    <!-- Flaticon -->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-chubby/css/uicons-solid-chubby.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/3.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/hover.css">
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto px-4 overflow-x-hidden">
    <!-- Tombol Back di pojok kiri atas -->
    <a href="javascript:history.back()"
        class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
    </a>

    <!-- Header -->
    <div>
        <section class="lg:grid lg:h-screen lg:place-content-center sm:bg-white">
            <div
                class="mx-auto w-screen max-w-screen-xl px-4 py-16 sm:px-6 sm:py-24 md:grid md:grid-cols-2 md:items-center md:gap-4 lg:px-8 lg:py-32">
                <div class="max-w-prose text-left bg-white/70 sm:bg-white">
                    <h1 class="text-4xl font-bold text-gray-900 sm:text-5xl">
                        Temukan
                        <strong class="text-indigo-600"> Gedung </strong>
                        yang anda cari disini!
                    </h1>

                    <p class="mt-4 text-base text-pretty text-gray-700 sm:text-lg/relaxed">
                        Temukan lokasi gedung yang anda cari dengan mudah dan cepat. Dengan menggunakan
                        teknologi peta terkini, anda dapat menemukan lokasi gedung yang anda inginkan
                        hanya dengan beberapa klik saja. Kami menyediakan informasi lengkap tentang
                        gedung-gedung yang ada di sekitar anda.
                    </p>

                    <div class="mt-4 flex gap-4 sm:mt-6">
                        <a
                            class="inline-block rounded border border-indigo-600 bg-indigo-600 px-5 py-3 font-medium text-white shadow-sm transition-colors hover:bg-indigo-700"
                            href="#">
                            Mulai Cari
                        </a>
                    </div>
                </div>
                <img src="../images/gedung3d.png" alt="" class="absolute top-10 -z-1 sm:z-0 sm:top-0 sm:relative">
            </div>
        </section>
    </div>
    <!-- Header End -->

    <!-- Maps -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full mt-10">
        <!-- MAP (2 kolom dari 3) -->
        <div class="relative z-10 md:col-span-2">
            <!-- Overlay untuk mengunci interaksi -->
            <div id="map-lock"
                class="absolute inset-0 z-10 cursor-pointer bg-transparent"
                onclick="unlockMap()"
                title="Klik untuk aktifkan peta">
            </div>

            <!-- Map -->
            <div id="map" class="h-[500px] w-full rounded-xl"></div>
        </div>

        <!-- DETAIL (1 kolom) -->
        <div class="w-full">
            <div id="info-panel" class="bg-white shadow-md rounded-xl p-4">
                <h2 class="poppins-bold text-2xl text-[#1F2937] md:text-3xl mb-2">
                    Detail Tempat
                </h2>
                <div id="info" class="text-[#4B5563]">
                    <!-- Detail lokasi akan muncul di sini -->
                </div>
            </div>
        </div>
    </div>
    <!-- Maps End -->

    <label class="mt-10 poppins-regular bg-[#FFFFFF] aret-[#1F2937] text-[#1F2937] input items-center -mt-5 flex justify-self-center outline-none rounded-xl hover:outline-hidden focus:outline-hidden lg:w-[500px]" style="outline:none;">
        <input type="search" name="q" required placeholder="Cari Tempat di Sekitar Kampus" class="poppins-reguler caret-[#1F2937] text-[#1F2937] bg-[#1F2937 ] outline-none lg:p-4 rounded-lg" style="outline:none;" id="searchInput" onkeyup="searchGedung()" />
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
    <!-- Ket Gedung -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 w-full mt-20" id="gedungTable">
        <?php while ($row = $result->fetch_assoc()): ?>
            <article class="overflow-hidden rounded-lg border border-gray-100 bg-white shadow-sm transition hover:shadow-md" id="gedungTable">
                <img
                    alt="<?= htmlspecialchars($row['nama_gedung']) ?>"
                    src="<?= htmlspecialchars($row['foto']) ?>"
                    class="h-56 w-full object-cover" />

                <div class="p-4 sm:p-6">
                    <a href="gedungPage.php?id=<?= $row['id'] ?>">
                        <h3 class="text-lg font-medium text-gray-900 hover:underline nama_gedung">
                            <?= htmlspecialchars($row['nama_gedung']) ?>
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-500">
                        <?= htmlspecialchars(substr($row['deskripsi'], 0, 150)) ?>...
                    </p>

                    <a href="<?= $row['link_detail'] ?>" class="group mt-4 inline-flex items-center gap-1 text-sm font-medium text-blue-600 hover:text-blue-800">
                        Lihat Detail Gedung
                        <span aria-hidden="true" class="transition-transform group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>
            </article>
        <?php endwhile; ?>
    </div>

    <script>
        function searchGedung() {
            let input = document.getElementById("searchInput").value.toLowerCase();
            let rows = document.querySelectorAll("#gedungTable article");

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

    <!-- Ket gedung end -->


    <script src="../js/mapsGedung.js"></script>

    <script src="../js/other.js"></script>


</body>

</html>