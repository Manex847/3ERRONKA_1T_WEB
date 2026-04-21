<?php 

include 'hizkuntza.php'; 
require_once 'konexioa.php'; 


$stmt = $conn->query("SELECT b.izena AS bezero_izena, b.abizena AS bezero_abizena, b.suskripzioa AS bezero_suskripzioa, i.deskripzioa, i.balorazioa FROM iritziak i JOIN bezeroak b ON i.bezero_id = b.id LIMIT 5");
$iritziak = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title><?php echo $lang["titulua"] ?? "A1A CAR WASH"; ?></title>
</head>
<body>
    <?php include 'header.php'; ?>

    <section class="lehen-atala">
        <div class="slogana">
            <h1><?php echo $lang["slogana_izenburua"] ?? "Zure autoa 30 minutuetan garbituta"; ?></h1>
            <p><?php echo $lang["slogana_azpipuntua"] ?? "Besteak probatu dituzu, orain probatu hoberena"; ?></p>
        </div>
        <div class="prezioak-ikusi">
            <button class="botoiak" type="button" onclick="window.location.href='prezioak.php'">
                <?php echo $lang["prezioak_ikusi"] ?? "IKUSI PREZIOAK"; ?>
            </button>
        </div>
    </section>

    <section class="nor-gara">
        <h1><?php echo $lang["nor_gara"] ?? "NOR GARA"; ?></h1>
        <div class="ceo-container">
            <div class="ceo">
                <h3>Manex Olano</h3>
                <p class="kargua"><?php echo $lang["ceo_kargua"] ?? "Sortzailea & CEO"; ?></p>
                <p><?php echo $lang["deskribapena_manex"] ?? "Goierriko ikaslea, A1A Car Wash-eko bultzatzaile nagusia."; ?></p>
            </div>
            <div class="ceo">
                <h3>Odei Otxoaerrarte</h3>
                <p class="kargua"><?php echo $lang["ceo_kargua"] ?? "Sortzailea & CEO"; ?></p>
                <p><?php echo $lang["deskribapena_odei"] ?? "Goierriko ikaslea, operazioen kudeaketaz arduratzen dena."; ?></p>
            </div>
            <div class="ceo">
                <h3>Ander Criado</h3>
                <p class="kargua"><?php echo $lang["ceo_kargua"] ?? "Sortzailea & CEO"; ?></p>
                <p><?php echo $lang["deskribapena_ander"] ?? "Gelaneko ikaslea. Auto garbiketa zerbitzu azkar eta kalitatezkoa eskaintzen du."; ?></p>
            </div>
        </div>
    </section>

    <section class="komentarioak">
        <h1><?php echo $lang["bezeroen_iritziak"] ?? "BEZEROEN IRITZIAK"; ?></h1>
        <div class="iritziak-grid">
            <?php foreach ($iritziak as $iritzia): ?>
                <div class="iritzia">
                    <h3 class="bezero-izena"><?= htmlspecialchars($iritzia['bezero_izena'] . ' ' . $iritzia['bezero_abizena']) ?></h3>
                    <div class="suskripzio-mota"><?= htmlspecialchars($iritzia['bezero_suskripzioa']) ?> <?php echo $lang["modua"] ?? "Modua"; ?></div>
                    <div class="izarrak">
                        <?php 
                        $balorazioa = intval($iritzia['balorazioa']);
                        for ($i = 1; $i <= 5; $i++): 
                            if ($i <= $balorazioa) {
                                echo '<span class="izar" style="color: #f5a623;">★</span>';
                            } else {
                                echo '<span class="izar" style="color: #ccc;">★</span>';
                            }
                        endfor; 
                        ?>
                    </div>
                    <p class="deskripzioa">"<?= htmlspecialchars($iritzia['deskripzioa']) ?>"</p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    
    <?php include 'ilunmodua.php'; ?>
</body>
</html>