<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
require __DIR__ . '/../vendor/autoload.php'; // naik 1 folder ke vendor

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);


$mail->SMTPDebug = 2;  // Mengaktifkan debugging untuk melihat proses SMTP


error_reporting(0);

session_start();




if (isset($_SESSION['username'])) {
    header("location:login.php");
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = md5($_POST['password']);
    $upassword = md5($_POST['upassword']);
    $status_mahasiswa = $_POST['status_mahasiswa'] ?? '';
    // Handle foto profil
    if (isset($_FILES['fotoprofile'])) {
        $file_name = $_FILES['fotoprofile']['name'];
        $file_tmp = $_FILES['fotoprofile']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_ext, $allowed_extensions)) {
            $new_file_name = uniqid('', true) . '.' . $file_ext;
            $upload_dir = '../uploads/foto_profile/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true); // Buat direktori jika belum ada
            }
            if (move_uploaded_file($file_tmp, $upload_dir . $new_file_name)) {
                $foto_profile = $upload_dir . $new_file_name;
            } else {
                echo "<script>alert('Gagal mengupload foto profile.');</script>";
            }
        } else {
            echo "<script>alert('Hanya file jpg, jpeg, dan png yang diperbolehkan.');</script>";
        }
    }

    if ($password == $upassword) {
        $sql = "SELECT * FROM user WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (!$result->num_rows > 0) {

            $otp_code = rand(100000, 999999);

            $sql = "INSERT INTO user (username, email, password, fotoprofile, otp_code, is_verified, status_mahasiswa)
                  VALUES ('$username', '$email', '$password', '$foto_profile', '$otp_code', 0 , '$status_mahasiswa')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                $mail = new PHPMailer(true);
                try {
                    $mail->isSMTP();
                    $mail->Host       = 'smtp.gmail.com';
                    $mail->SMTPAuth   = true;
                    $mail->Username   = 'dzikrirabbani2401@gmail.com';
                    $mail->Password   = 'yanq vpur bvbf zepl';
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port       = 587;


                    $mail->setFrom('dzikrirabbani2401@gmail.com', 'KampEase');
                    $mail->addAddress($email, $username);

                    $mail->isHTML(true);
                    $mail->Subject = 'Kode OTP Verifikasi Email';
                    $mail->Body = '
    <div style="font-family: Arial, sans-serif; background-color: #F8F5FF; padding: 20px; border-radius: 8px;">
        <div style="max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);">
            <h1 style="color: #7C3AED; font-size: 24px; margin-bottom: 10px;">Selamat Datang di <span style="color: #4B0082;">KampEase</span>!</h1>
            <p style="color: #4B5563; font-size: 16px; margin-bottom: 20px;">
                Kami senang Anda bergabung. Untuk menyelesaikan proses pendaftaran, silakan gunakan kode OTP berikut:
            </p>
            <div style="text-align: center; margin: 30px 0;">
                <span style="display: inline-block; background-color: #EDE9FE; color: #7C3AED; padding: 14px 24px; font-size: 22px; font-weight: bold; border-radius: 8px; letter-spacing: 2px;">
                    ' . $otp_code . '
                </span>
            </div>
            <p style="color: #4B5563; font-size: 15px;">
                Masukkan kode OTP ini di halaman verifikasi untuk melanjutkan. Kode ini hanya berlaku dalam beberapa menit, jadi pastikan Anda menggunakannya segera.
            </p>
            <p style="margin-top: 30px; font-size: 14px; color: #9CA3AF;">
                Jika Anda tidak meminta kode ini, silakan abaikan email ini. Untuk bantuan lebih lanjut, hubungi tim support kami.
            </p>
            <hr style="margin: 40px 0; border: none; border-top: 1px solid #E5E7EB;">
            <p style="font-size: 13px; color: #9CA3AF; text-align: center;">
                &copy; ' . date("Y") . ' KampEase. Seluruh hak cipta dilindungi.
            </p>
        </div>
    </div>
';

                    if ($mail->send()) {
                        $message = "Pendaftaran Berhasil. Silahkan Cek Email dan Masukan Kode OTP Untuk Verifikasi";
                        $status = 'success';
                    } else {
                        echo "<script>alert('Gagal mengirim email. Error: {$mail->ErrorInfo}');</script>";
                    }

                    $mail->SMTPDebug = 2;
                } catch (Exception $e) {
                    echo "<script>alert('Gagal mengirim email. Error: {$mail->ErrorInfo}');</script>";
                }
            } else {
                echo "<script>alert('Terjadi kesalahan, silakan coba lagi.');</script>";
            }
        } else {
            $message = "Email Sudah Digunakan Oleh Pengguna Lain";
            $status = 'error';
        }
    }
    if ($password !== $upassword) { // Kondisi jika password tidak sama
        $message = "Password Harus Sama";
        $status = 'error';
    }
}



?>

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
    <div class="flex min-h-screen w-full items-center justify-center bg-[#F8F5FF] px-4 py-10 mt-5">
        <!-- Signup container -->
        <div class="flex w-full max-w-5xl overflow-hidden rounded-xl shadow-xl bg-white">
            <!-- Signup form -->
            <div class="w-full md:w-1/2 p-8 md:p-12">
                <!-- Heading -->
                <h1 class="text-3xl font-bold text-gray-800 mb-1">Buat akun baru</h1>
                <p class="text-sm text-gray-500 mb-6">Lengkapi data berikut untuk registrasi akun</p>

                <!-- Form -->
                <form class="space-y-4" method="POST" enctype="multipart/form-data" onsubmit="showLoader()">
                    <!-- Email -->
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
                            <input type="email" id="email" name="email" placeholder="jhonpork@gmail.com" required
                                class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                        </div>
                    </div>

                    <!-- Username -->
                    <div>
                        <label for="username" class="block text-sm font-medium mb-1 text-gray-700">Masukan Username</label>
                        <div class="flex rounded-md shadow-sm">
                            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input type="text" id="username" name="username" placeholder="jhon pork" required
                                class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                        </div>
                    </div>


                    <div class="grid grid-cols-2 gap-2">


                        <!-- Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium mb-1 text-gray-700">Masukan Password</label>
                            <div class="flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                                    </svg>
                                </span>
                                <div class="relative">
                                    <input type="password" id="password" name="password" placeholder="••••••••" required
                                        class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                                    <button type="button" onclick="togglePassword()"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">
                                        👁
                                    </button>
                                </div>


                            </div>
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <label for="password" class="block text-sm font-medium mb-1 text-gray-700">Ulangi Password</label>
                            <div class="flex rounded-md shadow-sm">
                                <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4m0 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3" />
                                    </svg>
                                </span>
                                <div class="relative">
                                    <input type="password" id="upassword" name="upassword" placeholder="••••••••"
                                        class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                                    <button type="button" onclick="togglePasswordu()"
                                        class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 text-sm">
                                        👁
                                    </button>
                                </div>


                            </div>
                        </div>
                    </div>


                    <!-- Foto Profile -->
                    <div>
                        <fieldset class="fieldset">
                            <legend class="fieldset-legend">Masukan Foto Profile</legend>
                            <input type="file" class="file-input file:bg-[#7C3AED] file:text-white" id="foto_profile" name="fotoprofile" required accept=".jpg, .png, .jpeg" />
                            <label class="label"></label>
                        </fieldset>
                    </div>

                    <!-- Status Dropdown -->
                    <div>
                        <label class="block text-sm font-medium mb-1 text-gray-700">Masukan Status Anda</label>
                        <label class="select">
                            <span class="label">Status</span>
                            <select name="status_mahasiswa" id="status_mahasiswa">
                                <option value="">Pilih status</option>
                                <option value="mahasiswa_aktif">Mahasiswa Aktif</option>
                                <option value="alumni">Alumni</option>
                                <option value="mahasiswa_baru">Mahasiswa Baru</option>
                                <option value="tamu">Tamu</option>
                            </select>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button type="submit" name="submit"
                        class="w-full rounded-md bg-[#7C3AED] hover:bg-[#6D28D9] text-white font-medium py-2 transition duration-200">
                        Daftar
                    </button>


                    
                </form>

                <!-- Login link -->
                <p class="text-center text-sm mt-6 text-gray-600">
                    Sudah punya akun?
                    <a href="login.php" class="text-[#7C3AED] font-semibold hover:underline">Masuk sekarang</a>
                </p>


            </div>

            <!-- Image / illustration -->
            <div class="hidden md:block md:w-1/2">
                <img src="https://i.pinimg.com/736x/07/f9/ac/07f9ac7096cd8e67c81073b98742692c.jpg" alt="Illustration"
                    class="h-full w-full object-cover rounded-r-xl" />
            </div>
        </div>
    </div>


    <script src="../js/other.js"></script>
    <script>
        function togglePassword() {
            const input = document.getElementById("password");
            input.type = input.type === "password" ? "text" : "password";
        }

        function togglePasswordu() {
            const input = document.getElementById("upassword");
            input.type = input.type === "password" ? "text" : "password";
        }

        <?php if (!empty($message)): ?>
            Swal.fire({
                icon: '<?php echo $status; ?>', // 'success' atau 'error'
                title: '<?php echo $status == 'success' ? "Berhasil" : "Oops..."; ?>',
                text: '<?php echo $message; ?>',
            }).then(() => {
                // Redirect sesuai status
                window.location.href = "<?php echo $status == 'success' ? 'verify.php?email=' . $email : 'register.php'; ?>";
            });
        <?php endif; ?>


        function showLoader() {
            document.getElementById("loader-wrapper").style.display = "flex";
        }
    </script>
</body>

</html>