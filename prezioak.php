<?php
if (session_status() === PHP_SESSION_NONE);
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
    <?php include 'header.php'; ?>

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
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="sub1">
                            <input type="hidden" name="izena" value="Oinarrizkoa">
                            <input type="hidden" name="prezioa" value="15">
                            <input type="hidden" name="mota" value="Subskripzioa">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
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
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="sub2">
                            <input type="hidden" name="izena" value="PREMIUM">
                            <input type="hidden" name="prezioa" value="25">
                            <input type="hidden" name="mota" value="Subskripzioa">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
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
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="sub3">
                            <input type="hidden" name="izena" value="VIP Orokorra">
                            <input type="hidden" name="prezioa" value="40">
                            <input type="hidden" name="mota" value="Subskripzioa">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
                    </div>
                </article>
            </div>
        </section>

        <section class="nor-gara" style="background-color: #f9f9f9; padding-top: 20px;">
            <h1 style="margin-top: 20px;">Produktu Extrak</h1>
            <p style="text-align: center; margin-bottom: 30px;">Zure autoaren garbiketa esperientzia hobetzeko gehigarriak</p>
            
            <div class="tarifak-container" style="display: flex; justify-content: center; gap: 20px; flex-wrap: wrap;">
                <article class="ceo">
                    <h3>Usain Gozagarria (Pinu)</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">3.50€</span>
                    </div>
                    <p>• Pinu usain iraunkorra<br>
                       • Kotxe barrurako gozagarria</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext1">
                            <input type="hidden" name="izena" value="Usain Gozagarria (Pinu)">
                            <input type="hidden" name="prezioa" value="3.50">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
                    </div>
                </article>
                <article class="ceo">
                    <h3>Barruko erabilerarako erabilera anitzeko zapiak</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">2.50€</span>
                    </div>
                    <p>• Praktikoak eta erabiltzeko azkarrak<br>
                       • Akabera garbia eta usain atsegina</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext1">
                            <input type="hidden" name="izena" value="Usain Gozagarria (Pinu)">
                            <input type="hidden" name="prezioa" value="3.50">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
                    </div>
                </article>
                <article class="ceo">
                    <h3>Marruskadura Argizaria</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">12€</span>
                    </div>
                    <p>• Argizari berezia (Eskuz)<br>
                       • %20 Distira Bereziduna</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext2">
                            <input type="hidden" name="izena" value="Marruskadura Argizaria">
                            <input type="hidden" name="prezioa" value="12">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
                    </div>
                </article>

                <article class="ceo">
                    <h3>Gurpil Distira (Gela)</h3>
                    <div class="prezioa">
                        <span style="font-size: 2rem; font-weight: bold;">5€</span>
                    </div>
                    <p>• Gurpilen distira espezifikoa<br>
                       • Eguzkiaren aurkako babesa</p>
                    <div class="prezioak-ikusi" style="margin-top: 20px;">
                        <form action="saskira_gehitu.php" method="POST">
                            <input type="hidden" name="ekintza" value="gehitu">
                            <input type="hidden" name="id" value="ext3">
                            <input type="hidden" name="izena" value="Gurpil Distira (Gela)">
                            <input type="hidden" name="prezioa" value="5">
                            <input type="hidden" name="mota" value="Produktua">
                            <button type="submit" class="botoiak">Saskira Gehitu</button>
                        </form>
                    </div>
                </article>
            </div>
        </section>
    </main>
    <?php include 'ilunmodua.php'; ?>
</body>
</html>