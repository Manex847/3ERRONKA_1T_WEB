<?php
session_start();

$oraingoTema = isset($_SESSION['modua']) ? $_SESSION['modua'] : 'argia';
$nuevoTema = ($oraingoTema === 'argia') ? 'iluna' : 'argia';

$_SESSION['modua'] = $nuevoTema;

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header("Location: $referer");
exit;
?>