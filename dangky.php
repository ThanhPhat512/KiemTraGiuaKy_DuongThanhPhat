<?php
include 'includes/auth_check.php';
include 'db.php';

$MaSV = isset($_SESSION['username']) ? $_SESSION['username'] : '';
if (empty($MaSV)) {
    die("Lỗi: Không tìm thấy Mã SV trong session.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hocphan'])) {
    // Kiểm tra xem sinh viên đã có đăng ký chưa
    $checkQuery = "SELECT MaDK FROM DangKy WHERE MaSV = '$MaSV'";
    $result = $conn->query($checkQuery);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $MaDK = $row['MaDK'];
    } else {
        // Nếu chưa có, thêm vào bảng DangKy
        $query = "INSERT INTO DangKy (NgayDK, MaSV) VALUES (NOW(), '$MaSV')";
        if ($conn->query($query) === TRUE) {
            $MaDK = $conn->insert_id; // Lấy ID đăng ký vừa tạo
        } else {
            die("Lỗi khi thêm đăng ký: " . $conn->error);
        }
    }
    
    // Thêm vào bảng ChiTietDangKy nếu chưa tồn tại
    foreach ($_POST['hocphan'] as $MaHP) {
        $query2 = "INSERT IGNORE INTO ChiTietDangKy (MaDK, MaHP) VALUES ('$MaDK', '$MaHP')";
        if (!$conn->query($query2)) {
            die("Lỗi khi thêm học phần: " . $conn->error);
        }
    }

    echo "<script>alert('Đăng ký thành công!'); window.location.href='giohang.php';</script>";
} else {
    echo "<script>alert('Vui lòng chọn ít nhất một học phần!'); window.location.href='hocphan.php';</script>";
}
?>
