<?php
require_once('dbconnect.php');
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
// パスワードをハッシュ化
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

// メールアドレスが既に登録されていないかチェック
$sql = 'SELECT * FROM users WHERE email = :email';
$stmt = $dbh->prepare($sql);
// emailの値をバインド
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
// SQLを実行
$stmt->execute();

$member = $stmt->fetch();
if ($member['email'] === $email) {
    $msg = 'このメールアドレスは既に登録されています。';
    $link = '<a href="signup.php">戻る</a>';
} else {
    $sql = 'INSERT INTO users (first_name, last_name, email, password) VALUES (:first_name, :last_name, :email, :password)';
    $stmt = $dbh->prepare($sql);
    // 値をバインド
    $stmt->bindValue(':first_name', $first_name, PDO::PARAM_STR);
    $stmt->bindValue(':last_name', $last_name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    // SQLを実行
    $stmt->execute();
    $msg = '会員登録が完了しました。';
    $link = '<a href="login.php">ログインページ</a>';
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