<?php
require_once('app/config/Database.php');
require_once('app/models/SinhVien.php');
require_once 'app/models/NganhHoc.php';


class SinhVienController {
    private $sinhVienModel;
    private $db;
    public function __construct() {
        $this->db = (new Database())->getConnection();
        $this->sinhVienModel = new SinhVien($this->db);
    }

    public function index() {
        $sinhViens = $this->sinhVienModel->getAllSinhVien();
        include 'app/views/sinhvien/list.php';
    }


    public function add() {
        $nganhHocModel = new NganhHoc($this->db);
        $nganhList = $nganhHocModel->getAllNganh();
        include 'app/views/sinhvien/add.php';
    }

    public function save() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $MaSV = $_POST['MaSV'] ?? '';
            $HoTen = $_POST['HoTen'] ?? '';
            $GioiTinh = $_POST['GioiTinh'] ?? '';
            $NgaySinh = $_POST['NgaySinh'] ?? '';
            $MaNganh = $_POST['MaNganh'] ?? '';
            $imagePath = ''; 
            if (!empty($_FILES['image']['name'])) {
                $targetDir = "image/";
                $imageFileName = basename($_FILES["image"]["name"]);
                $imagePath = $targetDir . $imageFileName;
                $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
                $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
                $check = getimagesize($_FILES["image"]["tmp_name"]);
    
                if ($check === false) {
                    $errors[] = "Tệp không phải là hình ảnh.";
                }
                if (!in_array($imageFileType, $allowedTypes)) {
                    $errors[] = "Chỉ chấp nhận tệp JPG, JPEG, PNG, GIF.";
                }
                if (empty($errors)) {
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath)) {
                        error_log("Image uploaded successfully: " . $imagePath);
                    } else {
                        $errors[] = "Lỗi khi tải lên hình ảnh.";
                        $imagePath = '';
                    }
                }
            }
            $result = $this->sinhVienModel->createSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $imagePath, $MaNganh);

            if ($result) {
                header('Location: /BaiKiemtra');
                exit();
            } else {
                echo "Lỗi khi thêm sinh viên.";
            }
        }
    }

    public function edit($MaSV) {
        $sinhVienModel = new SinhVien($this->db);
        $sinhVien = $sinhVienModel->getSinhVienById($MaSV);
        if (!$sinhVien) {
            die("Không tìm thấy sinh viên!");
        }
        $nganhHocModel = new NganhHoc($this->db);
        $nganhList = $nganhHocModel->getAllNganh();

        // Gửi dữ liệu đến view
        include 'app/views/sinhvien/edit.php';
    }

    // 📌 Xử lý cập nhật sinh viên
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $MaSV = $_POST['MaSV'];
            $HoTen = $_POST['HoTen'];
            $GioiTinh = $_POST['GioiTinh'];
            $NgaySinh = $_POST['NgaySinh'];
            $MaNganh = $_POST['MaNganh'];
            $Hinh = $_POST['old_Hinh'];

            if (!empty($_FILES['Hinh']['name'])) {
                $targetDir = "image/";
                $imageFileName = basename($_FILES["Hinh"]["name"]);
                $Hinh = $targetDir . $imageFileName;
                move_uploaded_file($_FILES["Hinh"]["tmp_name"], $Hinh);
            }

            $result = $this->sinhVienModel->updateSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh);

            if ($result) {
                header('Location: /BaiKiemtra');
                exit();
            } else {
                echo "Lỗi khi cập nhật sinh viên.";
            }
        }
    }

    // 📌 Xóa sinh viên
    public function delete($id) {
        if ($this->sinhVienModel->deleteSinhVien($id)) {
            header('Location: /BaiKiemtra');
            exit();
        } else {
            echo "Lỗi khi xóa sinh viên.";
        }
    }
    public function show($MaSV) {
        // Kết nối model SinhVien để lấy thông tin sinh viên theo MaSV
        $sinhVienModel = new SinhVien($this->db);
        $sinhVien = $sinhVienModel->getSinhVienById($MaSV);

        // Kiểm tra nếu không tìm thấy sinh viên
        if (!$sinhVien) {
            die("Không tìm thấy sinh viên!");
        }
    
        // Lấy danh sách ngành học
        $nganhHocModel = new NganhHoc($this->db);
        $nganhList = $nganhHocModel->getAllNganh();
    
        // Gửi dữ liệu đến view
        include 'app/views/sinhvien/show.php';
    }
    
}
?>
