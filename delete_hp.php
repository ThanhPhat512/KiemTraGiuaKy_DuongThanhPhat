<?php
include 'db.php';
$MaSV = '0123456789';
if (isset($_GET['MaHP'])) {
    $MaHP = $_GET['MaHP'];
    $conn->query("DELETE FROM ChiTietDangKy WHERE MaHP='$MaHP' AND MaDK IN (SELECT MaDK FROM DangKy WHERE MaSV='$MaSV')");
    header("Location: giohang.php");
}
?>