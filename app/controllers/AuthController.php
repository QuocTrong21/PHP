<?php
require_once 'app/config/Database.php';
require_once 'app/models/Sinhvien.php';

class AuthController {
    private $db;
    private $sinhVienModel;

    public function __construct($db) {
        $this->db = $db;
        $this->sinhVienModel = new SinhVien($db);
    }

    // Hiển thị trang đăng nhập
    public function index() {
        include 'app/views/auth/login.php';
    }

    // Xử lý đăng nhập
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaSV = $_POST['MaSV'];

            // Kiểm tra sinh viên có tồn tại không
            $sinhVien = $this->sinhVienModel->getSinhVienById($MaSV);
            if ($sinhVien) {
                session_start();
                $_SESSION['MaSV'] = $MaSV;
                header("Location: index.php");
                exit();
            } else {
                echo "<script>alert('Sai mã sinh viên!'); window.location.href='index.php?url=auth/index';</script>";
            }
        }
    }
}
?>
