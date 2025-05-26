<!DOCTYPE html>
<html lang="en" class="bg-[#F3F4F6]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KampEase</title>

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

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/hover.css">
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto px-4">
    <!-- Keterangan Icon -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full max-w-7xl px-4 py-8">
        <!-- Baris 1 -->
        <div>
            <ol class="grid grid-cols-3 sm:grid-cols-3 overflow-hidden rounded-xl border border-gray-200 bg-white text-sm text-[#1F2937] shadow-sm">
                <li class="flex flex-col items-center justify-center gap-2 p-5">
                    <i class="fi fi-ss-building text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Gedung</strong>
                </li>
                <li class="flex flex-col items-center justify-center gap-2 p-5 bg-[#F3EBFF]">
                    <i class="fi fi-sc-wifi text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Wi-Fi</strong>
                </li>
                <li class="flex flex-col items-center justify-center gap-2 p-5">
                    <i class="fi fi-sr-mosque text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Mushalla</strong>
                </li>
            </ol>
        </div>

        <!-- Baris 2 -->
        <div>
            <ol class="grid grid-cols-3 sm:grid-cols-3 overflow-hidden rounded-xl border border-gray-200 bg-white text-sm text-[#1F2937] shadow-sm">
                <li class="flex flex-col items-center justify-center gap-2 p-5">
                    <i class="fi fi-sr-restaurant text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Kantin</strong>
                </li>
                <li class="flex flex-col items-center justify-center gap-2 p-5 bg-[#F3EBFF]">
                    <i class="fi fi-sr-shop text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Mini Market</strong>
                </li>
                <li class="flex flex-col items-center justify-center gap-2 p-5">
                    <i class="fi fi-ss-book-alt text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Perpustakaan</strong>
                </li>
            </ol>
        </div>

        <!-- Baris 3 -->
        <div>
            <ol class="grid grid-cols-3 sm:grid-cols-3 overflow-hidden rounded-xl border border-gray-200 bg-white text-sm text-[#1F2937] shadow-sm">
                <li class="flex flex-col items-center justify-center gap-2 p-5">
                    <i class="fi fi-rs-document text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Photo Copy</strong>
                </li>
                <!-- Tambahan jika ingin genap -->
                <li class="flex flex-col items-center justify-center gap-2 p-5 bg-[#F3EBFF]">
                    <i class="fi fi-ss-marker text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Tanda Lokasi</strong>
                </li>
                <li class="flex flex-col items-center justify-center gap-2 p-5">
                    <i class="fi fi-ss-question-square text-2xl text-[#7C3AED]"></i>
                    <strong class="font-medium">Lainnya</strong>
                </li>
            </ol>
        </div>
    </div>
    <!-- Keterangan END -->
    <!-- MAPS & DESKRIPSI -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
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


    <!-- MAPS & DESK END -->

    <!-- FIXED MENU -->
    <div class="z-30 dock text-[#1F2937]-content bg-[#DDD6FE]/70 rounded-tr-[90px] rounded-tl-[90px] sm:w-[400px] w-[388px] flex justify-center justify-self-center poppins-regular">
        <a href="/kampEase/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg>
            <span class="dock-label">Home</span>
        </a>

        <a href="php/maps.php" class="dock-active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>
            <span class="dock-label">Maps</span>
        </a>

        <a href="/kampEase/php/profile.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
            <span class="dock-label">Profile</span>
        </a>
    </div>
    <!-- FIXED END -->
    <br>
    <br>
    <br>
    <script src="../js/maps.js"></script>



</body>

</html>