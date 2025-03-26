<?php
class NganhHoc {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Đảm bảo biến `$db` được gán đúng cách
    }

    public function getAllNganh() {
        $stmt = $this->db->prepare("SELECT MaNganh, TenNganh FROM nganhhoc");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
