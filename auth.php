<?php
include 'db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "Sai mật khẩu! <a href='login.php'>Thử lại</a>";
        }
    } else {
        echo "Tài khoản không tồn tại! <a href='login.php'>Thử lại</a>";
    }
}
?>