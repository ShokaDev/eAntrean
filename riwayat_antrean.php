<?php
// riwayat_antrean.php

include 'includes/sidebar.php';

// Placeholder data (query: SELECT * FROM antrean WHERE status IN ('selesai', 'dibatalkan') ORDER BY finished_at DESC)
$riwayat_list = [
    ['nomor' => 'A001', 'datang' => '10:00', 'panggil' => '10:05', 'durasi' => '5 min', 'status' => 'Selesai'],
    // etc.
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Antrean - eAntrean</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow-md p-4 flex justify-between items-center">
        <div class="flex items-center">
            <button id="toggle-sidebar" class="md:hidden mr-4">
                <i data-lucide="menu" class="w-6 h-6"></i>
            </button>
            <h1 class="text-xl font-bold">Riwayat Antrean</h1>
        </div>
        <div class="flex items-center">
            <span class="mr-4">Nama Pengguna</span>
            <button id="dark-mode-toggle">
                <i data-lucide="moon" class="w-6 h-6"></i>
            </button>
        </div>
    </header>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="md:ml-64 p-6">
        <div class="bg-white rounded-xl shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Daftar Riwayat Antrean</h2>
            <div class="mb-4 flex">
                <select class="border rounded p-2 mr-2">
                    <option>Filter Tanggal</option>
                </select>
                <button class="bg-blue-600 text-white px-4 py-2 rounded">Export ke PDF</button>
            </div>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Nomor Antrean</th>
                        <th class="p-2">Waktu Datang</th>
                        <th class="p-2">Waktu Dipanggil</th>
                        <th class="p-2">Durasi</th>
                        <th class="p-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($riwayat_list as $riwayat): ?>
                    <tr>
                        <td class="p-2"><?php echo $riwayat['nomor']; ?></td>
                        <td class="p-2"><?php echo $riwayat['datang']; ?></td>
                        <td class="p-2"><?php echo $riwayat['panggil']; ?></td>
                        <td class="p-2"><?php echo $riwayat['durasi']; ?></td>
                        <td class="p-2"><?php echo $riwayat['status']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </main>

    <script>
        lucide.createIcons();
        document.getElementById('toggle-sidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });
        document.getElementById('dark-mode-toggle').addEventListener('click', () => {
            document.body.classList.toggle('dark');
        });
    </script>
</body>
</html>