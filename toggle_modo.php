<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$temaActual = isset($_SESSION['tema']) ? $_SESSION['tema'] : 'claro';
$nuevoTema = ($temaActual === 'claro') ? 'oscuro' : 'claro';

$_SESSION['tema'] = $nuevoTema;

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header("Location: $referer");
exit;
?>
