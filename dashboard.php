<?php
// dashboard.php

// Assume DB connection (include 'config.php'; with $conn = mysqli_connect(...); based on eantrean_db.sql)
include 'includes/sidebar.php';

// Placeholder queries (replace with actual logic)
$total_antrean_hari_ini = 10; // e.g., SELECT COUNT(*) FROM antrean WHERE DATE(created_at) = CURDATE()
$antrean_dipanggil = 3; // SELECT COUNT(*) FROM antrean WHERE status = 'dipanggil'
$loket_aktif = 5; // SELECT COUNT(*) FROM loket WHERE is_active = 1
$antrean_selesai = 7; // SELECT COUNT(*) FROM antrean WHERE status = 'selesai' AND DATE(created_at) = CURDATE()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - eAntrean</title>
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
            <h1 class="text-xl font-bold">Dashboard</h1>
        </div>
        <div class="flex items-center">
            <span class="mr-4">Nama Pengguna</span>
            <button id="dark-mode-toggle">
                <i data-lucide="moon" class="w-6 h-6"></i>
            </button>
        </div>
    </header>

    <!-- Sidebar include -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="md:ml-64 p-6">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold">Total Antrean Hari Ini</h3>
                <p class="text-3xl"><?php echo $total_antrean_hari_ini; ?></p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold">Antrean Dipanggil</h3>
                <p class="text-3xl"><?php echo $antrean_dipanggil; ?></p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold">Loket Aktif</h3>
                <p class="text-3xl"><?php echo $loket_aktif; ?></p>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h3 class="text-lg font-semibold">Antrean Selesai</h3>
                <p class="text-3xl"><?php echo $antrean_selesai; ?></p>
            </div>
        </div>
        <div class="mt-8 bg-white rounded-xl shadow-md p-6">
            <h2 class="text-2xl font-bold mb-4">Statistik Penggunaan Mingguan</h2>
            <!-- Placeholder for chart -->
            <div class="h-64 bg-gray-200 flex items-center justify-center">Grafik Placeholder</div>
        </div>
    </main>

    <script>
        lucide.createIcons();
        // Toggle sidebar
        document.getElementById('toggle-sidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });
        // Dark mode toggle (placeholder)
        document.getElementById('dark-mode-toggle').addEventListener('click', () => {
            document.body.classList.toggle('dark');
        });
    </script>
</body>
</html>