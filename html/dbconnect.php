<?php
const DB_HOST = 'mysql:dbname=test;host=localhost';
const DB_USER = 'connector';
const DB_PASS = '12345';

try {
    $pdo = new PDO(DB_HOST, DB_USER, DB_PASS);
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage() . "\n";
    exit();
}
?>