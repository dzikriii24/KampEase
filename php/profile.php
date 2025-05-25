<!DOCTYPE html>
<html lang="en" class="bg-[#F3F4F6]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KampEase</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.scrollTo(0, 0);
    </script>

    <!-- Flaticon -->
    <link rel='stylesheet'
        href='https://cdn-uicons.flaticon.com/3.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>


    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/hover.css">
</head>

<body class="min-h-screen flex flex-col justify-start">

    <!-- kalo belum login bikin tampilan ajakan untuk login -->
    <!-- CTAS -->

    <!-- Login or regist -->
    <!-- LOR End -->
    <!-- CTAS End -->

    <!-- Navbar Profile -->
    <div class="navbar bg-base-100 shadow-sm p-6">
        <div class="flex-1 mt-5">
            <div class="flex justify-start text-xl">
                <span id="jam"></span>
                <span>&nbsp;Jessica!</span>
            </div>

            <p class="text-gray-700 sm:col-span-2 dark:text-gray-200">Mahasiswa Aktif</p>
        </div>
        <div class="flex-none mt-5">
            <button onclick="my_modal_3.showModal()">
                <div class="avatar">
                    <div class="w-20 rounded-full">
                        <img src="https://i.pinimg.com/736x/45/d4/97/45d497e5ef0683b7c144183f079c1ca1.jpg" />
                    </div>
                </div>
            </button>
            <dialog id="my_modal_3" class="modal">
                <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                    <form method="dialog">
                        <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                    </form>
                    <img src="https://i.pinimg.com/736x/45/d4/97/45d497e5ef0683b7c144183f079c1ca1.jpg" alt="Gambar"
                        class="max-w-full h-auto block" />
                </div>
            </dialog>

        </div>
    </div>



    <!-- block -->
    


    <!-- Navbar Profile End -->

    <!-- FAVORIT PLACES -->
    <div class="flex grid grid-cols-1 sm:grid-cols-2 sm:px-20 mx-auto mt-5 gap-4 mb-10">
        <div class="card card-side bg-base-100 shadow-sm">
            <div class="text-[100px] px-2 text-[#7C3AED] items-center justify-center flex">
                <i class="fi fi-sr-region-pin-alt"></i>
            </div>
            <div class="card-body">
                <h2 class="card-title">Cari Tempat di KampEase!</h2>
                <p>Click the button to watch on Jetflix app.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
        <div class="card card-side bg-base-100 shadow-sm">
            <div class="text-[100px] px-2 text-[#7C3AED] items-center justify-center flex">
                <i class="fi fi-sr-square-star"></i>
            </div>


            <div class="card-body">
                <h2 class="card-title">Tempat Favorit Kamu</h2>
                <p>Click the button to watch on Jetflix app.</p>
                <div class="card-actions justify-end">
                    <button class="btn btn-primary">Lihat</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Favorit Places End -->
    <!-- Pengaturan Akun -->
    <div>
        <div
            class="flex items-center justify-between bg-[#7C3AED] dark:bg-[#7C3AED] p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-white mb-4 mx-4">
            <a href="#" class="text-base font-semibold text-gray-800 dark:text-gray-100">Pengaturan</a>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white dark:text-white" fill="currentColor"
                viewBox="0 0 16 16">
                <path
                    d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
            </svg>
        </div>

        <div class="grid grid-cols-2">
            <button
                class="flex items-center justify-between bg-[#7C3AED] dark:bg-[#7C3AED] p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-white mb-4 mx-4">
                <a href="#" class="text-base font-semibold text-gray-800 dark:text-gray-100">Log Out</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                    <path fill-rule="evenodd"
                        d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                </svg>
            </button>
            <button
                class="flex items-center justify-between bg-[#7C3AED] dark:bg-[#7C3AED] p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-white mb-4 mx-4">
                <a href="#" class="text-base font-semibold text-gray-800 dark:text-gray-100">3</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white dark:text-white" fill="currentColor"
                    viewBox="0 0 16 16">
                    <path
                        d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                </svg>
            </button>
        </div>
    </div>




    <!-- Pengaturan Akun End -->

    <!-- Tentang Aplikasi -->
    <!-- Tentang Aplikasi End -->

    <!-- FAQ -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 px-4 mx-auto">
        <div class="border-none collapse border">
            <input type="checkbox" class="peer" />
            <div
                class="collapse-title bg-primary text-primary-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                How do I create an account?
            </div>
            <div
                class="collapse-content bg-primary text-primary-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                Click the "Sign Up" button in the top right corner and follow the registration process.
            </div>
        </div>

        <div class="border-none collapse border">
            <input type="checkbox" class="peer" />
            <div
                class="collapse-title bg-primary text-primary-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                How do I create an account?
            </div>
            <div
                class="collapse-content bg-primary text-primary-content peer-checked:bg-secondary peer-checked:text-secondary-content">
                Click the "Sign Up" button in the top right corner and follow the registration process.
            </div>
        </div>
    </div>

    <!-- FAQ -->

    <!-- Logout -->
    <!-- Logout end -->
    <!-- FIXED MENU -->
    <div
        class="z-40 dock text-[#1F2937]-content bg-[#DDD6FE]/70 rounded-tr-[90px] rounded-tl-[90px] sm:w-[400px] w-[388px] flex justify-center justify-self-center poppins-regular">
        <a href="/kampEase/index.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-house-fill"
                viewBox="0 0 16 16">
                <path
                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z" />
            </svg>
            <span class="dock-label">Home</span>
        </a>

        <a href="/kampEase/php/maps.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
            </svg>
            <span class="dock-label">Maps</span>
        </a>

        <a href="/kampEase/php/profile.php" class="dock-active">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill"
                viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
            </svg>
            <span class="dock-label">Profile</span>
        </a>
    </div>
    <!-- FIXED END -->


    <script src="js/chatbot.js"></script>
    <script src="../js/other.js"></script>

</body>

</html>