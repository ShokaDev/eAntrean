<?php
// laporan.php

include 'includes/sidebar.php';

// Placeholder stats (aggregate queries from antrean and loket tables)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan - eAntrean</title>
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
            <h1 class="text-xl font-bold">Laporan</h1>
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
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Antrean Per Hari</h2>
                <div class="h-64 bg-gray-200 flex items-center justify-center">Grafik Placeholder</div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6">
                <h2 class="text-2xl font-bold mb-4">Rata-rata Durasi Antrean</h2>
                <div class="h-64 bg-gray-200 flex items-center justify-center">Grafik Placeholder</div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-6 md:col-span-2">
                <h2 class="text-2xl font-bold mb-4">Jumlah Antrean Per Loket</h2>
                <div class="h-64 bg-gray-200 flex items-center justify-center">Grafik Placeholder</div>
            </div>
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