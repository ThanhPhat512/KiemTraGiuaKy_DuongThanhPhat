<?php
include 'includes/auth_check.php';
include 'db.php';
$result = $conn->query("SELECT * FROM SinhVien");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Sinh Viên</title>
</head>
<body>
    <h2>Danh Sách Sinh Viên</h2>
    <a href="giohang.php">📋 Xem học phần đã đăng ký</a><br><br>
    <a href="hocphan.php">➡ Đăng ký học phần</a><br><br>
    <a href="logout.php">🚪 Đăng xuất</a><br><br>
    <a href="create.php">Thêm Sinh Viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Hành Động</th>
        </tr>
        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['MaSV']; ?></td>
            <td><?php echo $row['HoTen']; ?></td>
            <td><?php echo $row['GioiTinh']; ?></td>
            <td><?php echo $row['NgaySinh']; ?></td>
            <td><img src="<?php echo 'assets/images/' . basename($row['Hinh']); ?>" width="50"></td>
            <td>
                <a href="detail.php?id=<?php echo $row['MaSV']; ?>">Xem</a>
                <a href="edit.php?id=<?php echo $row['MaSV']; ?>">Sửa</a>
                <a href="delete.php?id=<?php echo $row['MaSV']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa sinh viên này không?');">🗑️ Xóa</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
