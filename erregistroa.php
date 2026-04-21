<?php
session_start();
include "konexioa.php";
include "header.php";

$errorea = $_GET['errorea'] ?? '';
$mezua = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $izena = trim($_POST['izena'] ?? '');
    $abizena = trim($_POST['abizena'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pasahitza = trim($_POST['pasahitza'] ?? '');
    $telefonoa = trim($_POST['telefonoa'] ?? '');
    $helbidea = trim($_POST['helbidea'] ?? '');
    $nan = trim($_POST['nan'] ?? '');
    $suskripzioa = "Oinarrizko";

    if ($izena === '' || $abizena === '' || $email === '' || $pasahitza === '' ||
        $telefonoa === '' || $helbidea === '' || $nan === '') {
        header("Location: erregistroa.php?errorea=hutsa");
        exit();
    }

    $stmt = $conn->prepare("SELECT id FROM bezeroak WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        header("Location: erregistroa.php?errorea=existitzen");
        exit();
    }

    $hash = password_hash($pasahitza, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO bezeroak 
        (izena, abizena, email, pasahitza, telefonoa, helbidea, nan, suskripzioa)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$izena, $abizena, $email, $hash, $telefonoa, $helbidea, $nan, $suskripzioa]);

    $id = $conn->lastInsertId();
    $_SESSION['bezero_id'] = $id;

    header("Location: index.php?ongi_etorri=1");
    exit();
}

if ($errorea === 'hutsa') {
    $mezua = "Eremu guztiak bete behar dira.";
} elseif ($errorea === 'existitzen') {
    $mezua = "Email hori dagoeneko erregistratuta dago.";
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <title>Erregistroa</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">

    <h1>Erregistratu</h1>

    <?php if ($mezua !== ''): ?>
        <div class="errorea"><?php echo $mezua; ?></div>
    <?php endif; ?>

    <form action="erregistroa.php" method="POST" class="formularioa">

        <label>Izena</label>
        <input type="text" name="izena" required>

        <label>Abizena</label>
        <input type="text" name="abizena" required>

        <label>Emaila</label>
        <input type="email" name="email" required>

        <label>Pasahitza</label>
        <input type="password" name="pasahitza" required>

        <label>Telefonoa</label>
        <input type="number" name="telefonoa" required>

        <label>Helbidea</label>
        <input type="text" name="helbidea" required>

        <label>NAN</label>
        <input type="text" name="nan" maxlength="9" required>

        <button type="submit">Erregistratu</button>
    </form>

    <p class="erregistro-link">
        Baduzu kontua? <a href="login.php">Saioa hasi</a>
    </p>

</div>

</body>
</html>
