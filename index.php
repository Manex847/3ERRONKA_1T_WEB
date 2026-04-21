<?php 
if (session_status() === PHP_SESSION_NONE);
require_once 'konexioa.php'; 
?>
<?php
$stmt = $conn->query("SELECT b.izena AS bezero_izena, b.abizena AS bezero_abizena, b.suskripzioa AS bezero_suskripzioa, i.deskripzioa, i.balorazioa FROM iritziak i JOIN bezeroak b ON i.bezero_id = b.id LIMIT 5");

$iritziak = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="eu">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>A1A CAR WASH</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="lehen-atala">
        <div class="slogana">
            <h1>Zure autoa 30 minutuetan garbituta</h1>
            <p>Besteak probatu dituzu, orain probatu hoberena</p>
        </div>
        <div class="prezioak-ikusi">
            <button class="botoiak" type="button" href="prezioak.php">IKUSI PREZIOAK</button>
        </div>
    </section>

    <section class="nor-gara">
        <h1>NOR GARA</h1>
        <div class="ceo-container">
            <div class="ceo">
                <h3>Manex Olano</h3>
                <p class="kargua">Sortzailea & CEO</p>
                <p>Goierriko ikaslea, A1A Car Wash-eko bultzatzaile nagusia.</p>
            </div>
            <div class="ceo">
                <h3>Odei Otxoaerrarte</h3>
                <p class="kargua">Sortzailea & CEO</p>
                <p>Goierriko ikaslea, operazioen kudeaketaz arduratzen dena.</p>
            </div>
            <div class="ceo">
                <h3>Ander Criado</h3>
                <p class="kargua">Sortzailea & CEO</p>
                <p>Gelaneko ikaslea. Auto garbiketa zerbitzu azkar eta kalitatezkoa eskaintzen du.</p>
            </div>
        </div>
    </section>

    <section class="komentarioak">
        <h1>BEZEROEN IRITZIAK</h1>
        <div class="iritziak-grid">
            <?php foreach ($iritziak as $iritzia): ?>
                <div class="iritzia">
                    <h3><?= htmlspecialchars($iritzia['bezero_izena'] . ' ' . $iritzia['bezero_abizena']) ?></h3>
                    <span class="suskripzioa"><?= htmlspecialchars($iritzia['bezero_suskripzioa']) ?></span>
                    <div class="izarrak">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span class="<?= $i <= $iritzia['balorazioa'] ? 'izar betea' : 'izar hutsa' ?>">★</span>
                        <?php endfor; ?>
                    </div>
                    <p><?= htmlspecialchars($iritzia['deskripzioa']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php include 'ilunmodua.php'; ?>
</body>
</html>