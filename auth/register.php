<?php

include('function.php');

if(isset($_POST['register'])) {
    register($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            width: 100%;
            max-width: 500px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .card-header {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 20px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            font-size: 1.8rem;
            font-weight: bold;
        }

        .form-label {
            font-weight: bold;
        }

        button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .link {
            text-align: center;
            margin-top: 10px;
        }

        .link a {
            text-decoration: none;
            color: #007bff;
        }

        .link a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>

<div class="card">
    <div class="card-header">PENGADUAN MASYARAKAT</div>
    <div class="card-body">
        <form action="" method="post">
            <h2 class="text-center mb-4">Sign In</h2>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="pw" class="form-label">Password</label>
                <input type="password" name="pw" id="pw" class="form-control" placeholder="Enter your password" required>
            </div>

            <div class="mb-3">
                <label for="pw2" class="form-label">Confirm Password</label>
                <input type="password" name="pw2" id="pw2" class="form-control" placeholder="Confirm your password" required>
            </div>

            <button type="submit" name="register">Sign In</button>

            <div class="link">
                <p>Already have an account? <a href="login.php">Log In</a></p>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
