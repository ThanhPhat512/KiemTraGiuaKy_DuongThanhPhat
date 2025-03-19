<?php
include 'includes/auth_check.php';
include 'db.php';
$result = $conn->query("SELECT * FROM HocPhan");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Học Phần</title>
</head>
<body>
    <h2>Danh Sách Học Phần</h2>
    <form action="dangky.php" method="POST">
        <table border="1">
            <tr>
                <th>Mã HP</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ Còn Lại</th>
                <th>Chọn</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['MaHP']; ?></td>
                <td><?php echo $row['TenHP']; ?></td>
                <td><?php echo $row['SoTinChi']; ?></td>
                <td><input type="checkbox" name="hocphan[]" value="<?php echo $row['MaHP']; ?>" <?php echo ($row['SoTinChi'] <= 0) ? 'disabled' : ''; ?>></td>
            </tr>
            <?php } ?>
        </table>
        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>