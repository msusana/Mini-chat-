<?php
$bdd = 'mysql:host=127.0.0.1;dbname=mini_chat';
$user = 'root';
$password = '';

try {
    $pdo = new PDO($bdd, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print 'erreur!:' . $e->getMessage() . '<br/>';
    die('');
}