<?php

require_once 'app/config/Database.php'; // Kết nối CSDL
require_once 'app/models/Sinhvien.php';
require_once 'app/models/Hocphan.php';

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// Kiểm tra phần đầu tiên của URL để xác định controller
$controllerName = isset($url[0]) && $url[0] != '' ? ucfirst($url[0]) . 'Controller' : 'SinhVienController';

// Kiểm tra phần thứ hai của URL để xác định action
$action = isset($url[1]) && $url[1] != '' ? $url[1] : 'index';

// Kiểm tra nếu file controller tồn tại
$controllerFile = 'app/controllers/' . $controllerName . '.php';
if (!file_exists($controllerFile)) {
    die('Controller not found');
}

require_once $controllerFile;

// Tạo kết nối CSDL
$db = (new Database())->getConnection();

// Khởi tạo controller với `$db`
$controller = new $controllerName($db);

// Kiểm tra action có tồn tại trong controller hay không
if (!method_exists($controller, $action)) {
    die('Action not found');
}

// Gọi action với các tham số còn lại (nếu có)
call_user_func_array([$controller, $action], array_slice($url, 2));

?>
