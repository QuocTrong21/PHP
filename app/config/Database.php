<?php
class Database {
    private $host = "localhost"; // Địa chỉ MySQL Server
    private $db_name = "test1"; // Tên cơ sở dữ liệu
    private $username = "root"; // Tên đăng nhập MySQL
    private $password = ""; // Mật khẩu MySQL (nếu có)
    public $conn;

    // Hàm kết nối cơ sở dữ liệu
    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Lỗi kết nối: " . $exception->getMessage();
        }
        return $this->conn;
    }
}
?>
