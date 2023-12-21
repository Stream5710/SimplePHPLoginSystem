<?php
session_start();
if (isset($_SESSION['id'])) {
    $username = htmlspecialchars($_SESSION['first_name'], \ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($_SESSION['last_name'], \ENT_QUOTES, 'UTF-8');
    $msg = 'ようこそ ' . $username . ' さん';
} else {
    header('location: login.php', true, 301);
    exit();
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
    <a href="logout.php">ログアウト</a>
</body>
</html>