<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['bezero_id'])) {
    header("Location: login.php?errorea=saioa_beharrezkoa");
    exit();
}

if (!isset($_SESSION['saskia'])) {
    $_SESSION['saskia'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ekintza = $_POST['ekintza'] ?? '';

    if ($ekintza === 'gehitu') {
        $id = $_POST['id'] ?? '';
        $izena = $_POST['izena'] ?? '';
        $prezioa = floatval($_POST['prezioa'] ?? 0);
        $mota = $_POST['mota'] ?? 'Ezezaguna';

        if (!empty($id) && !empty($izena) && $prezioa > 0) {
            $badago = false;
            foreach ($_SESSION['saskia'] as &$item) {
                if ($item['id'] === $id) {
                    $item['kantitatea'] += 1;
                    $badago = true;
                    break;
                }
            }

            if (!$badago) {
                $_SESSION['saskia'][] = [
                    'id' => $id,
                    'izena' => $izena,
                    'prezioa' => $prezioa,
                    'mota' => $mota,
                    'kantitatea' => 1
                ];
            }
        }
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();

    } elseif ($ekintza === 'kendu') {
        $id = $_POST['id'] ?? '';
        foreach ($_SESSION['saskia'] as $key => $item) {
            if ($item['id'] === $id) {
                unset($_SESSION['saskia'][$key]);
                break;
            }
        }
        $_SESSION['saskia'] = array_values($_SESSION['saskia']);
        header("Location: Saskia.php");
        exit();

    } elseif ($ekintza === 'hustu') {
        $_SESSION['saskia'] = [];
        header("Location: Saskia.php");
        exit();
    }
}

header("Location: prezioak.php");
exit();
