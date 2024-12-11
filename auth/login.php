<?php

session_start(); // Harus ditambahkan ketika menggunakan session

// Redirect user yang sudah login ke index.php
if (isset($_SESSION['login'])) {
    header('location: ../index.php');
    exit;
}

include('function.php');

if (isset($_POST['login'])) {
    login($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .card {
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 20px;
            color: #343a40;
        }

        .btn-custom {
            border-radius: 30px;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>PENGADUAN MASYARAKAT</h1>
    <div class="card w-50 mt-4">
        <div class="card-body">
            <h2 class="text-center mb-4">Log In</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="pw" id="pw" class="form-control" placeholder="Enter your password" required>
                </div>
                <button type="submit" name="login" class="btn btn-primary btn-custom w-100">Log In</button>
                <p class="text-center mt-3">Don't have an account? <a href="register.php">Sign Up</a></p>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
