<?php
require_once '../db/db_connect.php'; // データベース接続ファイルを読み込み

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["userId"];
    $password = $_POST["password"];

    // SQLクエリを準備
    $sql = "SELECT password FROM accounts WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userId);
    $stmt->execute();
    $stmt->bind_result($hashedPassword);
    $stmt->fetch();

    // パスワードの検証
    if (password_verify($password, $hashedPassword)) {
        echo "ログイン成功";
        // セッションを開始する場合は、ここでセッション変数を設定することができます
    } else {
        echo "ユーザーIDまたはパスワードが間違っています";
    }
    $stmt->close(); // ステートメントを閉じる
}
$conn->close(); // データベース接続を閉じる
?>
