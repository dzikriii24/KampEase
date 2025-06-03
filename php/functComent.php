<?php
session_start();
$conn = new mysqli("localhost", "root", "", "kamp_ease");

if (!isset($_SESSION['user_id'])) {
    die("Akses ditolak. Silakan login terlebih dahulu.");
}

$user_id = $_SESSION['user_id'];
$username = $_SESSION['username'];
// Ambil data komentar dan rating dari form
$komentar = $_POST['komentar'] ?? '';
$rating = $_POST['rating'] ?? '';


if (!empty($_POST['rating']) && !empty($_POST['komentar'])) {
    // proses simpan ke database
} else {
    echo "Data tidak lengkap. Rating atau komentar kosong.";
}

if (isset($_POST['komentar'], $_POST['rating']) && isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id']; // pastikan user login
    $komentar = htmlspecialchars($_POST['komentar']);
    $rating = intval($_POST['rating']);

    $stmt = $conn->prepare("INSERT INTO komentar (user_id, komentar, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $user_id, $komentar, $rating);

    if ($stmt->execute()) {
        header("Location: komentar.php?success=1"); // redirect setelah kirim komentar
    } else {
        echo "Gagal menyimpan komentar.";
    }

    $stmt->close();
} else {
    echo "Data tidak lengkap atau belum login.";
}



?>
