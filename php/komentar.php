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
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto">
    <div class="mt-20 px-10 grid gap-4 grid-cols-1 sm:grid-cols-2">
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
        </article>

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
        </article>
    </div>
</body>

</html>