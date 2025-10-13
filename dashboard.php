<!-- dashboard.php -->
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'includes/db.php';
$user_id = $_SESSION['user_id'];

// Fetch organizations
$orgs = [];
$stmt = $conn->prepare("SELECT o.id, o.name, o.type FROM organizations o JOIN organization_members om ON o.id = om.org_id WHERE om.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $orgs[] = $row;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - eAntrean</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="bg-gray-100">
    <?php include 'includes/header.php'; ?>
    <div class="flex">
        <?php include 'includes/sidebar.php'; ?>
        <main class="flex-1 p-6">
            <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
            <p>Selamat datang di dashboard eAntrean.</p>
            <!-- Add more dashboard content here -->
        </main>
    </div>

    <!-- Popup for Create Organization -->
    <div id="createOrgModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-6 rounded shadow-md w-96">
            <h3 class="text-xl font-bold mb-4">Buat Organisasi Baru</h3>
            <form action="php/create_org.php" method="POST">
                <input type="text" name="name" placeholder="Nama Organisasi" class="w-full p-2 mb-4 border rounded" required>
                <select name="type" class="w-full p-2 mb-4 border rounded" required>
                    <option value="">Pilih Tipe</option>
                    <option value="Rumah Sakit">Rumah Sakit</option>
                    <option value="Restoran">Restoran</option>
                    <option value="Kantor Pemerintah">Kantor Pemerintah</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                <button type="submit" class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700">Buat</button>
            </form>
            <button onclick="closeModal()" class="mt-2 text-gray-600">Tutup</button>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>
</html>