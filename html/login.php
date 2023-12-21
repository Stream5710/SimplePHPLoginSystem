<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="login_process.php" method="post">
        <label for="email">メールアドレス: </label>
        <input type="text" id="email" name="email" required>
        <label for="password">パスワード: </label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="ログイン">
    </form>
    <a href="signup.php">会員登録はこちら</a>
</body>
</html>