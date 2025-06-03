<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
session_start();



if (!isset($_SESSION['username'])) {
    // Tampilkan halaman untuk user yang belum login
?>
    <!DOCTYPE html>
    <html lang="en" class="bg-[#F8F5FF]">

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

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

        <link rel="stylesheet" href="../css/font.css">
        <link rel="stylesheet" href="../css/hover.css">

        <!--logo web-->
        <link rel="icon" type="image/ico" href="/KampEase/images/log2.png"/>
    </head>

    <body class="min-h-screen flex flex-col justify-start overflow-x-hidden">

        <section class="bg-[#F8F5FF] lg:grid lg:h-screen lg:place-content-center sm:-mt-35">
            <div class="mx-auto w-screen max-w-screen-xl px-4 py-16 sm:px-6 sm:py-8 sm:-mb-10 sm:-pb-10">
                <div class="mx-auto max-w-prose text-center">
                    <h1 class="text-4xl font-bold text-gray-800 sm:text-5xl poppins-semibold">
                        Jelajahi fitur dan
                        <strong class="text-[#7C3AED] poppins-semibold"> temukan lokasi </strong>
                        dengan mudah
                    </h1>

                    <p class="mt-4 text-base text-pretty text-[#1F2937] sm:text-lg/relaxed poppins-regular">
                        Akses berbagai titik penting seperti gedung, Wi-Fi, dan fasilitas lainnya. Masuk untuk memulai pengalaman penuh dan fitur lengkap!
                    </p>

                    <div class="mt-6 flex justify-center gap-4">
                        <a
                            class="poppins-semibold inline-block rounded-lg border border-[#7C3AED] bg-[#7C3AED] px-6 py-3 font-medium text-white shadow-sm transition-colors hover:bg-[#6D28D9]"
                            href="login.php">
                            Masuk
                        </a>

                        <a
                            class="poppins-semibold inline-block rounded-lg border border-[#E5E0FA] px-6 py-3 font-medium text-[#5B21B6] shadow-sm transition-colors hover:bg-[#ECE7FE] hover:text-[#4C1D95]"
                            href="register.php">
                            Registrasi
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <div class="bg-[#F8F5FF] p-6 sm:p-2 sm:-mt-16">
            <div class="space-y-4 max-w-xl mx-auto ">

                <!-- Item 1 -->
                <div class="border border-purple-300 rounded-lg overflow-hidden">
                    <input type="checkbox" class="peer hidden" id="faq1" />

                    <label for="faq1"
                        class="block cursor-pointer bg-purple-100 text-purple-800 font-semibold px-4 py-3 peer-checked:bg-purple-200 transition">
                        Bagaimana cara membuat akun?
                    </label>

                    <div class="max-h-0 peer-checked:max-h-40 overflow-hidden transition-all duration-500 bg-white">
                        <div class="px-4 py-2 text-gray-700">
                            Klik tombol "Sign Up" di pojok kanan atas dan ikuti proses pendaftaran yang tersedia.
                        </div>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="border border-purple-300 rounded-lg overflow-hidden">
                    <input type="checkbox" class="peer hidden" id="faq2" />
                    <label for="faq2"
                        class="block cursor-pointer bg-purple-100 text-purple-800 font-semibold px-4 py-3 peer-checked:bg-purple-200 transition">
                        Apakah saya bisa mengganti password?
                    </label>
                    <div class="max-h-0 peer-checked:max-h-40 overflow-hidden transition-all duration-500 bg-white">
                        <div class="px-4 py-2 text-gray-700">
                            Klik tombol "Sign Up" di pojok kanan atas dan ikuti proses pendaftaran yang tersedia.
                        </div>
                    </div>
                </div>

            </div>
        </div>

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

        <!-- Right Side: Accordion -->
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

        <br>
        <br>
        <br>
    </body>

    </html>
<?php
    exit; // Hentikan eksekusi jika belum login
}

$username = $_SESSION['username']; // hanya dipakai kalau sudah login

$sql = "SELECT fotoprofile, status_mahasiswa FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $username);   // Bind parameter
$stmt->execute();                    // Execute query

$result = $stmt->get_result();       // Dapatkan hasil

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $foto_profile = $row['fotoprofile'] ? $row['fotoprofile'] : "images/log2.png";
    $status = $row['status_mahasiswa']; // Misal kamu juga mau ambil ini
} else {
    $foto_profile = "images/log2.png"; // Gambar default
    $status = "Tidak diketahui";
}

$stmt->close(); // Jangan lupa ditutup
?>

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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/hover.css">
</head>

<body class="min-h-screen flex flex-col justify-start overflow-x-hidden">

    <!-- Sesudah login -->
    <div>
        <div class="navbar bg-base-100 shadow-sm p-6">
            <div class="flex-1 mt-5">
                <div class="flex justify-start text-xl">
                    <span id="jam"></span>
                    <span>&nbsp;<?php echo $_SESSION['username']; ?>!</span>
                </div>

                <p class="text-gray-700 sm:col-span-2 dark:text-gray-200"><?php echo $row['status_mahasiswa']; ?></p>
            </div>
            <div class="flex-none mt-5">
                <button type="button" onclick="my_modal_3.showModal()">
                    <div class="avatar">
                        <div class="w-20 rounded-full">
                            <img src="<?php echo htmlspecialchars($foto_profile); ?>" />
                        </div>
                    </div>
                </button>
                <dialog id="my_modal_3" class="modal">
                    <div class="modal-box w-auto max-w-[400px] p-0 overflow-hidden">
                        <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2 z-10">✕</button>
                        </form>
                        <img src="<?php echo htmlspecialchars($foto_profile); ?>" alt="Gambar"
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
                    <p>test github.</p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Lihat</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Favorit Places End -->
        <!-- Pengaturan Akun -->
        <div>
            <a href="pengaturan.php"
                class="block bg-[#7C3AED] dark:bg-[#7C3AED] p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-white mb-4 mx-4">
                <div class="flex items-center justify-between">
                    <span class="text-base font-semibold text-white dark:text-white">Pengaturan</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white dark:text-white" fill="currentColor"
                        viewBox="0 0 16 16">
                        <path
                            d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                    </svg>
                </div>
            </a>


            <div class="grid grid-cols-2">
                <button id="logoutBtn"
                    class="cursor-pointer flex items-center justify-between bg-[#7C3AED] dark:bg-[#7C3AED] p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-white mb-4 mx-4">
                    <span class="text-base font-semibold text-gray-800 dark:text-gray-100">Log Out</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd"
                            d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                </button>


                <a href="" class="flex items-center justify-between bg-[#7C3AED] dark:bg-[#7C3AED] p-4 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 text-white mb-4 mx-4">
                    <span class="text-base font-semibold text-gray-800 dark:text-gray-100">Tentang Kami</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0" />
                    </svg>
                </a>
            </div>
        </div>




        <!-- Pengaturan Akun End -->

        <!-- Tentang Aplikasi -->
        <!-- Tentang Aplikasi End -->

        <!-- FAQ -->

        <section class="overflow-hidden bg-white mt-10">
            <div class="grid grid-cols-1 sm:grid-cols-2">

                <!-- Right Side: Accordion -->
                <div class="p-6 sm:p-10 bg-white">
                    <div class="space-y-4 max-w-xl mx-auto">

                        <!-- Item 1 -->
                        <div class="border border-purple-300 rounded-lg overflow-hidden">
                            <input type="checkbox" class="peer hidden" id="faq1" />

                            <label for="faq1"
                                class="block cursor-pointer bg-purple-100 text-purple-800 font-semibold px-4 py-3 peer-checked:bg-purple-200 transition">
                                Bagaimana cara membuat akun?
                            </label>

                            <div class="max-h-0 peer-checked:max-h-40 overflow-hidden transition-all duration-500 bg-white">
                                <div class="px-4 py-2 text-gray-700">
                                    Klik tombol "Registrasi" di pojok kanan atas dan ikuti proses pendaftaran yang tersedia.
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="border border-purple-300 rounded-lg overflow-hidden">
                            <input type="checkbox" class="peer hidden" id="faq2" />
                            <label for="faq2"
                                class="block cursor-pointer bg-purple-100 text-purple-800 font-semibold px-4 py-3 peer-checked:bg-purple-200 transition">
                                Apakah saya bisa mengganti password?
                            </label>
                            <div class="max-h-0 peer-checked:max-h-40 overflow-hidden transition-all duration-500 bg-white">
                                <div class="px-4 py-2 text-gray-700">
                                    Klik Masuk lalu Klik lupa password.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Left Side: Text -->
                <div class="p-8 md:p-12 lg:px-16 lg:py-24 bg-[#f5f3ff]">
                    <div class="mx-auto max-w-xl text-center sm:text-left">
                        <h2 class="text-3xl font-bold text-purple-800">FAQ</h2>
                        <p class="text-gray-600 mt-4 mb-2">
                            Temukan jawaban dari pertanyaan yang sering diajukan mengenai layanan dan fitur yang kami sediakan.
                        </p>
                        <div class="max-w-xl mx-auto bg-white border border-purple-200 rounded-xl shadow-lg p-6 space-y-4">
                            <!-- Judul -->
                            <h2 class="text-xl font-semibold text-purple-800">Tinggalkan Komentar</h2>

                            <!-- Rating Bintang -->
                            <div id="rating-stars" class="flex gap-1 text-2xl text-gray-300">
                                <button type="button" data-value="1" class="star">★</button>
                                <button type="button" data-value="2" class="star">★</button>
                                <button type="button" data-value="3" class="star">★</button>
                                <button type="button" data-value="4" class="star">★</button>
                                <button type="button" data-value="5" class="star">★</button>
                            </div>

                            <!-- Form Komentar -->
                            <form action="functComent.php" method="POST" class="space-y-3">
                                <label for="komentar" class="block text-sm font-medium text-gray-700">
                                    Pesan atau pertanyaan untuk Kampease
                                </label>
                                <div class="relative overflow-hidden rounded border border-purple-300 focus-within:ring-2 focus-within:ring-purple-400">
                                    <textarea name="komentar" id="komentar" rows="4"
                                        class="w-full resize-none border-none p-3 text-sm focus:ring-0 focus:outline-none placeholder:text-gray-400"
                                        placeholder="Tulis komentar Anda di sini..."></textarea>
                                    <div class="flex items-center justify-end gap-2 p-2 bg-white border-t border-purple-100">
                                        <button type="button"
                                            onclick="document.getElementById('komentar').value = ''"
                                            class="rounded px-4 py-1.5 text-sm font-medium text-gray-600 hover:text-gray-800 transition-colors">
                                            Clear
                                        </button>
                                        <button type="submit"
                                            class="rounded bg-purple-600 px-4 py-1.5 text-sm font-medium text-white hover:bg-purple-700 transition">
                                            Kirim
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="rating" id="rating-value" />
                            </form>

                        </div>
                        <script>
                            const form = document.querySelector('form');
                            const stars = document.querySelectorAll('.star');
                            const ratingInput = document.getElementById('rating-value');
                            const komentarTextarea = document.getElementById('komentar');

                            stars.forEach(star => {
                                star.addEventListener('click', () => {
                                    const rating = star.getAttribute('data-value');
                                    ratingInput.value = rating;

                                    stars.forEach(s => {
                                        s.style.color = (s.getAttribute('data-value') <= rating) ? '#FBBF24' : '#D1D5DB';
                                    });
                                });
                            });

                            form.addEventListener('submit', function(e) {
                                if (ratingInput.value === '' || komentarTextarea.value.trim() === '') {
                                    alert('Mohon isi komentar dan pilih rating terlebih dahulu.');
                                    e.preventDefault(); // Batalkan pengiriman form
                                }
                            });
                        </script>

                    </div>
                </div>


            </div>
        </section>
        <br>
        <br>
        <br>


        <!-- FAQ -->
    </div>



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

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function() {
            Swal.fire({
                title: "Yakin ingin logout?",
                text: "Anda akan keluar dari sesi saat ini.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Logout!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Redirect ke logout
                    window.location.href = "logout.php";
                }
            });
        });
    </script>
    <!-- FIXED END -->
    <script src="js/chatbot.js"></script>
    <script src="../js/other.js"></script>

</body>

</html>