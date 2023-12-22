<?php
session_start();
require_once('dbconnect.php');
// ログインしているかどうかの判定
if (!isset($_SESSION['userid'])) {
    header('location: login.php', true, 301);
    exit();
} else {
    // ログインしている場合はユーザー情報を削除
    $userid = $_SESSION['userid'];
    $sql = 'DELETE FROM users WHERE userid = :userid';
    $stmt = $dbh->prepare($sql);
    // useridの値をバインド
    $stmt->bindValue(':userid', $userid, PDO::PARAM_STR);
    // SQLを実行
    $stmt->execute();

    // セッション変数を全て削除
    $_SESSION = array();
    // セッションを破棄
    session_destroy();

    $msg = 'アカウントを削除しました。';
    $link = '<a href="login.php">ログインページへ</a>';
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $msg; ?></title>
</head>
<body>
    <h1><?php echo $msg; ?></h1>
    <?php echo $link; ?>
</body>
</html>