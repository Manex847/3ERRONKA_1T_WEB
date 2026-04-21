<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "eu";
}

if (isset($_GET["lang"])) {
    $_SESSION["lang"] = $_GET["lang"];
}

$langFile = __DIR__ . "/lang/" . $_SESSION["lang"] . ".php";

if (file_exists($langFile)) {
    $lang = include $langFile;
} else {
    $lang = include __DIR__ . "/lang/eu.php";
}