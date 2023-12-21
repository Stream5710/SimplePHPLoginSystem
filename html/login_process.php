<?php
require_once('dbconnect.php');
session_start();
$email = $_POST['email'];

$sql = 'SELECT * FROM users WHERE email = :email';
$stmt = $dbh->prepare($sql);
// emailの値をバインド
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// SQLを実行
$stmt->execute();

$member = $stmt->fetch();
if (password_verify($_POST['password'], $member['password'])) {
    $_SESSION['id'] = $member['id'];
    $_SESSION['first_name'] = $member['first_name'];
    $_SESSION['last_name'] = $member['last_name'];
    header('location: index.php', true, 301);
    exit();
} else {
    $msg = 'メールアドレスもしくはパスワードが間違っています。';
    $link = '<a href="login.php">戻る</a>';
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