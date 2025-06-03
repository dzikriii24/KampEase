<!DOCTYPE html>
<html lang="en" class="bg-[#F3F4F6]">
<style>
    html {
        scroll-behavior: smooth;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KampEase</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    

    <!--logo web-->
    <link rel="icon" type="image/ico" href="images/log2.png"/>


    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.scrollTo(0, 0);
    </script>


    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/hover.css">
</head>

<body class="min-h-screen flex flex-col items-center justify-start">
    <!-- TOP BANNER -->
    <div id="maincontent">
        <div class="carousel w-full ">
            <div id="item1" class="carousel-item w-full">
                <img
                    src="images/Banner.png"
                    class="w-full" />
            </div>
        </div>
    </div>
    <!-- END TOP BANNER -->

    <!-- SEARCH -->

    <!-- bikin auto complete untuk search -->
    <form action="php/cari.php" method="get">
        <label class="poppins-regular bg-[#FFFFFF] aret-[#1F2937] text-[#1F2937] input items-center -mt-5 flex justify-self-center outline-none rounded-xl hover:outline-hidden focus:outline-hidden lg:w-[500px]" style="outline:none;">
            <input type="search" name="q" required placeholder="Cari Tempat di Sekitar Kampus" class="poppins-reguler caret-[#1F2937] text-[#1F2937] bg-[#1F2937 ] outline-none lg:p-4 rounded-lg" style="outline:none;" />
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
    </form>

    <!-- SEARCH END -->

    <!-- CHATBOT -->
    <div x-data="chatbot()" class="z-50">
        <!-- Tombol Chatbot -->
        <button @click="open = !open" class="z-40">
            <div class="avatar fixed sm:bottom-2 bottom-16 right-2 z-40 hover:scale-110 transition-transform duration-300">
                <div class="chatbot w-14 sm:w-20 bg-cover">
                    <img src="images/chatbot.png" alt="Chatbot" />
                </div>
            </div>
        </button>

        <!-- Panel Chatbot -->
        <div
            x-show="open"
            x-transition
            class="fixed bottom-28 sm:bottom-24 right-4 sm:right-4 bg-white border border-gray-300 rounded-xl shadow-lg w-[90%] max-w-sm z-50 overflow-hidden"
            @click.outside="open = false">
            <!-- Header -->
            <div class="bg-[#7C3AED] text-white p-4 font-semibold flex justify-between items-center">
                <span>Chat Assistant</span>
                <button @click="open = false" class="text-white text-xl leading-none hover:opacity-80">&times;</button>
            </div>

            <!-- Body Chat -->
            <div class="p-4 h-64 overflow-y-auto space-y-2 bg-gray-50" x-ref="chatBody">
                <template x-for="message in messages" :key="message.id">
                    <div
                        :class="message.sender === 'user' ? 'text-right' : 'text-left'"
                        class="text-sm">
                        <span
                            :class="message.sender === 'user' ? 'bg-purple-100' : 'bg-white'"
                            class="inline-block p-2 rounded shadow max-w-xs">
                            <span x-text="message.text"></span>
                        </span>
                    </div>
                </template>
            </div>

            <!-- Input -->
            <div class="flex items-center border-t border-gray-200 p-2 bg-white">
                <input
                    x-model="newMessage"
                    @keydown.enter="sendMessage()"
                    type="text"
                    placeholder="Ketik pesan..."
                    class="flex-1 px-3 py-2 border rounded-full text-sm focus:outline-none" />
                <button @click="sendMessage()" class="ml-2 bg-[#7C3AED] text-white rounded-full w-9 h-9 flex items-center justify-center hover:bg-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- CHATBOT -->


    <!-- FITUR -->
    <div class="mt-10 poppins-bold grid grid-cols-4 sm:grid-cols-3 lg:grid-cols-4 sm:px- lg:px-20 sm:mt-20 mt-10 justify-self-center gap-4 sm:gap-[50px] items-center justify-center">
        <a href="">
            <article class="card overflow-hidden rounded-xl bg-white w-20 sm:w-36">
                <img
                    alt=""
                    src="images/wifi.png"
                    class="object-cover sm:w-full w-16" />

                <div class="p-4 sm:p-6">
                    <h3 class="sm:text-lg text-sm font-medium text-center text-[#1F2937]">
                        Wi-fii Areaa
                    </h3>
                </div>
            </article>
        </a>

        <a href="php/pageGedung.php">
            <article class="card overflow-hidden rounded-xl bg-white w-20 sm:w-36">
                <img
                    alt=""
                    src="images/gedung3d.png"
                    class="object-cover sm:w-full w-16" />

                <div class="p-4 sm:p-6">
                    <h3 class="sm:text-lg text-sm font-medium text-center text-[#1F2937]">
                        Area Gedung
                    </h3>
                </div>
            </article>
        </a>
        <a href="">
            <article class="card overflow-hidden rounded-xl bg-white w-20 sm:w-36">
                <img
                    alt=""
                    src="images/parkings.png"
                    class="object-cover sm:w-full w-16" />

                <div class="p-4 sm:p-6">
                    <h3 class="sm:text-lg text-sm font-medium text-center text-[#1F2937]">
                        Area Parkir
                    </h3>
                </div>
            </article>
        </a>
        <a href="php/more.php">
            <article class="card overflow-hidden rounded-xl bg-white w-20 sm:w-36 display-none">
                <img
                    alt=""
                    src="images/more.png"
                    class="object-cover sm:w-full w-16" />

                <div class="p-4 sm:p-6">
                    <h3 class="sm:text-lg text-sm font-medium text-center text-[#1F2937]">
                        Semua Area
                    </h3>
                </div>
            </article>
        </a>
    </div>

    <!-- FITUR END -->

    <!-- MAPS SEKILAS -->
    <section>
        <div class="mt-8 sm:mt-20 mx-auto max-w-screen-xl px-4 py-8 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:items-center md:gap-8">
                <div>
                    <div class="max-w-lg md:max-w-none">
                        <h2 class="poppins-semibold text-2xl text-[#1F2937] sm:text-3xl">
                            Nggak usah bingung, semua tempat ada di kampEase!
                        </h2>

                        <p class="mt-4 text-[#1F2937] nunito-regular">
                            Bingung cari ruang kelas, kantin, atau WiFi di kampus? kampEase hadir buat bantu kamu temuin semua tempat penting di kampus. Cukup cari, klik, dan sampai tujuan!
                        </p>
                    </div>
                    <a
                        class="poppins-regular mt-10 w-62 group flex items-center justify-between gap-4 rounded-lg border border-[#7C3AED] bg-[#7C3AED] px-5 py-3 transition-colors hover:bg-transparent focus:ring-3 focus:outline-hidden"
                        href="php/maps.php">
                        <span class="font-medium text-white transition-colors group-hover:text-[#7C3AED]">
                            Mulai Cari Tempat
                        </span>

                        <span class="shrink-0 rounded-full border border-current bg-white p-2 text-[#7C3AED]">
                            <svg
                                class="size-5 rtl:rotate-180"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </span>
                    </a>
                </div>

                <div>
                    <div>
                        <iframe
                            dir="rtl"
                            class="rounded-s-lg"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3447.157123313611!2d107.71547209339076!3d-6.931217665918412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68c302db3434f5%3A0xdf4aacdb8618199c!2sUIN%20Sunan%20Gunung%20Djati%20Bandung!5e0!3m2!1sid!2sid!4v1747523979240!5m2!1sid!2sid"
                            width="100%" height="350" style="border:0; border-radius: 8px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>
        </div>

    </section>

    <!-- MAPS END -->

    <!-- BERITA KAMP-EASE -->
    <div class="w-full overflow-x-auto">
        <!-- bikin kalo tampilan hp bisa auto scroll -->
        <div class="stats shadow bg-white flex sm:justify-self-center mt-20 items-center sm:w-40autoscroll lg:w-[900px] overflow-x-auto flex-nowrap gap-4 py-4 px-2 rounded-xl z-10">
            <div class="stat">
                <div class="stat-figure text-[#7C3AED]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                    </svg>
                </div>
                <div class="stat-title poppins-bold text-[#1F2937]">Lokasi Disekitar Kampus</div>
                <div class="stat-value poppins-bold text-[#7C3AED]">100+</div>
            </div>

            <div class="stat w-80">
                <div class="stat-figure text-[#7C3AED]">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="#7C3AED"
                        viewBox="0 0 24 24"
                        class="inline-block h-8 w-8 stroke-current">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <div class="stat-title poppins-bold text-center mt-2 text-[#1F2937]">Navigasi Cepat dan Mudah</div>
            </div>

            <div class="stat">
                <div class="stat-figure text-secondary">
                    <div class="avatar online">
                        <div class="w-16 rounded-full">
                            <img src="https://i.pinimg.com/736x/9a/ce/de/9acedeea2b880945b95684cd8f9bfa9e.jpg" />
                        </div>
                    </div>
                </div>
                <div class="stat-value text-[#7C3AED]">99%</div>
                <div class="stat-title text-[#1F2937] poppins-bold">Tingkat Akurasi Tempat</div>
            </div>
        </div>
    </div>

    <!-- BERITA END -->

    <!-- Testimoni -->
    <div class="mt-20 px-10 grid gap-4 lg:grid-cols-2 sm:grid-cols-1">
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
                01 Jun 2025 10:50
            </div>
        </article>
    </div>
    <div

        class="mt-10 poppins-regular">
        <p class="text-center font-medium">
            Lihat Semua Komentar
            <a href="php/komentar.php" class="inline-block underline"> Disini </a>
        </p>
    </div>

    <!-- Testimoni End -->

    <!-- Footer -->

    <footer class="bg-[#A78BFA] mt-10 pb-10 w-full">
        <div class="relative mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8 lg:pt-24">
            <div class="absolute end-4 top-4 sm:end-6 sm:top-6 lg:end-8 lg:top-8">
                <a
                    class="inline-block rounded-full bg-[#1F2937] p-2 text-white shadow-sm transition hover:bg-black sm:p-3 lg:p-4"
                    href="#maincontent">
                    <span class="sr-only">Back to top</span>

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="size-5"
                        viewBox="0 0 20 20"
                        fill="currentColor">
                        <path
                            fill-rule="evenodd"
                            d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z"
                            clip-rule="evenodd" />
                    </svg>
                </a>
            </div>

            <div class="lg:flex lg:items-end lg:justify-between">
                <div>
                    <div class="flex justify-center text-white lg:justify-start">
                        <img src="images/log2.png" class="w-20" alt="">
                    </div>
                    <p class="mx-auto mt-6 max-w-md text-center leading-relaxed text-[#1F2937] lg:text-left poppins-regular">
                        Temukan lokasi yang Anda cari dan rasakan berbagai fasilitas unggulan yang ditawarkan Kampus UIN Sunan Gunung Djati Bandung.

                    </p>
                </div>

                <ul
                    class="mt-12 flex flex-wrap justify-center gap-6 md:gap-8 lg:mt-0 lg:justify-end lg:gap-12 text-white poppins-regular">
                    <li>
                        <a class="transition hover:text-gray-700/75" href="#"> About </a>
                    </li>

                    <li>
                        <a class="transition hover:text-gray-700/75" href="#"> Services </a>
                    </li>

                    <li>
                        <a class="transition hover:text-gray-700/75" href="#"> Team </a>
                    </li>
                </ul>
            </div>

            <p class="mt-12 text-center text-sm text-[#1F2937] lg:text-right poppins-regular">
                Copyright &copy; 2025 By KampEase Group. All rights reserved.
            </p>
        </div>
    </footer>

    <!-- Footer End -->

    <!-- FIXED MENU -->
    <div class="z-40 dock text-[#1F2937]-content bg-[#DDD6FE]/70 rounded-tr-[90px] rounded-tl-[90px] sm:w-[400px] w-[388px] flex justify-center justify-self-center poppins-regular">
        <a href="index.php" class="dock-active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg>
            <span class="dock-label">Home</span>
        </a>

        <a href="php/maps.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>
            <span class="dock-label">Maps</span>
        </a>

        <a href="php/profile.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
            <span class="dock-label">Profile</span>
        </a>
    </div>
    <!-- FIXED MENU END -->

    <script src="js/chatbot.js"></script>

</body>

</html>