<?php
require_once('dbconnect.php');
session_start();
// フォームからの値を取得
$email = $_POST['email'];

$sql = 'SELECT * FROM users WHERE email = :email';
$stmt = $dbh->prepare($sql);
// emailの値をバインド
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// SQLを実行
$stmt->execute();

$member = $stmt->fetch();
// パスワードが一致したらログイン
if (isset($member['userid']) && $_POST['password'] && password_verify($_POST['password'], $member['pass'])) {
    // セッション変数に値を保存
    $_SESSION['userid'] = $member['userid'];
    $_SESSION['first_name'] = $member['first_name'];
    $_SESSION['last_name'] = $member['last_name'];
    $_SESSION['email'] = $member['email'];
    // ログイン完了後にindex.phpに遷移
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