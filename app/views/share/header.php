<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web Bán Hàng</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 20px;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            background: white;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .add-btn {
            display: inline-block;
            padding: 10px 15px;
            margin-bottom: 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .add-btn:hover {
            background: #218838;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }
        th, td {
            padding: 12px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:hover {
            background: #f1f1f1;
        }
        img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        .action-btn {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
            margin: 2px;
            display: inline-block;
        }
        .edit-btn {
            background: #ffc107;
            color: black;
        }
        .edit-btn:hover {
            background: #e0a800;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
        }
        .delete-btn:hover {
            background: #c82333;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Trang Chủ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Sinh vien</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/BAIKIEMTRA/HocPhan">Học Phần</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cart.php">Đăng kí</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Auth">Đăng Nhập</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="container mt-4">