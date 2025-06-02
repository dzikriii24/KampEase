<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

$mail->SMTPDebug = 2;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = md5($_POST['new_password']); // Password baru dienkripsi dengan md5

    // Cek apakah email ada di database
    $sql = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Jika email ditemukan, update password
        $otp_code = rand(100000, 999999);
        $update_sql = "UPDATE user SET password='$new_password' WHERE email='$email'";
        $sqlOTP = "UPDATE user SET otp_code='$otp_code', is_verified=0 WHERE email='$email'";

        if (mysqli_query($conn, $sqlOTP)) {
            // Send OTP Email
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'dzikrirabbani2401@gmail.com';  // Ganti dengan alamat email Anda
                $mail->Password   = 'yanq vpur bvbf zepl';   // Ganti dengan password atau App Password Anda
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // TLS
                $mail->Port       = 587;  // Port untuk TLS

                $mail->setFrom('dzikrirabbani2401@gmail.com', 'KampEase');
                $mail->addAddress($email);  // Hanya mengirim ke email yang dimasukkan

                $mail->isHTML(true);
                $mail->Subject = 'Kode OTP Lupa Password';
                $mail->Body = '
    <div style="font-family: Arial, sans-serif; background-color: #F8F5FF; padding: 20px; border-radius: 8px;">
    <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
        <h1 style="color: #7C3AED; font-size: 24px; margin-bottom: 10px;">
            Permintaan Reset <span style="color: #4B0082;">Password</span>
        </h1>
        <p style="color: #4B5563; font-size: 16px; margin-bottom: 20px;">
            Kami menerima permintaan untuk mereset kata sandi akun Anda di <strong>KampEase</strong>. Gunakan kode OTP berikut untuk melanjutkan proses reset:
        </p>
        <div style="text-align: center; margin: 30px 0;">
            <span style="display: inline-block; background-color: #EDE9FE; color: #7C3AED; padding: 14px 24px; font-size: 22px; font-weight: bold; border-radius: 8px; letter-spacing: 2px;">
                ' . $otp_code . '
            </span>
        </div>
        <p style="color: #4B5563; font-size: 15px;">
            Masukkan kode OTP di halaman reset password untuk melanjutkan. Kode ini hanya berlaku dalam beberapa menit dan akan kedaluwarsa setelahnya.
        </p>
        <p style="margin-top: 20px; font-size: 14px; color: #9CA3AF;">
            Jika Anda tidak merasa meminta reset password, Anda bisa abaikan email ini. Untuk bantuan lebih lanjut, silakan hubungi tim support kami.
        </p>
        <hr style="margin: 40px 0; border: none; border-top: 1px solid #E5E7EB;">
        <p style="font-size: 13px; color: #9CA3AF; text-align: center;">
            &copy; <?= date("Y") ?> KampEase. Seluruh hak cipta dilindungi.
        </p>
    </div>
</div>
';

                if ($mail->send()) {
                    $message = 'Password Berhasil Diubah. Silakan cek email Anda untuk kode OTP.';
                    $status = 'success';
                    $redirect = "window.location.href='verify.php?email=$email'";
                } else {
                    echo "<script>alert('Gagal mengirim email. Error: {$mail->ErrorInfo}');</script>";
                }
            } catch (Exception $e) {
                echo "<script>alert('Gagal mengirim email. Error: {$mail->ErrorInfo}');</script>";
            }
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui data OTP. Silakan coba lagi.');</script>";
        }

        if (mysqli_query($conn, $update_sql)) {
            $message = 'Password Berhasil Diubah. Silakan cek email Anda untuk kode OTP.';
            $status = 'success';
            $redirect = "window.location.href='verify.php?email=$email'";
        } else {
            $message = "Email Tidak Ditemukan, Silahkan Ulangi";
            $status = 'error';
        }
    } else {
        // Jika email tidak ditemukan
        $message = "Email Tidak Ditemukan, Silahkan Ulangi";
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
    <link rel="stylesheet" href="../css/loading.css">

    <!--logo web-->
    <link rel="icon" type="image/ico" href="/KampEase/images/log2.png"/>
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto">

    <div id="loader-wrapper" style="display: none;">
        <div class="loader"></div>
    </div>
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
                <h1 class="text-3xl font-bold text-gray-800 mb-1">Lupa Password?</h1>
                <p class="text-sm text-gray-500 mb-6">Silahkan Masukan Email dan Password Baru</p>

                <!-- Form -->
                <form class="space-y-4" method="POST" onsubmit="showLoader()">
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
                            <input type="email" placeholder="jhonpork@example.com" name="email" id="email" required
                                class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium mb-1 text-gray-700">Masukan Password</label>
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                                </svg>
                            </span>
                            <div class="relative w-full">
                                <input type="password" placeholder="••••••••" name="new_password" id="password" required
                                    class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                                <button type="button" onclick="togglePassword()"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">
                                    👁
                                </button>
                            </div>


                        </div>
                    </div>
                    <button type="submit" name="submit"
                        class="w-full rounded-md bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-medium py-2 transition duration-200">
                        Verifikasi
                    </button>
                </form>

                <!-- Sign up link -->
                <p class="text-center text-sm mt-6 text-gray-600">
                    Belum punya akun?
                    <a href="#" class="text-[#7C3AED] font-semibold hover:underline">Daftar sekarang</a>
                </p>
            </div>

            <!-- Image / illustration -->
            <div class="hidden md:block md:w-1/2">
                <img src="https://i.pinimg.com/736x/5e/12/38/5e123830fa28383eaf3ecd3c0cbc5702.jpg" alt="Illustration"
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
                window.location.href = "<?php echo $status == 'success' ? "verify.php?email=$email" : "lupaPW.php"; ?>";
            });
        <?php endif; ?>

        function showLoader() {
            document.getElementById("loader-wrapper").style.display = "flex";
        }

        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>

</body>

</html>