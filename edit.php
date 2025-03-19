<?php
include 'includes/auth_check.php';
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $MaSV = $_POST['MaSV'];
    $HoTen = $_POST['HoTen'];
    $GioiTinh = $_POST['GioiTinh'];
    $NgaySinh = $_POST['NgaySinh'];
    $Hinh = $_POST['Hinh'];
    $MaNganh = $_POST['MaNganh'];
    
    $sql = "UPDATE SinhVien SET HoTen='$HoTen', GioiTinh='$GioiTinh', NgaySinh='$NgaySinh', Hinh='$Hinh', MaNganh='$MaNganh' WHERE MaSV='$MaSV'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
if (isset($_GET['id'])) {
    $MaSV = $_GET['id'];
    $result = $conn->query("SELECT * FROM SinhVien WHERE MaSV='$MaSV'");
    $row = $result->fetch_assoc();
}
?>
<form method="POST">
    <input type="hidden" name="MaSV" value="<?php echo $row['MaSV']; ?>">
    Họ Tên: <input type="text" name="HoTen" value="<?php echo $row['HoTen']; ?>" required><br>
    Giới Tính: <input type="text" name="GioiTinh" value="<?php echo $row['GioiTinh']; ?>"><br>
    Ngày Sinh: <input type="date" name="NgaySinh" value="<?php echo $row['NgaySinh']; ?>"><br>
    Hình: <input type="text" name="Hinh" value="<?php echo $row['Hinh']; ?>"><br>
    Mã Ngành: <input type="text" name="MaNganh" value="<?php echo $row['MaNganh']; ?>" required><br>
    <button type="submit">Cập nhật</button>
</form>