<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
$sql = "
    SELECT 'kantin' AS sumber, COUNT(*) AS total FROM kantin
    UNION ALL
    SELECT 'gedung' AS sumber, COUNT(*) AS total FROM gedung
    UNION ALL
    SELECT 'masjid' AS sumber, COUNT(*) AS total FROM masjid
    UNION ALL
    SELECT 'atm' AS sumber, COUNT(*) AS total FROM atm
    UNION ALL
    SELECT 'minimarket' AS sumber, COUNT(*) AS total FROM minimarket
    UNION ALL
    SELECT 'fotokopi' AS sumber, COUNT(*) AS total FROM fotokopi
    UNION ALL
    SELECT 'parkiran' AS sumber, COUNT(*) AS total FROM parkiran
    UNION ALL
    SELECT 'ruang' AS sumber, COUNT(*) AS total FROM ruang
    UNION ALL
    SELECT 'wifi' AS sumber, COUNT(*) AS total FROM wifi
";

$result = mysqli_query($conn, $sql);

$data = [];
$total = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $data[$row['sumber']] = $row['total'];
    $total += $row['total'];
}
?>

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

    <!--logo web-->
    <link rel="icon" type="image/ico" href="/KampEase/images/log2.png"/>
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto poppins">

    <div class="navbar bg-base-100 shadow-sm">
        <a href="javascript:history.back()"
            class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
        </a>
        <div class="flex-1 items-center justify-center text-center">
            <a class="btn btn-ghost text-xl">Daftar Tempat di KampEase</a>
        </div>
        <div class="flex gap-2">

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img
                            alt="Tailwind CSS Navbar component"
                            src="../images/log2.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stat -->
    <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-4 mt-16 sm:mt-10 mx-auto px-4">
        <!-- Stat 1 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Total Gedung</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['gedung'] ?></div>
            <div class="stat-desc text-gray-400">Gedung di Sekitar UIN SGD</div>
        </div>

        <!-- Stat 2 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Total Kantin</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['kantin'] ?></div>
            <div class="stat-desc text-gray-400">Kantin di Sekitar UIN SGD</div>
        </div>

        <!-- Stat 3 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Masjid</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['kantin'] ?></div>
            <div class="stat-desc text-gray-400">Masjid di Sekitar UIN SGD</div>
        </div>

        <!-- Stat 4 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Ruang Kelas</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['ruang'] * 11 ?></div>
            <div class="stat-desc text-gray-400">Total Ruangan di UIN SGD</div>
        </div>

        <!-- Stat 5 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">ATM</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['atm'] ?></div>
            <div class="stat-desc text-gray-400">ATM di Sekitar UIN SGD</div>
        </div>

        <!-- Stat 6 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Mini Market</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['minimarket'] ?></div>
            <div class="stat-desc text-gray-400">Mini Market disekitar UIN SGD</div>
        </div>

           <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Masjid</div>
            <div class="stat-value text-[#7C3AED]"><?=$data['masjid'] ?></div>
            <div class="stat-desc text-gray-400">Total Masjid di Sekitar UIN SGD</div>
        </div>
        <!-- Stat 7 -->
        <div class="stat bg-white rounded-xl shadow-md text-center">
            <div class="stat-title text-gray-500">Total Tempat</div>
            <div class="stat-value text-[#7C3AED]"><?=$total+($data['ruang']*11)?></div>
            <div class="stat-desc text-gray-400">Total Tempat di KampEase</div>
            <div class="stat-desc text-gray-400">Terus Update</div>
        </div>
        
        <!-- Stat 8 -->
     
    </div>
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 mx-auto px-4 mt-10">
        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/gedung3d.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/gedung3d.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Gedung
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="pageGedung.php"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/wifi.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/wifi.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Wifi
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="../php/wifi.php"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/parkings.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/parkings.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="../php/areaParkir.php">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Area Parkir
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="../php/areaParkir.phpa"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>
        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/market.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/market.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Mini Market
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="#"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/kantin.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/kantin.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Kantin
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="#"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/mushalla.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/mushalla.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Mushalla
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="#"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/perpustakaan.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/perpustakaan.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Perpustakaan
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="#"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

        <article class="flex flex-col sm:flex-row transition hover:shadow-xl rounded-2xl bg-[url('../images/potocopy.png')] sm:bg-contain bg-cover sm:bg-white">
            <!-- Gambar hanya tampil di desktop -->
            <div class="hidden sm:block sm:basis-56">
                <img
                    alt="Gedung"
                    src="../images/potocopy.png"
                    class="aspect-square h-full w-full object-cover rounded-l-2xl" />
            </div>

            <!-- Konten -->
            <div class="flex flex-1 flex-col justify-between bg-white/70 sm:bg-white sm:rounded-none rounded-2xl sm:rounded-r-2xl">
                <div class="border-l border-gray-900/10 p-4 sm:p-6">
                    <a href="#">
                        <h3 class="font-bold text-gray-900 uppercase">
                            Photo Copy
                        </h3>
                    </a>

                    <p class="mt-2 line-clamp-3 text-sm text-gray-700">
                        Gedung ini merupakan salah satu fasilitas utama kampus dengan desain modern, dilengkapi ruang belajar dan laboratorium.
                    </p>
                </div>

                <div class="sm:flex sm:items-end sm:justify-end px-4 pb-4 sm:pb-6">
                    <a
                        href="#"
                        class="inline-block bg-yellow-300 px-5 py-3 text-center text-xs font-bold text-gray-900 transition hover:bg-yellow-400 rounded-lg">
                        Telusuri Gedung
                    </a>
                </div>
            </div>
        </article>

    </div>



    <!-- STAT -->
    <script src="../js/maps.js"></script>

    <br>
    <br>
    <br>



</body>

</html>