<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
</head>
<body>
    <h2>Đăng nhập</h2>
    <form action="auth.php" method="POST">
        Tên đăng nhập: <input type="text" name="username" required><br>
        Mật khẩu: <input type="password" name="password" required><br>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>