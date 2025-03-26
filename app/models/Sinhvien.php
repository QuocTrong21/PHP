<?php
class SinhVien {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // 📌 Lấy tất cả sinh viên
    public function getAllSinhVien() {
        $sql = "SELECT * FROM SinhVien";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // ✅ Dùng fetchAll(PDO::FETCH_ASSOC)
    }

    public function createSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                VALUES (:MaSV, :HoTen, :GioiTinh, :NgaySinh, :Hinh, :MaNganh)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':MaSV' => $MaSV,
            ':HoTen' => $HoTen,
            ':GioiTinh' => $GioiTinh,
            ':NgaySinh' => $NgaySinh,
            ':Hinh' => $Hinh,
            ':MaNganh' => $MaNganh
        ]);
    }

    // 📌 Lấy thông tin sinh viên theo ID
    public function getSinhVienById($MaSV) {
        $sql = "SELECT * FROM SinhVien WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':MaSV', $MaSV);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // ✅ Dùng fetch(PDO::FETCH_ASSOC)
    }

    // 📌 Cập nhật thông tin sinh viên
    public function updateSinhVien($MaSV, $HoTen, $GioiTinh, $NgaySinh, $Hinh, $MaNganh) {
        $sql = "UPDATE SinhVien SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, 
                Hinh = :Hinh, MaNganh = :MaNganh WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            ':HoTen' => $HoTen,
            ':GioiTinh' => $GioiTinh,
            ':NgaySinh' => $NgaySinh,
            ':Hinh' => $Hinh,
            ':MaNganh' => $MaNganh,
            ':MaSV' => $MaSV
        ]);
    }

    // 📌 Xóa sinh viên
    public function deleteSinhVien($MaSV) {
        $sql = "DELETE FROM SinhVien WHERE MaSV = :MaSV";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':MaSV', $MaSV);
        return $stmt->execute();
    }
}
?>
