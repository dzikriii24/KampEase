<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
session_start();


$username = $_SESSION['username']; // hanya dipakai kalau sudah login

$sql = "SELECT fotoprofile, status_mahasiswa, username_vis FROM user WHERE username = ?";
$stmt = $conn->prepare($sql);

$notif = "";

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


$message = "";
$status = "";

// ------------------- UBAH USERNAME -------------------
if (isset($_POST['new_username'])) {
    $usernameBaru = $_POST['username'];
    $idUser = $_SESSION['user_id'];

    $query = "UPDATE user SET username_vis = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $usernameBaru, $idUser);

    if ($stmt->execute()) {
        $message = "Username berhasil diubah!";
        $status = 'success';
    } else {
        $message = "Gagal mengganti username.";
        $status = 'error';
    }

    $stmt->close();
}

// ------------------- UBAH PASSWORD -------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $user_id = $_SESSION['user_id'];

    // Ambil password dari DB
    $query = "SELECT password FROM user WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data && password_verify($old_password, $data['password'])) {
        $newHashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

        $update = "UPDATE user SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("si", $newHashedPassword, $user_id);

        if ($stmt->execute()) {
            $message = "Password berhasil diubah!";
            $status = "success";
        } else {
            $message = "Gagal mengubah password.";
            $status = "error";
        }
    } else {
        $message = "Password lama tidak cocok.";
        $status = "error";
    }
}



?>

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
    <link rel="icon" type="image/ico" href="images/log2.png" />


    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>
        window.scrollTo(0, 0);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/font.css">
    <link rel="stylesheet" href="../css/hover.css">

</head>

<body class="min-h-screen flex flex-col items-center justify-start">
    <a href="../php/profile.php"
        class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg>
    </a>
    <div class="navbar bg-base-100 shadow-sm p-6">
        <div class="flex-1 mt-5">
            <div class="flex justify-center text-2xl poppins-semibold">
                <span>&nbsp;<?php echo $row['username_vis']; ?>!</span>
            </div>

            <p class="text-gray-700 sm:col-span-2 dark:text-gray-200 justify-center flex"><?php echo $row['status_mahasiswa']; ?></p>
        </div>
        <div class="flex-none mt-5">

            <label for="my_modal_7" class="btn border-none bg-white">
                <div class="avatar">
                    <div class="w-20 rounded-full">
                        <img src="<?php echo htmlspecialchars($foto_profile); ?>" />
                    </div>
                </div>
            </label>

            <!-- Put this part before </body> tag -->
            <input type="checkbox" id="my_modal_7" class="modal-toggle" />
            <div class="modal" role="dialog">
                <div class="modal-box w-70 mx-auto">
                    <div class="modal-boxp-0 overflow-hidden">
                        <img src="<?php echo htmlspecialchars($foto_profile); ?>" alt="Gambar"
                            class="w-70 h-auto block rounded-lg" />
                    </div>
                </div>
                <label class="modal-backdrop" for="my_modal_7">Close</label>
            </div>
        </div>
    </div>

    <div class="mx-auto w-full sm:w-auto p-4 gap-4 grid grid-cols-1 sm:grid-cols-2">
        <form method="POST">
            <article class="flex bg-white transition hover:shadow-xl rounded-lg">
                <div class="hidden sm:block sm:basis-56">
                    <img
                        alt=""
                        src="https://images.unsplash.com/photo-1609557927087-f9cf8e88de18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                        class="aspect-square h-full w-full object-cover" />
                </div>

                <div class="flex flex-1 flex-col justify-between">
                    <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                        <a href="#">
                            <h3 class="font-bold text-gray-900 uppercase">
                                Ganti Username
                            </h3>
                        </a>

                        <div class="mt-4">
                            <div>
                                <label for="username" class="block text-sm font-medium mb-1 text-gray-700">Masukan Username Baru</label>
                                <div class="flex rounded-md shadow-sm">
                                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-100 text-gray-500 text-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                        </svg>
                                    </span>
                                    <input type="hidden" name="new_username" value="1">
                                    <input type="text" id="username" name="username" placeholder="jhon pork" required
                                        class="w-full rounded-r-md border border-gray-300 px-4 py-2 text-sm text-gray-700 focus:border-[#7C3AED] focus:ring-[#7C3AED] focus:outline-none" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex items-end justify-end">
                    <button
                        type="submit"
                        name="new_username"
                        class="block bg-[#7C3AED] px-5 py-3 text-center rounded-tl-xl text-xs font-bold text-white uppercase transition hover:bg-[#7E4FFF]">
                        Simpan
                    </button>
                </div>
            </article>
        </form>
            <article class="notif flex bg-white transition hover:shadow-xl rounded-lg h-full">
                <div class="hidden sm:block sm:basis-56">
                    <img
                        alt=""
                        src="https://images.unsplash.com/photo-1609557927087-f9cf8e88de18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80"
                        class="aspect-square h-full w-full object-cover" />
                </div>

                <div class="flex flex-1 flex-col justify-between">
                    <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
                        <div>
                            <h3 class="font-bold text-gray-900 uppercase">
                                Buat Password Baru/Lupa Password?
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="flex items-end justify-end">
                    <a
                        href="lupaPW.php"
                        type="submit"
                        class="block bg-[#7C3AED] px-5 py-3 text-center rounded-tl-xl text-xs font-bold text-white uppercase transition hover:bg-[#7E4FFF]">
                        Simpan
                    </a>
                </div>
            </article>

    </div>

    <script>
        <?php if (!empty($message)): ?>
            Swal.fire({
                icon: '<?php echo $status; ?>', // 'success' atau 'error'
                title: '<?php echo $status == "success" ? "Berhasil!" : "Oops..."; ?>',
                text: '<?php echo $message; ?>',
                footer: '<?php echo $status == "error" ? "Silakan coba lagi." : ""; ?>'
            }).then(() => {
                window.location.href = '<?php echo $status == "success" ? "profile.php" : "pengaturan.php"; ?>';
            });
        <?php endif; ?>

        function togglePassword() {
            const input = document.getElementById("old_password");
            input.type = input.type === "password" ? "text" : "password";
        }

        function new_togglePassword() {
            const input = document.getElementById("new_password");
            input.type = input.type === "password" ? "text" : "password";
        }
    </script>
</body>

</html>