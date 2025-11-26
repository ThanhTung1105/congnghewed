<?php
$csvFile = '65HTTT_Danh_sach_diem_danh.csv';

$data = [];
if (($handle = fopen($csvFile, "r")) !== FALSE) {
    // Đọc dòng đầu làm tiêu đề cột
    $headers = fgetcsv($handle);

    // Đọc từng dòng dữ liệu
    while (($row = fgetcsv($handle)) !== FALSE) {
        $data[] = $row;
    }
    fclose($handle);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8" />
<title>Danh sách tài khoản</title>
<style>
    table { border-collapse: collapse; width: 100%; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
    th { background-color: #f4f4f4; }
</style>
</head>
<body>

<h2>Danh sách tài khoản từ file CSV</h2>

<?php if (!empty($data)): ?>
    <table>
        <thead>
            <tr>
                <?php foreach ($headers as $header): ?>
                    <th><?= htmlspecialchars($header) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <?php foreach ($row as $cell): ?>
                        <td><?= htmlspecialchars($cell) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>Không có dữ liệu trong file CSV.</p>
<?php endif; ?>

</body>
</html>