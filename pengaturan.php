<?php
// pengaturan.php

include 'includes/sidebar.php';

// Placeholder data from organizations and settings tables (SELECT * FROM organizations JOIN settings ON ...)
$org_name = 'Organisasi Saya';
$logo = '';
$theme = 'light';
$voice = 'female';
$call_format = 'Nomor antrian {nomor}, silakan ke {loket}.';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - eAntrean</title>
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
            <h1 class="text-xl font-bold">Pengaturan</h1>
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
            <h2 class="text-2xl font-bold mb-4">Pengaturan Organisasi</h2>
            <form action="" method="POST"> <!-- Action to UPDATE organizations and settings -->
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Nama Organisasi</label>
                    <input type="text" name="name" value="<?php echo $org_name; ?>" class="w-full border rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Logo</label>
                    <input type="file" name="logo" class="w-full border rounded p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Tema Warna</label>
                    <select name="theme" class="w-full border rounded p-2">
                        <option value="light" <?php echo $theme == 'light' ? 'selected' : ''; ?>>Light</option>
                        <option value="dark" <?php echo $theme == 'dark' ? 'selected' : ''; ?>>Dark</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Jenis Suara</label>
                    <select name="voice_type" class="w-full border rounded p-2">
                        <option value="male" <?php echo $voice == 'male' ? 'selected' : ''; ?>>Laki-laki</option>
                        <option value="female" <?php echo $voice == 'female' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Format Pemanggilan</label>
                    <input type="text" name="call_format" value="<?php echo $call_format; ?>" class="w-full border rounded p-2">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan Pengaturan</button>
            </form>
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