<?php
session_start();
if (!isset($_SESSION['id'])) {
    header('location: login.php', true, 301);
    exit();
} else {
    try {
        require_once('dbconnect.php');
        $sql = 'UPDATE users SET first_name = :first_name, last_name = :last_name, email = :email';
    } catch (PDOException $e) {
        echo '接続失敗' . $e->getMessage();
        exit();
    }
}
?>