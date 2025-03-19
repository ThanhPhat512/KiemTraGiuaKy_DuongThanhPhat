<?php
include 'includes/auth_check.php';
include 'includes/header.php';
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $Hinh = $_POST['Hinh'];
    $MaNganh = $_POST['MaNganh'];
    
    $sql = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) VALUES ('$MaSV', '$HoTen', '$GioiTinh', '$NgaySinh', '$Hinh', '$MaNganh')";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
<form method="POST">
    Mã SV: <input type="text" name="MaSV" required><br>
    Họ Tên: <input type="text" name="HoTen" required><br>
    Giới Tính: <input type="text" name="GioiTinh"><br>
    Ngày Sinh: <input type="date" name="NgaySinh"><br>
    Hình: <input type="text" name="Hinh"><br>
    Mã Ngành: <input type="text" name="MaNganh" required><br>
    <button type="submit">Thêm</button>
</form>
<?php include 'includes/footer.php'; ?>