<?php
include 'includes/auth_check.php';
include 'db.php';
if (isset($_GET['id'])) {
    $MaSV = $_GET['id'];
    $result = $conn->query("SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
    $row = $result->fetch_assoc();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Chi Tiết Sinh Viên</title>
</head>
<body>
    <h2>Chi Tiết Sinh Viên</h2>
    <p><strong>Mã SV:</strong> <?php echo $row['MaSV']; ?></p>
    <p><strong>Họ Tên:</strong> <?php echo $row['HoTen']; ?></p>
    <p><strong>Giới Tính:</strong> <?php echo $row['GioiTinh']; ?></p>
    <p><strong>Ngày Sinh:</strong> <?php echo $row['NgaySinh']; ?></p>
    <td><img src="<?php echo 'assets/images/' . basename($row['Hinh']); ?>" width="100"></td>
    
    <p><strong>Mã Ngành:</strong> <?php echo $row['MaNganh']; ?></p>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>