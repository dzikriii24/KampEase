<?php
$koneksi = new mysqli("localhost", "root", "", "kamp_ease");
$query = $koneksi->query("SELECT * FROM wifi");

$data = array();
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}
echo json_encode($data);
?>
