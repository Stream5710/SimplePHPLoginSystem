<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: login.php', true, 301);
    exit();
} else {
    $username = htmlspecialchars($_SESSION['first_name'], \ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($_SESSION['last_name'], \ENT_QUOTES, 'UTF-8');
    $msg = 'ようこそ ' . $username . ' さん';

    require_once('dbconnect.php');
    $sql = 'SELECT userid, first_name, last_name FROM users';
    $stmt = $dbh->prepare($sql);
    // SQLを実行
    $stmt->execute();

    $users = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Login System</title>
</head>
<body>
    <h1><?php echo $msg; ?></h1>
    <div>
        <h2>ユーザー一覧</h2>
        <ul>
            <?php foreach ($users as $user) : ?>
                <li><?php echo $user['userid'] . ': ' . htmlspecialchars($user['first_name'], \ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($user['last_name'], \ENT_QUOTES, 'UTF-8'); ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <a href="logout.php">ログアウト</a>
</body>
</html>