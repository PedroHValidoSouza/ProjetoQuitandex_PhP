<?php
$hostname = 'localhost';
$database = 'toDo';
$username = 'root';
$password = ''; // senha vazia no XAMPP

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
