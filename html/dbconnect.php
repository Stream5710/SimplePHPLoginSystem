<?php
// ホスト名参考: https://qiita.com/b-coffin/items/8103583efe3767b6748e
const DB_HOST = 'mysql:host=mysql;dbname=test;charset=utf8';
const DB_USER = 'connector';
const DB_PASS = 'abcde';

try {
    $dbh = new PDO(DB_HOST, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage() . "\n";
    exit();
}
?>