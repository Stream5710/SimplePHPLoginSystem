<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php phpinfo()?>
    <form action="login.php" method="post">
        <label for="email">メールアドレス: </label>
        <input type="text" id="email" name="email">
        <label for="password">パスワード: </label>
        <input type="password" id="password" name="password">
        <input type="submit" value="ログイン">
    </form>
</body>
</html>