<?php
// includes/sidebar.php

// Assume session started and user/org data available
session_start();
$active_page = basename($_SERVER['PHP_SELF'], ".php"); // To highlight active menu
$org_name = isset($_SESSION['org_name']) ? $_SESSION['org_name'] : 'Organisasi Saya'; // Placeholder
?>

<aside id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full bg-blue-600 text-white md:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto">
        <div class="flex items-center mb-8">
            <h1 class="text-2xl font-bold">eAntrean</h1>
        </div>
        <ul class="space-y-2">
            <li>
                <a href="dashboard.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'dashboard' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="layout-dashboard" class="w-6 h-6 mr-3"></i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="antrean_aktif.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'antrean_aktif' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="activity" class="w-6 h-6 mr-3"></i>
                    Antrean Aktif
                </a>
            </li>
            <li>
                <a href="buat_antrean.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'buat_antrean' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="plus-circle" class="w-6 h-6 mr-3"></i>
                    Buat Antrean / Loket Baru
                </a>
            </li>
            <li>
                <a href="riwayat_antrean.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'riwayat_antrean' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="history" class="w-6 h-6 mr-3"></i>
                    Riwayat Antrean
                </a>
            </li>
            <li>
                <a href="pengaturan.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'pengaturan' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="settings" class="w-6 h-6 mr-3"></i>
                    Pengaturan
                </a>
            </li>
            <li>
                <a href="anggota.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'anggota' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="users" class="w-6 h-6 mr-3"></i>
                    Anggota / Pengguna
                </a>
            </li>
            <li>
                <a href="laporan.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700 <?php echo $active_page == 'laporan' ? 'bg-blue-700' : ''; ?>">
                    <i data-lucide="bar-chart" class="w-6 h-6 mr-3"></i>
                    Laporan
                </a>
            </li>
            <li>
                <a href="php/logout.php" class="flex items-center p-2 rounded-lg hover:bg-blue-700">
                    <i data-lucide="log-out" class="w-6 h-6 mr-3"></i>
                    Logout
                </a>
            </li>
        </ul>
        <div class="absolute bottom-4 left-4 text-sm">
            <?php echo $org_name; ?>
        </div>
    </div>
</aside>