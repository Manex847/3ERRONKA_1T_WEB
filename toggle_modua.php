<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$moduAktuala = isset($_SESSION['modua']) ? $_SESSION['modua'] : 'argia';
$nuevoTema = ($moduAktuala === 'argia') ? 'iluna' : 'argia';

$_SESSION['modua'] = $moduBerria;

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header("Location: $referer");
exit;
?>