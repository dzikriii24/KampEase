<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");

 
if (isset($_POST['verify'])) {
    $email = $_GET['email'];
    $otp = $_POST['otp'];

    $sql = "SELECT * FROM user WHERE email = '$email' AND otp_code = '$otp'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $sql = "UPDATE user SET is_verified = 1, otp_code = NULL WHERE email = '$email'";
        if (mysqli_query($conn, $sql)) {
            $message = "Email berhasil diverifikasi, silahkan login";
            $status = 'success';
        }
    } else {
        $message = "Kode OTP tidak sesuai, silahkan masukan kembali";
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
                <h1 class="text-3xl font-bold text-gray-800 mb-1">Masukan Kode OTP</h1>
                <p class="text-sm text-gray-500 mb-6">Silahkan Masukan Kode OTP Untuk Menyelesaikan Pendaftaran</p>

                <!-- Form -->
                <form class="space-y-4" method="post">
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700">Kode OTP</label>
                        <input type="text" placeholder="Masukan Kode OTP" name="otp" required
                            class="w-full rounded-md border border-gray-300 px-4 py-2 text-sm focus:border-[#7C3AED] focus:ring-1 focus:ring-[#7C3AED] focus:outline-none" />
                    </div>
                    <button type="submit" name="verify"
                        class="w-full rounded-md bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-medium py-2 transition duration-200">
                        Kirim
                    </button>
                </form>
            </div>

            <!-- Image / illustration -->
            <div class="hidden md:block md:w-1/2">
                <img src="https://i.pinimg.com/736x/51/42/c7/5142c7a9efea956923b0c32b890b8fed.jpg" alt="Illustration"
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
            }).then(() => {
                // Redirect sesuai status
                window.location.href = "<?php echo $status == 'success' ? 'login.php' : "verify.php?email=$email"; ?>";
            });
        <?php endif; ?>
    </script>
</body>

</html>