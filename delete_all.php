<?php
include 'db.php';
$MaSV = '0123456789';
$conn->query("DELETE FROM ChiTietDangKy WHERE MaDK IN (SELECT MaDK FROM DangKy WHERE MaSV='$MaSV')");
$conn->query("DELETE FROM DangKy WHERE MaSV='$MaSV'");
header("Location: giohang.php");
?>