<?php
include 'includes/auth_check.php';
include 'db.php';
$MaSV = '0123456789'; // Thay bằng session sau này

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hocphan'])) {
    $conn->query("INSERT INTO DangKy (NgayDK, MaSV) VALUES (NOW(), '$MaSV')");
    $MaDK = $conn->insert_id;
    
    foreach ($_POST['hocphan'] as $MaHP) {
        $conn->query("INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK', '$MaHP')");
        $conn->query("UPDATE HocPhan SET SoTinChi = SoTinChi - 1 WHERE MaHP = '$MaHP' AND SoTinChi > 0");
    }
    
    echo "<script>alert('Đăng ký thành công!'); window.location.href='hocphan.php';</script>";
} else {
    echo "<script>alert('Vui lòng chọn ít nhất một học phần!'); window.location.href='hocphan.php';</script>";
}
?>
