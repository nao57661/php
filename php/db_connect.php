<?php
$servername = "localhost";
$username = "your-username"; // 自分のMySQLのユーザー名
$password = "your-password";  // 自分のMySQLのパスワード
$dbname = "your-database";    // 自分のデータベース名

// データベースに接続
$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
