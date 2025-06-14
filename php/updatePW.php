<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
session_start();

$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$username = $_SESSION['user_id']; // Ambil username dari session


// Ambil password lama dari database
$query = "SELECT password FROM user WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data) {
    $password_db = $data['password'];

    // Cek apakah password lama cocok (gunakan password_verify kalau password-nya hashed)
    if (password_verify($old_password, $password_db)) {

        // Hash password baru
        $newHashedPassword = password_hash($new_password, PASSWORD_DEFAULT);

        // Update password
        $update = "UPDATE user SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($update);
        $stmt->bind_param("ss", $newHashedPassword, $username);

        if ($stmt->execute()) {
            echo "✅ Password berhasil diubah.";
        } else {
            echo "❌ Gagal mengubah password: " . $stmt->error;
        }
    } else {
        echo "⚠️ Password lama tidak cocok!";
    }
} else {
    echo "❌ User tidak ditemukan.";
}

$stmt->close();
