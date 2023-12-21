<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">メールアドレス: </label>
        <input type="text" id="email" name="email" required>
        <label for="password">パスワード: </label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="ログイン">
    </form>
</body>
</html>