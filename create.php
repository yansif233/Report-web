<?php
session_start(); // Harus ditambahkan ketika menggunakan session

if (!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

include('connect.php');

// Cek apakah form telah disubmit
if (isset($_POST['submit'])) {
    $id = '';  // Anda bisa menambahkan logika untuk ID jika diperlukan
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    $pos = $_POST['pos'];

    $query = mysqli_query($conn, "INSERT INTO pengaduan(id, nama_lengkap, pesan, kode_pos) VALUES ('$id', '$nama', '$pesan', '$pos')");

    if ($query) {
        header('location: index.php'); // Redirect setelah berhasil
        exit;
    }
}

// Ambil data yang dikirim sebelumnya jika ada (untuk form edit atau untuk menampilkan data yang hilang)
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$pesan = isset($_POST['pesan']) ? $_POST['pesan'] : '';
$pos = isset($_POST['pos']) ? $_POST['pos'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGADUAN MASYARAKAT</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        nav {
            margin-top: 20px;
            background-color: #343a40;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            color: white;
        }

        form {
            background: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        label {
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: 600;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <h1>PENGADUAN MASYARAKAT</h1>
            <a href="index.php" class="btn btn-light mt-2">Report Saya</a>
        </nav>

        <!-- Form untuk input data -->
        <form action="create.php" method="POST" class="mt-4">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($nama) ?>" required>
            </div>

            <div class="mb-3">
                <label for="pos" class="form-label">Kode Pos:</label>
                <input type="number" name="pos" id="pos" class="form-control" value="<?= htmlspecialchars($pos) ?>" required>
            </div>

            <div class="mb-3">
                <label for="pesan" class="form-label">Pesan:</label>
                <textarea name="pesan" id="pesan" class="form-control" rows="5" required><?= htmlspecialchars($pesan) ?></textarea>
            </div>

            <button type="submit" name="submit">Kirim</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
