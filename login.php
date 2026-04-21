<?php
include 'hizkuntza.php';
include 'konexioa.php';

$mezua = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $pasahitza = $_POST['pasahitza'];

    $stmt = $conn->prepare("SELECT id, pasahitza FROM bezeroak WHERE email = ?");
    $stmt->execute([$email]);
    $erabiltzailea = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($erabiltzailea) {
        if ($pasahitza === $erabiltzailea['pasahitza']) {
            $_SESSION['bezero_id'] = $erabiltzailea['id'];
            header("Location: index.php");
            exit();
        } else {
            $mezua = $lang["errorea_pasahitza"] ?? "Pasahitza okerra";
        }
    } else {
        $mezua = $lang["errorea_erabiltzailea"] ?? "Ez da erabiltzaile hori existitzen";
    }
}
?>

<?php include 'header.php'; ?>

<link rel="stylesheet" href="styles.css">

<div class="saioa-hasi-container">
    <h2><?php echo $lang["saioa_hasi"] ?? "Saioa hasi"; ?></h2>

    <?php if (!empty($mezua)) echo "<p class='saioa-hasi-errorea'>$mezua</p>"; ?>

    <form action="" method="POST">
        <div class="form-taldea">
            <label for="email"><?php echo $lang["emaila"] ?? "Emaila"; ?>:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div class="form-taldea">
            <label for="pasahitza"><?php echo $lang["pasahitza"] ?? "Pasahitza"; ?>:</label>
            <input type="password" name="pasahitza" id="pasahitza" required>
        </div>

        <button type="submit" class="botoia-bidali">
            <?php echo $lang["sartu_botoia"] ?? "Sartu"; ?>
        </button>
        
        <p class="erregistro-link">
            <?php echo $lang["ez_duzu_konturik"] ?? "Ez duzu konturik?"; ?> 
            <a href="erregistroa.php"><?php echo $lang["erregistratu_hemen"] ?? "Erregistratu hemen"; ?></a>
        </p>
    </form>
</div>