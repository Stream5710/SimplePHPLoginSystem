<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
</head>
<body>
    <h1>会員登録</h1>
    <form action="signup_process.php" method="post">
        <div>
            <label for="first_name">姓</label>
            <input type="text" id="first_name" name="first_name" required>
            <label for="last_name">名</label>
            <input type="text" id="last_name" name="last_name" required>
        </div>
        <label for="email">メールアドレス: </label>
        <input type="text" id="email" name="email" required>
        <label for="password">パスワード: </label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="登録">
    </form>
    <a href="login.php">ログインはこちら</a>
</body>
</html>