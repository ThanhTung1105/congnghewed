<?php
$conn = new mysqli("localhost", "root", "", "th1");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// Hỗ trợ tiếng Việt
$conn->set_charset("utf8mb4");
?>