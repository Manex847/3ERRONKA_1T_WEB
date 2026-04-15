<?php
session_start();

if (!isset($_SESSION["lang"])) {
    $_SESSION["lang"] = "eu";
}

if (isset($_GET["lang"])) {
    $_SESSION["lang"] = $_GET["lang"];
}

$lang = include "lang/" . $_SESSION["lang"] . ".php";
