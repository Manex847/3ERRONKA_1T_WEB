<?php
$xmlFile = 'modooscuro.xml';
if (file_exists($xmlFile)) {
    $xml = simplexml_load_file($xmlFile);
    
    
    $temaActual = isset($xml->estado) ? (string)$xml->estado : 'claro';
    
    
    $nuevoTema = ($temaActual === 'claro') ? 'oscuro' : 'claro';
    
    
    $xml->estado = $nuevoTema;
    $xml->asXML($xmlFile);
}

$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header("Location: $referer");
exit;
?>
