<?php
$conn = new mysqli("localhost", "root", "", "kamp_ease");
$q = isset($_GET['q']) ? mysqli_real_escape_string($conn, $_GET['q']) : '';

// Query pencarian dari berbagai tabel
$hasil = [];

// Cari di tabel gedung
$sqlGedung = "SELECT 
                'gedung' AS sumber, 
                id, 
                nama_gedung AS nama, 
                deskripsi AS detail, 
                foto, 
                link_maps AS link, 
                operasional, 
                deskripsi AS details 
              FROM gedung 
              WHERE nama_gedung LIKE '%$q%' 
                 OR operasional LIKE '%$q%' 
                 OR deskripsi LIKE '%$q%'";

$resultGedung = $conn->query($sqlGedung);
while ($row = $resultGedung->fetch_assoc()) {
    $hasil[] = $row;
}

// Cari di tabel wifi
$sqlWifi = "SELECT 'wifi' AS sumber, id, nama_wifi AS nama, password_wifi AS detail, foto AS foto
            FROM wifi 
            WHERE nama_wifi LIKE '%$q%'";
$resultWifi = $conn->query($sqlWifi);
while ($row = $resultWifi->fetch_assoc()) {
    $hasil[] = $row;
}

$sqlAtm = "SELECT 'atm' AS sumber, id, nama_bank AS nama, deskripsi AS detail, foto AS foto
            FROM atm 
            WHERE nama_bank LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultAtm = $conn->query($sqlAtm);
while ($row = $resultAtm->fetch_assoc()) {
    $hasil[] = $row;
}

$sqlFotocopy = "SELECT 'fotokopi' AS sumber, id, nama_tempat AS nama, deskripsi AS detail, foto AS foto, jam_buka AS buka, jam_tutup AS tutup, link_maps AS link
            FROM fotokopi
            WHERE nama_tempat LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultFotocopy = $conn->query($sqlFotocopy);
while ($row = $resultFotocopy->fetch_assoc()) {
    $hasil[] = $row;
}

$sqlKantin = "SELECT 'kantin' AS sumber, id, nama_kantin AS nama, deskripsi AS detail, foto AS foto, link_maps AS link
            FROM kantin
            WHERE nama_kantin LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultKantin = $conn->query($sqlKantin);
while ($row = $resultKantin->fetch_assoc()) {
    $hasil[] = $row;
}

$sqlKantin = "SELECT 'lapangan' AS sumber, id, nama_lapangan AS nama, deskripsi AS detail, foto AS foto, link_maps AS link
            FROM lapangan
            WHERE nama_lapangan LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultLapangan = $conn->query($sqlKantin);
while ($row = $resultLapangan->fetch_assoc()) {
    $hasil[] = $row;
}

$sqlMasjid = "SELECT 'masjid' AS sumber, id, nama_masjid AS nama, deskripsi AS detail, foto AS foto, link_maps AS link
        FROM masjid
        WHERE nama_masjid LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultMasjid = $conn->query($sqlMasjid);
while ($row = $resultMasjid->fetch_assoc()){
        $hasil[] = $row;
}

$sqlMinimarket = "SELECT 'minimarket' AS sumber, id, nama_minimarket AS nama, deskripsi AS detail, foto AS foto, link_maps AS link, jam_buka AS buka, jam_tutup AS tutup
        FROM minimarket
        WHERE nama_minimarket LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultMinmar = $conn->query($sqlMinimarket);
while ($row = $resultMinmar -> fetch_assoc()){
    $hasil[] = $row;
}

$sqlParkiran = "SELECT 'parkiran' AS sumber, id, nama_parkiran AS nama, deskripsi AS detail, foto AS foto, link_maps AS link
        FROM parkiran
        WHERE nama_parkiran LIKE '%$q%' OR deskripsi LIKE '%$q%'";
$resultParkiran = $conn->query($sqlParkiran);
while ($row = $resultParkiran->fetch_assoc()){
        $hasil[] = $row;
}

// Tambahkan query untuk komentar jika perlu, dan tabel lainnya...

?>

<html lang="en" class="bg-[#F3F4F6]">
<!DOCTYPE html>

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
</head>


<body class="min-h-screen flex flex-col items-center justify-start mx-auto">

    <!-- Tombol Back di pojok kiri atas -->

    <div class="navbar bg-base-100 shadow-sm">
        <a href="javascript:history.back()"
            class="absolute top-4 left-4 z-50 flex items-center space-x-2 bg-white shadow-md rounded-full px-4 py-2 text-gray-800 hover:bg-gray-100 transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
        </a>

        <div class="flex-1 justify-self-center items-center text-center mt-4">
            <h2 class="sm:text-xl text-lg text-center font-semibold mb-4">Hasil Pencarian untuk <?= htmlspecialchars($q) ?></h2>
        </div>
    </div>
    <?php if (count($hasil) > 0): ?>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 w-full max-w-6xl mb-4 mt-10">
            <?php foreach ($hasil as $item): ?>
                <div href="#" class="card block rounded-lg p-4 bg-white" style="box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;">
                    <img
                        alt=""
                        src="<?= htmlspecialchars($item['foto']) ?>"
                        class="h-56 w-full rounded-md object-cover" />

                    <div class="mt-2">
                        <dl>
                            <div>
                                <dt class="sr-only"></dt>

                                <dd class="text-sm text-gray-500"><?= ucfirst($item['sumber']) ?></dd>
                            </div>

                            <div>
                                <dt class="sr-only">Nama</dt>

                                <dd class="font-medium"><?= ucfirst($item['nama']) ?></dd>
                            </div>
                        </dl>

                        <?php if ($item['sumber'] === 'wifi'): ?>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">Password: <?= htmlspecialchars($item['detail']) ?></p>
                            </div>
                        
                        <?php elseif ($item['sumber'] === 'kantin' || $item['sumber'] ==='lapangan' || $item['sumber']==='masjid' || $item['sumber'] ==='parkiran'): ?>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500"><?= htmlspecialchars($item['detail']) ?></p>
                            </div>

                        <?php elseif ($item['sumber'] === 'fotokopi' || $item['sumber'] === 'minimarket'): ?>
                            <div class="mt-6 flex items-center gap-8">
                                <p class="mt-1 text-sm text-gray-700">
                                    <?= htmlspecialchars($item['detail']) ?>
                                </p>
                            </div>
                            <dl class="mt-6 flex gap-4 lg:gap-6">
                                <div>
                                    <dt class="text-sm font-medium text-gray-700">Buka</dt>
                                    <dd class="text-xs text-gray-700"><?= htmlspecialchars($item['buka']) ?></dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-700">Tutup</dt>
                                    <dd class="text-xs text-gray-700"><?= htmlspecialchars($item['tutup']) ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-700">Link Maps</dt>
                                    <dd class="text-xs text-gray-700">
                                        <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" class="text-blue-500 hover:underline">Lihat di Maps</a>
                                </div>
                            </dl>

                            <?php elseif ($item['sumber'] === 'gedung'): ?>
                            <div class="mt-6 flex items-center gap-8">
                                <p class="mt-1 text-sm text-gray-700">
                                    <?= htmlspecialchars($item['detail']) ?>
                                </p>
                            </div>
                            <dl class="mt-6 flex gap-4 lg:gap-6">
                                <div>
                                    <dt class="text-sm font-medium text-gray-700">Operasional</dt>
                                    <dd class="text-xs text-gray-700"><?= htmlspecialchars($item['operasional']) ?></dd>
                                </div>

                                <div>
                                    <dt class="text-sm font-medium text-gray-700">Link Maps</dt>
                                    <dd class="text-xs text-gray-700">
                                        <a href="<?= htmlspecialchars($item['link']) ?>" target="_blank" class="text-blue-500 hover:underline">Lihat di Maps</a>
                                </div>
                            </dl>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <p class="text-gray-500">Tidak ada hasil ditemukan.</p>
    <?php endif; ?>

</body>

</html>