<?php
$serverName = "localhost";
$database   = "hirugarrenerronka";
$username   = "root";
$password   = "1MG32025";

try {
    $dsn = "mysql:host=$serverName;dbname=$database;charset=utf8mb4";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("❌ Konexioa errorea: " . $e->getMessage());
}