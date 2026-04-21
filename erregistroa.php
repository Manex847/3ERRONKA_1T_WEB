<?php

include 'hizkuntza.php';
include "konexioa.php";

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
    $mezua = $lang["errorea_eremuak_bete"] ?? "Eremu guztiak bete behar dira.";
} elseif ($errorea === 'existitzen') {
    $mezua = $lang["errorea_email_existitzen"] ?? "Email hori dagoeneko erregistratuta dago.";
}
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <title><?php echo $lang["erregistroa"] ?? "Erregistroa"; ?> - A1A Car Wash</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include "header.php"; ?>

<div class="container">

    <h1><?php echo $lang["erregistratu"] ?? "Erregistratu"; ?></h1>

    <?php if ($mezua !== ''): ?>
        <div class="errorea"><?php echo $mezua; ?></div>
    <?php endif; ?>

    <form action="erregistroa.php" method="POST" class="formularioa">

        <label><?php echo $lang["izena"] ?? "Izena"; ?></label>
        <input type="text" name="izena" required>

        <label><?php echo $lang["abizena"] ?? "Abizena"; ?></label>
        <input type="text" name="abizena" required>

        <label><?php echo $lang["emaila"] ?? "Emaila"; ?></label>
        <input type="email" name="email" required>

        <label><?php echo $lang["pasahitza"] ?? "Pasahitza"; ?></label>
        <input type="password" name="pasahitza" required>

        <label><?php echo $lang["telefonoa"] ?? "Telefonoa"; ?></label>
        <input type="number" name="telefonoa" required>

        <label><?php echo $lang["helbidea"] ?? "Helbidea"; ?></label>
        <input type="text" name="helbidea" required>

        <label><?php echo $lang["nan"] ?? "NAN"; ?></label>
        <input type="text" name="nan" maxlength="9" required>

        <button type="submit"><?php echo $lang["erregistratu"] ?? "Erregistratu"; ?></button>
    </form>

    <p class="erregistro-link">
        <?php echo $lang["baduzu_kontua"] ?? "Baduzu kontua?"; ?> 
        <a href="login.php"><?php echo $lang["saioa_hasi"] ?? "Saioa hasi"; ?></a>
    </p>

</div>

</body>
</html>