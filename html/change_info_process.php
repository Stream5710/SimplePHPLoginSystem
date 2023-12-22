<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('location: login.php', true, 301);
    exit();
} else {
    if ($_POST['first_name'] === '' || $_POST['last_name'] === '' || $_POST['email'] === '') {
        $msg = '必須項目が未入力です。';
        $link = '<a href="change_info.php">戻る</a>';
        exit();
    }
    try {
        require_once('dbconnect.php');
        $sql = 'UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email';
        $stmt = $dbh->prepare($sql);
        // 値をバインド
        $stmt->bindValue(':first_name', $_POST['first_name'], PDO::PARAM_STR);
        $stmt->bindValue(':last_name', $_POST['last_name'], PDO::PARAM_STR);
        $stmt->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        // SQLを実行
        $stmt->execute();

        // パスワードが入力されている場合はパスワードも更新
        if(isset($_POST['password']) && $_POST['password'] !== '') {
            $sql = 'UPDATE users SET pass = :pass';
            $stmt = $dbh->prepare($sql);
            // パスワードをハッシュ化
            $password_hash = password_hash(htmlspecialchars($_POST['password'], \ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
            // 値をバインド
            $stmt->bindValue(':pass', $password_hash, PDO::PARAM_STR);
            // SQLを実行
            $stmt->execute();
        }

        // セッション変数を更新
        $_SESSION['first_name'] = $_POST['first_name'];
        $_SESSION['last_name'] = $_POST['last_name'];
        $_SESSION['email'] = $_POST['email'];

        $msg = 'ユーザー情報の変更が完了しました。';
        $link = '<a href="index.php">ホームに戻る</a>';
    } catch (PDOException $e) {
        echo '接続失敗: ' . $e->getMessage();
        exit();
    }
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