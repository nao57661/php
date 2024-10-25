<?php
require_once '../db/db_connect.php'; // データベース接続ファイルを読み込み

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_POST["registerUserId"];
    $username = $_POST["registerName"];
    $password = password_hash($_POST["registerPassword"], PASSWORD_DEFAULT); // パスワードをハッシュ化

    // SQLクエリを準備
    $sql = "INSERT INTO accounts (user_id, username, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $userId, $username, $password);

    // 実行とエラーチェック
    if ($stmt->execute()) {
        echo "アカウントが作成されました";
    } else {
        echo "エラー: " . $stmt->error;
    }
    $stmt->close(); // ステートメントを閉じる
}
$conn->close(); // データベース接続を閉じる
?>
