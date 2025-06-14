<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");

$sql = "SELECT * FROM stakeholders";
$result1 = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en" class="">

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <section
        class="w-full overflow-hidden bg-[url(../images/about.png)] bg-cover bg-top bg-no-repeat">
        <div class="bg-black/50 p-8 md:p-12 lg:px-16 lg:py-24">
            <div class="text-center ltr:sm:text-left rtl:sm:text-right">
                <h2 class="text-2xl text-white sm:text-3xl md:text-5xl poppins-bold">About KampEase</h2>

                <p class=" max-w-lg text-white/90 md:mt-6 md:block md:text-lg md:leading-relaxed poppins-regular">
                    KampEase adalah platform digital terpadu yang dirancang khusus untuk memudahkan mahasiswa dalam mengakses berbagai fasilitas dan informasi penting di lingkungan kampus.
                </p>
            </div>
        </div>
    </section>

    
    <div>
        <h1 class="text-3xl mt-10 font-bold text-gray-900 sm:text-5xl flex justify-center poppins-semibold">
            Para Petinggi
            <strong class="text-[#7C3AED]">&nbsp;
                KampEase </strong>
        </h1>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-8 mt-20 px-10 mx-auto mb-8">

            <?php while ($row = $result1->fetch_assoc()): ?>
                <div class="h-[450px]">
                    <a href="#" class="rounded-lg group relative block bg-black h-full">
                        <img
                            alt=""
                            src="<?= htmlspecialchars($row['foto']) ?>"
                            class="rounded-lg absolute inset-0 h-full w-full object-cover opacity-75 transition-opacity group-hover:opacity-50 brightness-70" />

                        <div class="relative h-full p-4 sm:p-6 lg:p-8 flex flex-col justify-between">
                            <div>
                                <p class="text-sm font-medium tracking-widest text-[#ffff] uppercase poppins-semibold">
                                    <?= htmlspecialchars($row['jabatan']) ?>
                                </p>

                                <p class="text-xl font-bold text-[#ffff] sm:text-2xl poppins-semibold">
                                    <?= htmlspecialchars($row['nama']) ?>
                                </p>
                            </div>

                            <div class="translate-y-8 transform opacity-0 transition-all group-hover:translate-y-0 group-hover:opacity-100">
                                <p class="text-sm text-white">
                                    <?= htmlspecialchars($row['detail']) ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

            <?php endwhile; ?>
        </div>
    </div>



    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>