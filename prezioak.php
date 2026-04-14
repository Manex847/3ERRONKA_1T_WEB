<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prezioak - A1A Car Wash</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.html'; ?>

    <main>
        <section class="lehen-atala" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('Argazkiak/SloganFondo.webp');">
            <div class="slogana">
                <h1>Gure Tarifak</h1>
                <p>Aukeratu zure autoarentzat plan onena</p>
            </div>
        </section>

        <section class="nor-gara">
            <h1>Subskripzio Planak</h1>
            
            <div class="tarifak-container">
                <article class="ceo">
                    <h3>Oinarrizkoa</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">15€</span>/hila
                    </div>
                    <p>• Kanpoko garbiketa<br>
                       • Gurpilen garbiketa<br>
                       • Argizaria (estandarra)</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <button class="botoiak">Hautatu</button>
                    </div>
                </article>

                <article class="ceo" style="border: 2px solid blue; transform: scale(1.05);">
                    <h3>PREMIUM</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">25€</span>/hila
                    </div>
                    <p>• Kanpoko eta barruko garbiketa<br>
                       • Tapizeriaren aspirazioa<br>
                       • Argizari berezia<br>
                       • Itxaronaldirik gabe</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <button class="botoiak">Hautatu</button>
                    </div>
                </article>

                <article class="ceo">
                    <h3>VIP Orokorra</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">40€</span>/hila
                    </div>
                    <p>• Garbiketa integrala<br>
                       • Motorraren garbiketa<br>
                       • Desinfekzioa (Ozonoa)<br>
                       • Doako kafea</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <button class="botoiak">Hautatu</button>
                    </div>
                </article>
            </div>
        </section>
    </main>
    <?php include 'modooscuro.php'; ?>
</body>
</html>