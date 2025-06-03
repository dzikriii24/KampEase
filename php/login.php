<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
session_start();
error_reporting(0);



if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    // // Pengecekan apakah email dan password sesuai dengan akun admin
    // if ($email == 'canteengoo@gmail.com' && $_POST['password'] == 'admin1234') {
    //     $_SESSION['username'] = 'admin';
    //     header("Location: admin.php");
    //     exit();
    // }

    // Query untuk memeriksa pengguna selain admin
    $sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user_id'] = $row['id'];        // dipakai buat relasi antar tabel
        $_SESSION['username'] = $row['username']; // dipakai buat ditampilkan di halaman

        $message = "Login berhasil, selamat datang " . $row['username'] . "!";
        $status = 'success';
    } else {
        $message = "Password atau Email Salah, Silahkan Coba Lagi";
        $status = 'error';
    }
}

?>

<!DOCTYPE html>
<html lang="en" class="bg-[#7C3AED]">

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
    <link rel="icon" type="image/ico" href="/KampEase/images/log2.png"/>
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto">
    <!-- Tombol Back di pojok kiri atas -->
    <a href="javascript:history.back()"
        class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
    </a>

    <!-- component -->
    <!-- Container -->
    <div class="flex min-h-screen w-full items-center justify-center bg-[#F8F5FF] px-4 py-10">
        <!-- Login container -->
        <div class="flex w-full max-w-5xl overflow-hidden rounded-xl shadow-xl bg-white">
            <!-- Login form -->
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <!-- Heading -->
                <h1 class="text-3xl font-bold text-gray-800 mb-1">Selamat datang di KampEase!</h1>
                <p class="text-sm text-gray-500 mb-6">Masukkan detail akun kamu untuk login</p>

                <!-- Form -->
                <form class="space-y-4" method="POST">
                    <div>
                        <label for="email" class="block text-sm font-medium mb-1 text-gray-700">Masukan Email</label>
                        <div class="flex rounded-md shadow-sm">
                            <span
                                class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-4">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25" />
                                </svg>
                            </span>
                            <input type="email" placeholder="jhonpork@example.com" name="email" id="email" required value="<?php echo $email; ?>"
                                class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                        </div>
                    </div>
                    <!-- password -->
                    <div>
                        <label for="password" class="block text-sm font-medium mb-1 text-gray-700">Masukan Password</label>
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                                </svg>
                            </span>
                            <div class="relative w-full">
                                <input type="password" placeholder="••••••••" name="password" id="password" required value="<?php echo $_POST['password']; ?>"
                                    class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">
                                    👁
                                </button>
                            </div>


                        </div>
                    </div>

                    <div class="flex items-center justify-between text-sm">

                        <a href="lupaPW.php" class="text-[#7C3AED] hover:underline font-medium">Lupa password?</a>
                    </div>

                    <button type="submit" name="submit"
                        class="w-full rounded-md bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-medium py-2 transition duration-200">
                        Masuk
                    </button>
                </form>

                <!-- Sign up link -->
                <p class="text-center text-sm mt-6 text-gray-600">
                    Belum punya akun?
                    <a href="register.php" class="text-[#7C3AED] font-semibold hover:underline">Daftar sekarang</a>
                </p>
            </div>

            <!-- Image / illustration -->
            <div class="hidden md:block md:w-1/2">
                <img src="https://i.pinimg.com/736x/6d/16/8f/6d168f1899b5525d2b6ec93f842f9c66.jpg" alt="Illustration"
                    class="h-full w-full object-cover rounded-r-xl" />
            </div>
        </div>
    </div>

    <script>
        <?php if (!empty($message)): ?>
            Swal.fire({
                icon: '<?php echo $status; ?>', // 'success' atau 'error'
                title: '<?php echo $status == 'success' ? "Berhasil" : "Oops..."; ?>',
                text: '<?php echo $message; ?>',
                footer: '<?php echo $status == "error" ? "<a href=\"forgotPassword.php\">Lupa password?</a>" : ""; ?>'
            }).then(() => {
                // Redirect sesuai status
                window.location.href = "<?php echo $status == 'success' ? 'profile.php' : "login.php"; ?>";
            });
        <?php endif; ?>

        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>