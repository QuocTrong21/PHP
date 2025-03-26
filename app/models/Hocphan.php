<?php
class HocPhan {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Lấy danh sách học phần
    public function getAllHocPhan() {
        $stmt = $this->db->prepare("SELECT * FROM HocPhan");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Đăng ký học phần
    public function dangKyHocPhan($MaSV, $MaHP) {
        $stmt = $this->db->prepare("INSERT INTO DangKyHocPhan (MaSV, MaHP) VALUES (?, ?)");
        return $stmt->execute([$MaSV, $MaHP]);
    }
}
?>
