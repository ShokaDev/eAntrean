<?php
// antrean_aktif.php
require_once 'includes/config.php';
requireLogin();

$user_data = getUserData($conn);
$org_id = $_SESSION['org_id'];

// Handle actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $antrean_id = $_POST['antrean_id'] ?? 0;
    
    if ($action === 'panggil' && $antrean_id) {
        $query = "UPDATE antrean SET status = 'dipanggil', called_at = NOW() WHERE id = ? AND org_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $antrean_id, $org_id);
        if (mysqli_stmt_execute($stmt)) {
            logAction($conn, 'Panggil Antrean', "ID: $antrean_id");
            $_SESSION['success'] = 'Antrean berhasil dipanggil';
        }
    } elseif ($action === 'lewati' && $antrean_id) {
        $query = "UPDATE antrean SET status = 'dilewati' WHERE id = ? AND org_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $antrean_id, $org_id);
        if (mysqli_stmt_execute($stmt)) {
            logAction($conn, 'Lewati Antrean', "ID: $antrean_id");
            $_SESSION['success'] = 'Antrean berhasil dilewati';
        }
    } elseif ($action === 'selesai' && $antrean_id) {
        $query = "UPDATE antrean SET status = 'selesai', finished_at = NOW() WHERE id = ? AND org_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $antrean_id, $org_id);
        if (mysqli_stmt_execute($stmt)) {
            logAction($conn, 'Selesaikan Antrean', "ID: $antrean_id");
            $_SESSION['success'] = 'Antrean berhasil diselesaikan';
        }
    } elseif ($action === 'batal' && $antrean_id) {
        $query = "UPDATE antrean SET status = 'dibatalkan', finished_at = NOW() WHERE id = ? AND org_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ii", $antrean_id, $org_id);
        if (mysqli_stmt_execute($stmt)) {
            logAction($conn, 'Batalkan Antrean', "ID: $antrean_id");
            $_SESSION['success'] = 'Antrean berhasil dibatalkan';
        }
    }
    
    header('Location: antrean_aktif.php');
    exit();
}

// Get active queue list
$query = "SELECT a.*, l.name as loket_name, l.prefix_code 
          FROM antrean a 
          JOIN loket l ON a.loket_id = l.id 
          WHERE a.org_id = ? AND a.status IN ('menunggu', 'dipanggil', 'dilewati') 
          ORDER BY a.created_at ASC";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $org_id);
mysqli_stmt_execute($stmt);
$antrean_list = mysqli_stmt_get_result($stmt);

// Get current called queue
$query = "SELECT a.*, l.name as loket_name 
          FROM antrean a 
          JOIN loket l ON a.loket_id = l.id 
          WHERE a.org_id = ? AND a.status = 'dipanggil' 
          ORDER BY a.called_at DESC LIMIT 1";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $org_id);
mysqli_stmt_execute($stmt);
$current_queue = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrean Aktif - eAntrean</title>
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
                    <h1 class="text-2xl font-bold text-gray-800">Antrean Aktif</h1>
                    <p class="text-sm text-gray-500">Kelola dan panggil antrean</p>
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
        <!-- Success Message -->
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

        <!-- Current Queue Display -->
        <?php if ($current_queue): ?>
        <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-2xl shadow-xl p-8 mb-8 text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm opacity-90 mb-2">Sedang Dipanggil</p>
                    <div class="flex items-center space-x-4">
                        <h2 class="text-6xl font-bold"><?php echo htmlspecialchars($current_queue['nomor']); ?></h2>
                        <div>
                            <p class="text-xl font-semibold"><?php echo htmlspecialchars($current_queue['loket_name']); ?></p>
                            <p class="text-sm opacity-75"><?php echo date('H:i', strtotime($current_queue['called_at'])); ?></p>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-3">
                    <form method="POST" class="inline">
                        <input type="hidden" name="action" value="selesai">
                        <input type="hidden" name="antrean_id" value="<?php echo $current_queue['id']; ?>">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl font-medium transition-colors flex items-center">
                            <i data-lucide="check" class="w-5 h-5 mr-2"></i>
                            Selesai
                        </button>
                    </form>
                    <button onclick="callAgain('<?php echo htmlspecialchars($current_queue['nomor']); ?>', '<?php echo htmlspecialchars($current_queue['loket_name']); ?>')" class="bg-white bg-opacity-20 hover:bg-opacity-30 text-white px-6 py-3 rounded-xl font-medium transition-colors flex items-center">
                        <i data-lucide="volume-2" class="w-5 h-5 mr-2"></i>
                        Panggil Ulang
                    </button>
                </div>
            </div>
        </div>
        <?php else: ?>
        <div class="bg-gray-100 rounded-2xl shadow-lg p-8 mb-8 text-center">
            <i data-lucide="clock" class="w-16 h-16 text-gray-400 mx-auto mb-4"></i>
            <p class="text-gray-600 text-lg">Tidak ada antrean yang sedang dipanggil</p>
        </div>
        <?php endif; ?>

        <!-- Queue List -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">Daftar Antrean</h2>
                <div class="flex space-x-2">
                    <span class="px-3 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium">
                        <?php echo mysqli_num_rows($antrean_list); ?> Menunggu
                    </span>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nomor Antrean</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Loket</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Waktu Datang</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php 
                        mysqli_data_seek($antrean_list, 0);
                        if (mysqli_num_rows($antrean_list) > 0): 
                            while ($antrean = mysqli_fetch_assoc($antrean_list)): 
                        ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="text-2xl font-bold text-blue-600"><?php echo htmlspecialchars($antrean['nomor']); ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="font-medium text-gray-800"><?php echo htmlspecialchars($antrean['loket_name']); ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-gray-600"><?php echo date('H:i', strtotime($antrean['created_at'])); ?></span>
                            </td>
                            <td class="px-6 py-4">
                                <?php 
                                $status_colors = [
                                    'menunggu' => 'bg-yellow-100 text-yellow-800',
                                    'dipanggil' => 'bg-green-100 text-green-800',
                                    'dilewati' => 'bg-gray-100 text-gray-800'
                                ];
                                $status_text = [
                                    'menunggu' => 'Menunggu',
                                    'dipanggil' => 'Dipanggil',
                                    'dilewati' => 'Dilewati'
                                ];
                                ?>
                                <span class="px-3 py-1 rounded-full text-xs font-semibold <?php echo $status_colors[$antrean['status']]; ?>">
                                    <?php echo $status_text[$antrean['status']]; ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <?php if ($antrean['status'] === 'menunggu' || $antrean['status'] === 'dilewati'): ?>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="action" value="panggil">
                                        <input type="hidden" name="antrean_id" value="<?php echo $antrean['id']; ?>">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                                            <i data-lucide="phone" class="w-4 h-4 mr-1"></i>
                                            Panggil
                                        </button>
                                    </form>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="action" value="lewati">
                                        <input type="hidden" name="antrean_id" value="<?php echo $antrean['id']; ?>">
                                        <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                                            <i data-lucide="skip-forward" class="w-4 h-4 mr-1"></i>
                                            Lewati
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                    <form method="POST" class="inline" onsubmit="return confirm('Yakin ingin membatalkan antrean ini?')">
                                        <input type="hidden" name="action" value="batal">
                                        <input type="hidden" name="antrean_id" value="<?php echo $antrean['id']; ?>">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center">
                                            <i data-lucide="x" class="w-4 h-4 mr-1"></i>
                                            Batal
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                        else: 
                        ?>
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-gray-500">
                                <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-3 text-gray-400"></i>
                                <p>Tidak ada antrean aktif</p>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        lucide.createIcons();
        
        document.getElementById('toggle-sidebar').addEventListener('click', () => {
            document.getElementById('sidebar').classList.toggle('-translate-x-full');
        });

        function callAgain(nomor, loket) {
            // Text-to-speech functionality
            const text = `Nomor antrian ${nomor}, silakan ke ${loket}`;
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'id-ID';
            utterance.rate = 0.9;
            speechSynthesis.speak(utterance);
        }

        // Auto refresh every 10 seconds
        setTimeout(() => {
            location.reload();
        }, 10000);
    </script>
</body>
</html>