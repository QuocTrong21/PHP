<?php
require_once('app/config/Database.php');
require_once('app/models/Sinhvien.php');
require_once('app/models/Hocphan.php');

class HocPhanController {
    private $sinhVienModel;
    private $db;

    public function __construct($db) {
        $this->db = $db;
        $this->sinhVienModel = new SinhVien($this->db);
    }

    // Hiển thị danh sách học phần
    public function index() {
        $hocPhanModel = new HocPhan($this->db);
        $hocPhanList = $hocPhanModel->getAllHocPhan();

        include 'app/views/hocphan/dangki.php';
    }

    // Xử lý đăng ký học phần
    public function dangKy() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $MaSV = $_POST['MaSV'] ?? null;
            $MaHP = $_POST['MaHP'] ?? null;

            if (!$MaSV || !$MaHP) {
                die("Lỗi: Thiếu thông tin Mã Sinh Viên hoặc Mã Học Phần!");
            }

            $hocPhanModel = new HocPhan($this->db);
            if ($hocPhanModel->dangKyHocPhan($MaSV, $MaHP)) {
                header("Location: index.php?url=hocphan&status=success");
                exit;
            } else {
                header("Location: index.php?url=hocphan&status=fail");
                exit;
            }
        } else {
            die("Lỗi: Phương thức HTTP không hợp lệ!");
        }
    }
}
?>
