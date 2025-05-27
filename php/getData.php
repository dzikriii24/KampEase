<?php
$koneksi = new mysqli("localhost", "root", "", "kamp_ease");

$type = isset($_GET['type']) ? $_GET['type'] : '';

$tableMap = [
    'atm' => 'atm',
    'gedung' => 'gedung',
    'fotokopi' => 'fotokopi',
    'kantin' => 'kantin',
    'lapangan' => 'lapangan',
];

if (array_key_exists($type, $tableMap)) {
    $query = $koneksi->query("SELECT * FROM " . $tableMap[$type]);

    $data = array();
    while ($row = $query->fetch_assoc()) {
        $data[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    // jika parameter tidak valid
    http_response_code(400);
    echo json_encode(["error" => "Tipe data tidak dikenali"]);
}
?>
