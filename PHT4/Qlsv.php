<?php
// === THIẾT LẬP KẾT NỐI PDO ===
$host = '127.0.0.1'; 
$dbname = 'cse485_web'; // Đảm bảo bạn đã tạo Database tên này
$username = 'root'; 
$password = ''; 
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    // TODO 1: Tạo đối tượng PDO
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Kết nối thành công!"; 
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// === LOGIC THÊM SINH VIÊN (XỬ LÝ FORM POST) ===
// TODO 2: Kiểm tra xem form đã được gửi đi
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ten_sinh_vien'])) {
    
    // TODO 3: Lấy dữ liệu từ $_POST
    $ten = $_POST['ten_sinh_vien'];
    $email = $_POST['email'];

    // TODO 4: Viết câu lệnh SQL INSERT (Dùng dấu ? để bảo mật)
    $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)";

    // TODO 5: Chuẩn bị và thực thi
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$ten, $email]);

    // TODO 6: Chuyển hướng để làm mới trang (Tránh gửi lại form khi F5)
    header('Location: Qlsv.php');
    exit;
}

// === LOGIC LẤY DANH SÁCH SINH VIÊN (SELECT) ===
// TODO 7: Viết câu lệnh SQL SELECT *
$sql_select = "SELECT * FROM sinhvien ORDER BY ngay_tao DESC";

// TODO 8: Thực thi câu lệnh SELECT
$stmt_select = $pdo->query($sql_select);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 4 - Website hướng dữ liệu</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-bottom: 20px; padding: 15px; background: #f9f9f9; border: 1px solid #ddd; }
        input { padding: 5px; margin-right: 10px; }
    </style>
</head>
<body>
    <h2>Thêm Sinh Viên Mới (Chủ đề 4.3)</h2>
    <form action="Qlsv.php" method="POST">
        <label>Tên sinh viên:</label>
        <input type="text" name="ten_sinh_vien" required placeholder="Nhập tên...">
        
        <label>Email:</label>
        <input type="email" name="email" required placeholder="Nhập email...">
        
        <button type="submit">Thêm</button>
    </form>

    <hr>

    <h2>Danh Sách Sinh Viên (Chủ đề 4.2)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>
        <?php
        // TODO 9: Dùng vòng lặp while để duyệt qua kết quả
        // PDO::FETCH_ASSOC giúp trả về mảng kết hợp (key là tên cột)
        while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            // TODO 10: In các dòng <tr> và <td>
            echo "<tr>";
                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['ten_sinh_vien']) . "</td>";
                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                // Kiểm tra nếu có cột ngay_tao
                $ngay = isset($row['ngay_tao']) ? $row['ngay_tao'] : 'N/A';
                echo "<td>" . htmlspecialchars($ngay) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>