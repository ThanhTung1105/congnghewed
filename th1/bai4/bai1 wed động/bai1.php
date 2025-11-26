<?php
include 'csdl.php';

// Mảng dữ liệu tĩnh từ bài cũ
$flowers = [
    ['name' => 'Hoa Hải Đường', 'desc' => 'Hoa đèn lồng có vẻ đẹp...', 'img' => 'haiduong.jpg'],
    ['name' => 'Hoa Đỗ Quyên', 'desc' => 'Hoa có màu vàng rực...', 'img' => 'doquyen.jpg'],
    ['name' => 'Hoa Mai', 'desc' => 'Vào mỗi độ tháng 4 về...', 'img' => 'mai.jpg'],
    ['name' => 'Hoa Tường Vy', 'desc' => 'Mang dáng hình tao nhã...', 'img' => 'tuongvy.jpg']
];

foreach ($flowers as $f) {
    $name = $f['name'];
    $desc = $f['desc'];
    $img = $f['img'];

    // Câu lệnh insert
    $sql = "INSERT INTO flowers (name, description, image) VALUES ('$name', '$desc', '$img')";
    
    if ($conn->query($sql)) {
        echo "Đã thêm: $name <br>";
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>