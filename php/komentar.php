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


<body class="min-h-screen flex flex-col items-center justify-start mx-auto">
    <div class="navbar bg-base-100 shadow-sm">
        <div class="navbar-start">
            
        </div>
        <div class="navbar-center">
            <a class="btn btn-ghost text-xl">daisyUI</a>
        </div>
        <div class="navbar-end">
            <button class="btn btn-ghost btn-circle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
            <button class="btn btn-ghost btn-circle">
                <div class="indicator">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="badge badge-xs badge-primary indicator-item"></span>
                </div>
            </button>
        </div>
    </div>
    <a href="javascript:history.back()"
        class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
    </a>

    <div class="mt-20 px-10 grid gap-4 grid-cols-1 sm:grid-cols-2 mb-10">
        <?php
        $conn = new mysqli("localhost", "root", "", "kamp_ease");
        $query = "SELECT k.komentar, k.rating, k.tanggal_komentar, 
                 u.username, u.fotoprofile, u.tanggal_daftar 
          FROM komentar k 
          JOIN user u ON k.user_id = u.id 
          ORDER BY k.tanggal_komentar DESC";

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $filledStars = intval($row['rating']);
            $emptyStars = 5 - $filledStars;
        ?>
            <article class="max-w-xl p-6 bg-white rounded-2xl shadow-md border border-[#E0E0E0] mb-4">
                <!-- Header: Profile -->
                <div class="flex items-center gap-4 mb-4">
                    <img class="w-10 h-10 rounded-full object-cover" src="<?= htmlspecialchars($row['fotoprofile']) ?>" alt="User photo">
                    <div>
                        <p class="text-sm font-semibold text-[#1F2937]"><?= htmlspecialchars($row['username']) ?></p>
                        <p class="text-xs text-gray-500">Joined <?= date('F Y', strtotime($row['tanggal_daftar'])) ?></p>
                    </div>
                </div>

                <!-- Rating -->
                <div class="flex items-center mb-3">
                    <div class="flex text-[#A78BFA]">
                        <?php for ($i = 0; $i < $filledStars; $i++): ?>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                            </svg>
                        <?php endfor; ?>
                        <?php for ($i = 0; $i < $emptyStars; $i++): ?>
                            <svg class="w-4 h-4 text-gray-300 fill-current" viewBox="0 0 20 20">
                                <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                            </svg>
                        <?php endfor; ?>
                    </div>
                    <span class="ml-2 text-xs text-gray-600"><?= $row['rating'] ?> out of 5</span>
                </div>

                <!-- Review Content -->
                <div class="text-sm text-[#374151] space-y-2">
                    <p><?= nl2br(htmlspecialchars($row['komentar'])) ?></p>
                </div>

                <!-- Tanggal komentar -->
                <div class="text-xs text-gray-400 mt-2">
                    <?= date('d M Y, H:i', strtotime($row['tanggal_komentar'])) ?>
                </div>
            </article>

        <?php } ?>
        <article class="max-w-xl p-6 bg-white rounded-2xl shadow-md border border-[#E0E0E0]">
            <!-- Header: Profile -->
            <div class="flex items-center gap-4 mb-4">
                <img class="w-10 h-10 rounded-full object-cover" src="https://i.pinimg.com/736x/49/2a/cc/492accfe16c0d606e7b2372dd963e10b.jpg" alt="User photo">
                <div>
                    <p class="text-sm font-semibold text-[#1F2937]">Ratna</p>
                    <p class="text-xs text-gray-500">Joined August 2023</p>
                </div>
            </div>

            <!-- Rating -->
            <div class="flex items-center mb-3">
                <div class="flex text-[#A78BFA]">
                    <!-- 4 filled stars -->
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                </div>
                <span class="ml-2 text-xs text-gray-600">4 out of 5</span>
            </div>

            <!-- Review Content -->
            <div class="text-sm text-[#374151] space-y-2">
                <p>
                    KampEase sangat membantu saya sebagai mahasiswa baru. Sekarang saya nggak perlu tanya-tanya lagi kalau mau cari gedung kuliah atau tempat makan!
                </p>
                <p>
                    UI-nya simpel, fiturnya lengkap, dan pastinya berguna banget buat navigasi di sekitar kampus.
                </p>
            </div>
             <div class="text-xs text-gray-400 mt-2">
                    01 Jun 2025 10:30
                </div>
        </article>

        <article class="max-w-xl p-6 bg-white rounded-2xl shadow-md border border-[#E0E0E0]">
            <!-- Header: Profile -->
            <div class="flex items-center gap-4 mb-4">
                <img class="w-10 h-10 rounded-full object-cover" src="https://i.pravatar.cc/100?img=12" alt="User photo">
                <div>
                    <p class="text-sm font-semibold text-[#1F2937]">Jesse Pinkman</p>
                    <p class="text-xs text-gray-500">Joined August 2024</p>
                </div>
            </div>

            <!-- Rating -->
            <div class="flex items-center mb-3">
                <div class="flex text-[#A78BFA]">
                    <!-- 4 filled stars -->
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                        <path d="M10 15l-5.878 3.09L5.5 12 1 8.91l6.09-.89L10 2l2.91 6.02L19 8.91 14.5 12l1.378 6.09z" />
                    </svg>
                </div>
                <span class="ml-2 text-xs text-gray-600">5 out of 5</span>
            </div>

            <!-- Review Content -->
            <div class="text-sm text-[#374151] space-y-2">
                <p>
                    Gacorr banget webnyaa, sangat mudah untuk digunakan dan berguna banget untuk saya mahasiswa baru!!
                </p>
                <p>
                    Recomend bangett pake inii!
                </p>
            </div>
            <div class="text-xs text-gray-400 mt-2">
                    01 Jun 2025 10:50
                </div>
        </article>

    </div>
</body>

</html>