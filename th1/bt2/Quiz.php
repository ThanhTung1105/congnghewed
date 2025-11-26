<?php
// Đọc nội dung file
$data = file_get_contents("Quiz.txt");

// Tách thành từng khối câu hỏi
$blocks = preg_split("/\n\s*\n/", trim($data));

$questions = [];
foreach ($blocks as $block) {
    $lines = array_map('trim', explode("\n", trim($block)));
    if (count($lines) < 6) continue;

    $questionText = $lines[0];
    $answers = array_slice($lines, 1, 4);
    $correct = str_replace("ANSWER:", "", $lines[5]);
    $correct = trim($correct);

    $questions[] = [
        "question" => $questionText,
        "answers" => $answers,
        "correct" => $correct
    ];
}

// Nếu người dùng nộp bài
$score = null;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $score = 0;
    foreach ($questions as $i => $q) {
        if (isset($_POST["q$i"]) && $_POST["q$i"] == $q["correct"]) {
            $score++;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Bài thi trắc nghiệm</title>
<style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    .question-block { margin-bottom: 25px; }
    .answers label { display: block; margin-left: 20px; }
</style>
</head>
<body>

<h2>Bài thi trắc nghiệm (PHP đọc từ file)</h2>


<form method="POST">
<?php foreach ($questions as $i => $q): ?>
    <div class="question-block">
        <p><b>Câu <?= $i+1 ?>:</b> <?= $q["question"] ?></p>
        <div class="answers">
            <?php 
            $userAnswer = $_POST["q$i"] ?? null;
            foreach ($q["answers"] as $ans): 
                $letter = substr($ans, 0, 1);
                // Xác định class để tô màu
                $class = "";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if ($letter == $q["correct"]) $class = "style='color:green; font-weight:bold;'"; // đáp án đúng màu xanh
                    elseif ($userAnswer == $letter) $class = "style='color:red;'"; // đáp án sai người chọn màu đỏ
                }
            ?>
                <label <?= $class ?>>
                    <input type="radio" name="q<?= $i ?>" value="<?= $letter ?>"
                        <?= ($userAnswer == $letter) ? "checked" : "" ?>
                        <?= ($_SERVER['REQUEST_METHOD'] == 'POST') ? "disabled" : "" ?>
                    >
                    <?= $ans ?>
                </label>
            <?php endforeach; ?>
        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
            <p><b>Đáp án đúng:</b> <?= $q["correct"] ?></p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<input type="submit" value="Nộp bài" <?= ($_SERVER['REQUEST_METHOD'] == 'POST') ? "disabled" : "" ?>>
</form>

<?php if ($score !== null): ?>
    <h3>Kết quả: <?= $score ?> / <?= count($questions) ?></h3>
<?php endif; ?>