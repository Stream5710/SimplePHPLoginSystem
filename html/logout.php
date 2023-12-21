<?php
session_start();
// セッション変数を全て削除
$_SESSION = array();
// セッションを破棄
session_destroy();

header('location: login.php', true, 301);
?>