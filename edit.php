<?php 
session_start(); // -> Harus ditambahkan ketika menggunakan session

if(!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

include('connect.php');

$id = $_GET['id'];

$queryData = "SELECT * FROM pengaduan WHERE id = '$id'";

$result = mysqli_query($conn, $queryData);

while($loop = mysqli_fetch_assoc($result)) {
    $data = $loop;
}

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $pesan = $_POST['pesan'];
    $pos = $_POST['pos'];

    $result = mysqli_query($conn, "UPDATE pengaduan SET nama_lengkap='$nama', pesan='$pesan', kode_pos='$pos' WHERE id=$id");

    if($result) {
        echo "<script>
            alert ('Data Berhasil Di Update')
            document.location.href='index.php'
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Di Update')
        </script>";
    }   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT REPORT</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        nav {
            background-color: #343a40;
            padding: 20px;
            border-radius: 10px;
            color: white;
            margin-top: 20px;
            text-align: center;
        }

        nav h1 {
            font-size: 2rem;
        }

        .navbar {
            margin-top: 20px;
        }

        .navbar a {
            color: white;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 15px;
            background-color: #007bff;
            border-radius: 5px;
        }

        .navbar a:hover {
            background-color: #0056b3;
        }

        .form-container {
            margin-top: 40px;
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            font-weight: bold;
            background-color: #28a745;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .navbar a {
                width: 100%;
                margin-bottom: 10px;
            }

            .form-container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <nav>
            <h1>Edit Report: <?= htmlspecialchars($data['nama_lengkap']) ?></h1>
            <div class="navbar">
                <a href="create.php">Isi Report</a>
                <a href="index.php">Report Saya</a>
            </div>
        </nav>

        <div class="form-container">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($data['nama_lengkap']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="pos">Kode Pos:</label>
                    <input type="number" name="pos" id="pos" value="<?= htmlspecialchars($data['kode_pos']) ?>" required>
                </div>

                <div class="form-group">
                    <label for="pesan">Pesan:</label>
                    <textarea name="pesan" id="pesan" rows="5" required><?= htmlspecialchars($data['pesan']) ?></textarea>
                </div>

                <button type="submit" name="submit">Simpan Perubahan</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
