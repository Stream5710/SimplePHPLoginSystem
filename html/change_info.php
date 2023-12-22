<?php
session_start();
// ログインしていなければログインページへリダイレクト
if (!isset($_SESSION['userid'])) {
    header('location: login.php', true, 301);
    exit();
} else {
    $first_name = htmlspecialchars($_SESSION['first_name'], \ENT_QUOTES, 'UTF-8');
    $last_name = htmlspecialchars($_SESSION['last_name'], \ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_SESSION['email'], \ENT_QUOTES, 'UTF-8');
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報変更</title>
</head>
<body>
    <h1>ユーザー情報変更</h1>
    <form action="change_info_process.php" method="post">
        <div>
            <label for="first_name">姓</label>
            <input type="text" id="first_name" name="first_name" required value="<?php echo $first_name; ?>">
            <label for="last_name">名</label>
            <input type="text" id="last_name" name="last_name" required value="<?php echo $last_name; ?>">
        </div>
        <label for="email">メールアドレス: </label>
        <input type="text" id="email" name="email" required value="<?php echo $email; ?>">
        <label for="password">新しいパスワード: </label>
        <input type="password" id="password" name="password">
        <input type="submit" value="送信">
    </form>
    <a href="index.php">ホームに戻る</a>
</body>
</html>