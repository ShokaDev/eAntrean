<?php
// anggota.php

include 'includes/sidebar.php';

// Placeholder data (query: SELECT u.*, om.role FROM users u JOIN organization_members om ON u.id = om.user_id WHERE om.org_id = ?)
$anggota_list = [
    ['nama' => 'John Doe', 'email' => 'john@example.com', 'role' => 'admin'],
    // etc.
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anggota / Pengguna - eAntrean</title>
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
            <h1 class="text-xl font-bold">Anggota / Pengguna</h1>
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
            <h2 class="text-2xl font-bold mb-4">Daftar Anggota</h2>
            <button id="add-member" class="bg-blue-600 text-white px-4 py-2 rounded mb-4">Tambah Anggota Baru</button>
            <table class="w-full table-auto">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Nama Pengguna</th>
                        <th class="p-2">Email</th>
                        <th class="p-2">Peran</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($anggota_list as $anggota): ?>
                    <tr>
                        <td class="p-2"><?php echo $anggota['nama']; ?></td>
                        <td class="p-2"><?php echo $anggota['email']; ?></td>
                        <td class="p-2"><?php echo $anggota['role']; ?></td>
                        <td class="p-2">
                            <button class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                            <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- Modal Placeholder -->
        <div id="modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white p-6 rounded-xl">
                <h3>Tambah Anggota</h3>
                <!-- Form here -->
                <button id="close-modal">Tutup</button>
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
        // Modal JS
        document.getElementById('add-member').addEventListener('click', () => {
            document.getElementById('modal').classList.remove('hidden');
        });
        document.getElementById('close-modal').addEventListener('click', () => {
            document.getElementById('modal').classList.add('hidden');
        });
    </script>
</body>
</html>