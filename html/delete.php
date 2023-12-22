<?php
session_start();
// ログインしていなければログインページへリダイレクト
if (!isset($_SESSION['userid'])) {
    header('location: login.php', true, 301);
    exit();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント削除</title>
</head>
<body>
    <h1>本当にこのアカウントを削除しますか？</h1>
    <form action="delete_process.php" method="post">
        <input type="submit" value="削除する">
    </form>
    <a href="index.php">ホームに戻る</a>
</body>
</html>