<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <th>Tên Hoa</th>
        <th>Mô Tả</th>
        <th>Ảnh</th>
        <th>Hành động</th>
    </tr>


<?php
$flowers = [
    [
        'name' => 'Hoa Hải Đường ',
        'desc'    =>' hoa đèn lồng có vẻ đẹp giống như chiếc đèn lồng đỏ trên cao. Nếu giàu trí tưởng tượng hơn, chúng ta sẽ hình dung hoa khi nụ đổ xuống thành từng chùm, kết năm kết ba như những thiếu nữ xúng xính trong chiếc đầm dạ hội. Hoa đèn lồng còn có tên là hồng đăng hoa, trồng trong chậu treo, bồn, phên dậu,… gieo hạt vào mùa xuân và cho hoa quanh năm.',
        'img' => 'haiduong.jpg',
        
    ],
    [      
        'name' => 'Hoa Đỗ Quyên',
        'desc'    => 'Hoa có màu vàng rực, hình dạng như chiếc kèn be bé inh xinh, lại dễ trồng, mọc nhanh, vươn cao… Huỳnh Anh rất thích nắng, ánh nắng giúp hoa tỏa sáng rực rỡ, nếu ở nơi bóng râm thì chúng sẽ nhạt màu, kém sắc.',
        'img' => 'doquyen.jpg',
    ],
    [      
        'name' => 'Hoa Mai',
        'desc'    => 'Vào mỗi độ tháng 4 về là dịp mà loài hoa Phăng-xê nở rộ vô cùng đẹp mắt. Hoa còn được gọi tên là hay hoa bướm, hoa tử la lan, hoa tương tư,… Păng-xê thường được trồng trong chậu nhỏ, với phần cánh mỏng mượt như nhung, hình dạng cánh bướm mềm mại như đang tung tăng nhảy múa mỗi khi có làn gió thổi qua. Đây cũng là loài hoa tinh tế và sức sống bền bỉ. ',
        'img' => 'mai.jpg',
    ],
    [      
        'name' => 'Hoa Tường Vy',
        'desc'    => 'Mang dáng hình tao nhã, màu sắc thiên thanh dịu dàng của hoa thanh tú có thể khiến bạn cảm thấy vô cùng nhẹ nhàng khi nhìn ngắm. Cây khá dễ trồng, lại nở nhiều hoa cùng một lúc, từ một bụi nhỏ có thể đâm nhánh, tạo nên những cây con phát triển sum suê. Thanh tú trồng ở nơi có nắng sẽ ra hoa nhiều, vì thế thích hợp trong cả mùa xuân lẫn mùa hè, đem lại khoảng không gian xanh mát cho ngôi nhà ngày oi nóng.',
        'img' => 'tuongvy.jpg',
    ],
    

];
?>

    <?php foreach($flowers as $f): ?>
    <tr>
        <td><?= $f['name'] ?></td>
        <td><?= $f['desc'] ?></td>
        <td><img src="images/<?= $f['img'] ?>" width="120"></td>
        <td>
            <a href="edit.php?id=<?= $f['name'] ?>">Sửa</a> | 
            <a href="delete.php?id=<?= $f['name'] ?>">Xóa</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

