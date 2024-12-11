<?php
session_start();

if (!isset($_SESSION['login'])) {
    header('location: auth/login.php');
    exit;
}

require('connect.php');

$query = mysqli_query($conn, 'SELECT * FROM pengaduan');

$i = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaduan Masyarakat</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar {
            margin-top: 20px;
        }

        table {
            margin-top: 30px;
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-action {
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark rounded">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Pengaduan Masyarakat</a>
                <div class="d-flex">
                    <a href="create.php" class="btn btn-outline-light me-2">Isi Report</a>
                    <form action="auth/logout.php" method="post">
                        <button type="submit" class="btn btn-outline-danger">Log Out</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-4">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama Lengkap</th>
                        <th>Pesan</th>
                        <th>Kode Pos</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($baris = mysqli_fetch_assoc($query)) { ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $baris['nama_lengkap']; ?></td>
                        <td><?php echo $baris['pesan']; ?></td>
                        <td><?php echo $baris['kode_pos']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $baris['id']; ?>" class="btn btn-sm btn-warning btn-action">Edit</a>
                            <form action="delete.php" method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $baris['id']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
