<?php
include 'csdl.php';

if (isset($_POST['submit'])) {
    if (isset($_FILES['file_csv'])) {
        $file = $_FILES['file_csv']['tmp_name'];
        
        if (($handle = fopen($file, "r")) !== FALSE) {
            fgetcsv($handle); // Bỏ qua dòng tiêu đề
            
            while (($data = fgetcsv($handle)) !== FALSE) {
                // $data là mảng các cột tương ứng trong CSV
                $user = $conn->real_escape_string($data[0]);
                $pass = $conn->real_escape_string($data[1]);
                $last = $conn->real_escape_string($data[2]);
                $first = $conn->real_escape_string($data[3]);
                $city = $conn->real_escape_string($data[4]);
                $email = $conn->real_escape_string($data[5]);
                $course = $conn->real_escape_string($data[6]);

                $sql = "INSERT INTO accounts (username, password, lastname, firstname, city, email, course) 
                        VALUES ('$user', '$pass', '$last', '$first', '$city', '$email', '$course')";
                $conn->query($sql);
            }
            fclose($handle);
            echo "<h3>Đã import dữ liệu CSV thành công!</h3>";
        }
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <h3>Upload file Danh sách (CSV)</h3>
    <input type="file" name="file_csv" required>
    <button type="submit" name="submit">Lưu vào CSDL</button>
</form>