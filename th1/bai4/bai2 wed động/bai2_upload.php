<?php
include 'csdl.php';

if (isset($_POST['submit'])) {
    if (isset($_FILES['file_quiz'])) {
        $content = file_get_contents($_FILES['file_quiz']['tmp_name']);
        
        // Tách câu hỏi theo logic cũ
        $blocks = preg_split("/\n\s*\n/", trim($content));
        
        foreach ($blocks as $block) {
            $lines = explode("\n", trim($block));
            if (count($lines) < 6) continue;

            $q = $conn->real_escape_string(trim($lines[0]));
            $a = $conn->real_escape_string(trim(substr($lines[1], 3))); // Bỏ 'A. '
            $b = $conn->real_escape_string(trim(substr($lines[2], 3)));
            $c = $conn->real_escape_string(trim(substr($lines[3], 3)));
            $d = $conn->real_escape_string(trim(substr($lines[4], 3)));
            $ans = trim(str_replace("ANSWER:", "", $lines[5]));

            $sql = "INSERT INTO questions (question_content, option_a, option_b, option_c, option_d, correct_answer) 
                    VALUES ('$q', '$a', '$b', '$c', '$d', '$ans')";
            $conn->query($sql);
        }
        echo "<h3>Đã import dữ liệu câu hỏi thành công!</h3>";
    }
}
?>

<form method="post" enctype="multipart/form-data">
    <h3>Upload file Quiz.txt</h3>
    <input type="file" name="file_quiz" required>
    <button type="submit" name="submit">Lưu vào CSDL</button>
</form>