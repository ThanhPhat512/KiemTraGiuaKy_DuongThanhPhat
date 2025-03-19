<?php
include 'includes/auth_check.php';
include 'db.php';
if (isset($_GET['id'])) {
    $MaSV = $_GET['id'];
    $sql = "DELETE FROM SinhVien WHERE MaSV='$MaSV'";
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>