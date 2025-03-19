<?php
include 'includes/auth_check.php';
include 'includes/header.php';
include 'db.php';

$MaSV = $_SESSION['username']; // Lấy mã sinh viên từ session

// Lấy danh sách học phần đã đăng ký
$result = $conn->query("
    SELECT ChiTietDangKy.MaHP, HocPhan.TenHP, HocPhan.SoTinChi 
    FROM ChiTietDangKy 
    JOIN HocPhan ON ChiTietDangKy.MaHP = HocPhan.MaHP
    JOIN DangKy ON ChiTietDangKy.MaDK = DangKy.MaDK
    WHERE DangKy.MaSV = '$MaSV'
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh Sách Học Phần Đã Đăng Ký</title>
</head>
<body>
    <h2>Danh Sách Học Phần Đã Đăng Ký</h2>
    <a href="hocphan.php">🔙 Quay lại đăng ký</a>
    <table border="1">
        <tr>
            <th>Mã HP</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['MaHP']; ?></td>
            <td><?php echo $row['TenHP']; ?></td>
            <td><?php echo $row['SoTinChi']; ?></td>
            <td>
                <a href="delete_hp.php?MaHP=<?php echo $row['MaHP']; ?>" 
                   onclick="return confirm('Bạn có chắc muốn xóa học phần này không?');">
                   🗑️ Xóa
                </a>
            </td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <a href="delete_all.php" onclick="return confirm('Bạn có chắc muốn xóa tất cả học phần không?');">❌ Xóa tất cả</a>
</body>
</html>

<?php include 'includes/footer.php'; ?>
