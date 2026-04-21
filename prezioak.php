<?php 
include 'hizkuntza.php'; 
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang["prezioak"] ?? "Prezioak"; ?> - A1A Car Wash</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <section class="lehen-atala" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('Argazkiak/SloganFondo.webp');">
            <div class="slogana">
                <h1><?php echo $lang["gure_tarifak"] ?? "Gure Tarifak"; ?></h1>
                <p><?php echo $lang["tarifak_azpipuntua"] ?? "Aukeratu zure autoarentzat plan onena"; ?></p>
            </div>
        </section>

        <section class="nor-gara">
            <h1><?php echo $lang["subskripzio_planak"] ?? "Subskripzio Planak"; ?></h1>
            
            <div class="tarifak-container">
                <article class="ceo">
                    <h3><?php echo $lang["oinarrizkoa"] ?? "Oinarrizkoa"; ?></h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">15€</span>/<?php echo $lang["hila"] ?? "hila"; ?>
                    </div>
                    <p><?php echo $lang["oinarrizkoa_info"] ?? "• Kanpoko garbiketa<br>• Gurpilen garbiketa<br>• Argizaria"; ?></p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="sub1">
                            <input type="hidden" name="izena" value="Oinarrizkoa">
                            <input type="hidden" name="prezioa" value="15">
                            <input type="hidden" name="mota" value="Subskripzioa">
                            <button type="submit" class="botoiak"><?php echo $lang["saskira_gehitu"] ?? "Saskira Gehitu"; ?></button>
                        </form>
                    </div>
                </article>

                <article class="ceo" style="border: 2px solid blue; transform: scale(1.05);">
                    <h3>PREMIUM</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">25€</span>/<?php echo $lang["hila"] ?? "hila"; ?>
                    </div>
                    <p><?php echo $lang["premium_info"] ?? "• Kanpoko eta barruko garbiketa<br>• Aspirazioa<br>• Argizari berezia"; ?></p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="sub2">
                            <input type="hidden" name="izena" value="PREMIUM">
                            <input type="hidden" name="prezioa" value="25">
                            <input type="hidden" name="mota" value="Subskripzioa">
                            <button type="submit" class="botoiak"><?php echo $lang["saskira_gehitu"] ?? "Saskira Gehitu"; ?></button>
                        </form>
                    </div>
                </article>

                <article class="ceo">
                    <h3>VIP Orokorra</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">40€</span>/<?php echo $lang["hila"] ?? "hila"; ?>
                    </div>
                    <p><?php echo $lang["vip_info"] ?? "• Garbiketa integrala<br>• Motorra<br>• Ozonoa<br>• Doako kafea"; ?></p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="sub3">
                            <input type="hidden" name="izena" value="VIP Orokorra">
                            <input type="hidden" name="prezioa" value="40">
                            <input type="hidden" name="mota" value="Subskripzioa">
                            <button type="submit" class="botoiak"><?php echo $lang["saskira_gehitu"] ?? "Saskira Gehitu"; ?></button>
                        </form>
                    </div>
                </article>
            </div>
        </section>

        <section class="nor-gara" style="background-color: #f9f9f9; padding-top: 20px;">
            <h1 style="margin-top: 20px;"><?php echo $lang["produktu_extrak"] ?? "Produktu Extrak"; ?></h1>
            <p style="text-align: center; margin-bottom: 30px;"><?php echo $lang["extrak_azpipuntua"] ?? "Zure esperientzia hobetzeko gehigarriak"; ?></p>
            
            <div class="tarifak-container" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                
                <article class="ceo">
                    <h3><?php echo $lang["pinu_usaina"] ?? "Usain Gozagarria (Pinu)"; ?></h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">3.50€</span>
                    </div>
                    <p><?php echo $lang["pinu_info"] ?? "• Pinu usain iraunkorra"; ?></p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext1">
                            <input type="hidden" name="izena" value="Usain Gozagarria (Pinu)">
                            <input type="hidden" name="prezioa" value="3.50">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak"><?php echo $lang["saskira_gehitu"] ?? "Saskira Gehitu"; ?></button>
                        </form>
                    </div>
                </article>

                <article class="ceo">
                    <h3><?php echo $lang["zapiak"] ?? "Zapiak"; ?></h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">2.50€</span>
                    </div>
                    <p><?php echo $lang["zapiak_info"] ?? "• Praktikoak eta azkarrak"; ?></p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext2">
                            <input type="hidden" name="izena" value="Zapiak">
                            <input type="hidden" name="prezioa" value="2.50">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak"><?php echo $lang["saskira_gehitu"] ?? "Saskira Gehitu"; ?></button>
                        </form>
                    </div>
                </article>

                <article class="ceo">
                    <h3><?php echo $lang["argizaria_extra"] ?? "Marruskadura Argizaria"; ?></h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">12€</span>
                    </div>
                    <p><?php echo $lang["argizaria_info"] ?? "• Eskuz emanda"; ?></p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext3">
                            <input type="hidden" name="izena" value="Argizaria">
                            <input type="hidden" name="prezioa" value="12">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak"><?php echo $lang["saskira_gehitu"] ?? "Saskira Gehitu"; ?></button>
                        </form>
                    </div>
                </article>

            </div>
        </section>
    </main>
    <?php include 'ilunmodua.php'; ?>
</body>
</html>