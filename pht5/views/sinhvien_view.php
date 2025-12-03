<?php
// Tệp View CHỈ chứa HTML và logic hiển thị (echo, foreach)
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; padding: 15px; background: #f9f9f9; border: 1px solid #ddd; }
        input { padding: 5px; margin-right: 10px; }
    </style>
</head>
<body>
    <h2>Thêm Sinh Viên Mới (Kiến trúc MVC)</h2>
    <form action="index.php" method="POST">
        <label>Tên sinh viên:</label>
        <input type="text" name="ten_sinh_vien" required placeholder="Nhập tên...">
        
        <label>Email:</label>
        <input type="email" name="email" required placeholder="Nhập email...">
        
        <button type="submit">Thêm</button>
    </form>

<hr>

<h2>Danh Sách Sinh Viên (Kiến trúc MVC)</h2>
<table>
<tr>
<th>ID</th>
<th>Tên Sinh Viên</th>
<th>Email</th>
<th>Ngày Tạo</th>
</tr><?php
foreach ($danh_sach_sv as $sv) {
    echo "<tr>";
        echo "<td>" . htmlspecialchars($sv['id']) . "</td>";
        echo "<td>" . htmlspecialchars($sv['ten_sinh_vien']) . "</td>";
        echo "<td>" . htmlspecialchars($sv['email']) . "</td>";
        $ngay = isset($sv['ngay_tao']) ? $sv['ngay_tao'] : 'N/A';
        echo "<td>" . htmlspecialchars($ngay) . "</td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>