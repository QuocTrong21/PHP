<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sinh Viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-navbar {
            background: linear-gradient(to right, #3498db, #2980b9);
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .custom-navbar .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.25rem;
        }
        .custom-navbar .nav-link {
            color: rgba(255,255,255,0.8) !important;
            transition: color 0.3s ease;
            margin: 0 10px;
        }
        .custom-navbar .nav-link:hover {
            color: white !important;
            transform: scale(1.05);
        }
        .custom-navbar .nav-link.active {
            color: white !important;
            font-weight: bold;
            border-bottom: 2px solid white;
        }
        .login-btn {
            background-color: #2ecc71;
            color: white !important;
            border-radius: 20px;
            padding: 6px 15px;
            transition: all 0.3s ease;
        }
        .login-btn:hover {
            background-color: #27ae60;
            transform: translateY(-2px);
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg custom-navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <i class="bi bi-mortarboard me-2"></i>Trang chủ 
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Sinh Viên</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/BAIKIEMTRA/HocPhan">Học Phần</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hocphan.php">Đăng Kí</a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex">
                    <a href="Auth" class="nav-link login-btn">
                        <i class="bi bi-person-fill me-1"></i>Đăng Nhập
                    </a>
                </div>
            </div>
        </nav>
    </header>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
</body>
</html>