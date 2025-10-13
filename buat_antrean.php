<?php
// buat_antrean.php
require_once 'includes/config.php';
var_dump($_SESSION);
exit;

requireLogin();

$user_data = getUserData($conn);
$org_id = $_SESSION['org_id'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $service_type = trim($_POST['service_type'] ?? '');
    $prefix_code = strtoupper(trim($_POST['prefix_code'] ?? 'A'));
    
    if ($name && $service_type && $prefix_code) {
        $query = "INSERT INTO loket (org_id, name, service_type, prefix_code, is_active, created_at) 
                  VALUES (?, ?, ?, ?, 1, NOW())";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "isss", $org_id, $name, $service_type, $prefix_code);
        
        if (mysqli_stmt_execute($stmt)) {
            logAction($conn, 'Tambah Loket', "Nama: $name, Kode: $prefix_code");
            $_SESSION['success'] = 'Loket berhasil ditambahkan';
            header('Location: buat_antrean.php');
            exit();
        } else {
            $_SESSION['error'] = 'Gagal menambahkan loket';
        }
    } else {
        $_SESSION['error'] = 'Semua field harus diisi';
    }
}

// Get existing lokets
$query = "SELECT * FROM loket WHERE org_id = ? ORDER BY created_at DESC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $org_id);
mysqli_stmt_execute($stmt);
$loket_list = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Loket Baru - eAntrean</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body class="bg-gray-50">
    <!-- Header -->
    <header class="bg-white shadow-sm fixed top-0 right-0 left-0 md:left-64 z-30">
        <div class="flex justify-between items-center px-6 py-4">
            <div class="flex items-center">
                <button id="toggle-sidebar" class="md:hidden mr-4 text-gray-600 hover:text-gray-900">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Buat Loket Baru</h1>
                    <p class="text-sm text-gray-500">Tambah loket layanan baru</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="hidden md:block text-right">
                    <p class="text-sm font-medium text-gray-700"><?php echo htmlspecialchars($user_data['name']); ?></p>
                    <p class="text-xs text-gray-500 capitalize"><?php echo htmlspecialchars($user_data['org_role']); ?></p>
                </div>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <?php include 'includes/sidebar.php'; ?>

    <!-- Main Content -->
    <main class="md:ml-64 pt-20 px-6 pb-6">
        <div class="max-w-6xl mx-auto">
            <!-- Messages -->
            <?php if (isset($_SESSION['success'])): ?>
            <div class="mb-6 bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-xl flex items-center justify-between">
                <div class="flex items-center">
                    <i data-lucide="check-circle" class="w-5 h-5 mr-2"></i>
                    <span><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['error'])): ?>
            <div class="mb-6 bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-center justify-between">
                <div class="flex items-center">
                    <i data-lucide="alert-circle" class="w-5 h-5 mr-2"></i>
                    <span><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></span>
                </div>
                <button onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800">
                    <i data-lucide="x" class="w-5 h-5"></i>
                </button>
            </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Form Card -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center mb-6">
                        <div class="bg-blue-100 p-3 rounded-xl mr-4">
                            <i data-lucide="plus-circle" class="w-6 h-6 text-blue-600"></i>
                        </div>
                        <h2 class="text-xl font-bold text-gray-800">Form Tambah Loket</h2>
                    </div>
                    
                    <form method="POST" class="space-y-5">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Nama Loket / Ruangan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="name" required 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                   placeholder="Contoh: Loket 1, Loket Administrasi">
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Jenis Layanan <span class="text-red-500">*</span>
                            </label>
                            <select name="service_type" required 
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                                <option value="">Pilih Jenis Layanan</option>
                                <option value="Pendaftaran">Pendaftaran</option>
                                <option value="Konsultasi">Konsultasi</option>
                                <option value="Pembayaran">Pembayaran</option>
                                <option value="Administrasi">Administrasi</option>
                                <option value="Informasi">Informasi</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">
                                Kode Awalan Nomor <span class="text-red-500">*</span>
                            </label>
                            <input type="text" name="prefix_code" required maxlength="5" 
                                   class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all uppercase"
                                   placeholder="Contoh: A, B, LOK1"
                                   value="A">
                            <p class="mt-2 text-xs text-gray-500">
                                <i data-lucide="info" class="w-3 h-3 inline mr-1"></i>
                                Nomor antrean akan menjadi: [KODE][NOMOR] (Contoh: A001, B001)
                            </p>
                        </div>

                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold py-3 rounded-lg transition-all transform hover:scale-[1.02] flex items-center justify-center">
                            <i data-lucide="save" class="w-5 h-5 mr-2"></i>
                            Simpan Loket
                        </button>
                    </form>
                </div>

                <!-- Existing Lokets List -->
                <div class="bg-white rounded-2xl shadow-lg p-6">
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center">
                            <div class="bg-purple-100 p-3 rounded-xl mr-4">
                                <i data-lucide="list" class="w-6 h-6 text-purple-600"></i>
                            </div>
                            <h2 class="text-xl font-bold text-gray-800">Daftar Loket</h2>
                        </div>
                        <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                            <?php echo mysqli_num_rows($loket_list); ?> Loket
                        </span>
                    </div>

                    <div class="space-y-3 max-h-[500px] overflow-y-auto">
                        <?php if (mysqli_num_rows($loket_list) > 0): ?>
                            <?php while ($loket = mysqli_fetch_assoc($loket_list)): ?>
                            <div class="border border-gray-200 rounded-xl p-4 hover:shadow-md transition-shadow">
                                <div class="flex items-center justify-between">
                                    <div class="flex-1">
                                        <div class="flex items-center mb-2">
                                            <span class="bg-blue-600 text-white px-3 py-1 rounded-lg text-sm font-bold mr-3">
                                                <?php echo htmlspecialchars($loket['prefix_code']); ?>
                                            </span>
                                            <h3 class="font-semibold text-gray-800">
                                                <?php echo htmlspecialchars($loket['name']); ?>
                                            </h3>
                                        </div>
                                        <p class="text-sm text-gray-600 flex items-center">
                                            <i data-lucide="briefcase" class="w-4 h-4 mr-1"></i>
                                            <?php echo htmlspecialchars($loket['service_type']); ?>
                                        </p>
                                        <p class="text-xs text-gray-500 mt-1">
                                            Dibuat: <?php echo date('d M Y', strtotime($loket['created_at'])); ?>
                                        </p>
                                    </div>
                                    <div class="flex flex-col items-end space-y-2">
                                        <?php if ($loket['is_active']): ?>
                                        <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-xs font-semibold">
                                            Aktif
                                        </span>
                                        <?php else: ?>
                                        <span class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-xs font-semibold">
                                            Nonaktif
                                        </span>
                                        <?php endif; ?>
                                        <button onclick="toggleLoket(<?php echo $loket['id']; ?>, <?php echo $loket['is_active']; ?>)"
                                                class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                            <i data-lucide="edit" class="w-4 h-4 inline mr-1"></i>
                                            Toggle
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="text-center py-8 text-gray-500">
                                <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-3 text-gray-400"></i>
                                <p>Belum ada loket. Tambahkan loket pertama Anda!</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
        
        document.getElementById('toggle-sidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });

        function toggleLoket(id, currentStatus) {
            if (confirm('Yakin ingin mengubah status loket ini?')) {
                // Create form and submit
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = 'toggle_loket.php';
                
                const idInput = document.createElement('input');
                idInput.type = 'hidden';
                idInput.name = 'loket_id';
                idInput.value = id;
                
                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'new_status';
                statusInput.value = currentStatus ? '0' : '1';
                
                form.appendChild(idInput);
                form.appendChild(statusInput);
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
</body>
</html>