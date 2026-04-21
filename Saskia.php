<?php 
// 1. Incluimos el gestor de idiomas (que ya maneja session_start)
include 'hizkuntza.php'; 

$saskia = $_SESSION['saskia'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang["saskia"] ?? "Saskia"; ?> - A1A Car Wash</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <main>
        <section class="nor-gara saskia-seksioa">
            <h1><?php echo $lang["zure_saskia"] ?? "ZURE SASKIA"; ?></h1>
            
            <div class="saskia-container">
                <?php if (empty($saskia)): ?>
                    <p style="font-size: 1.5rem;"><?php echo $lang["saskia_hutsik"] ?? "Zure saskia hutsik dago."; ?></p>
                <?php else: ?>
                    <table class="saskia-taula">
                        <thead>
                            <tr>
                                <th><?php echo $lang["produktua"] ?? "Produktua"; ?></th>
                                <th><?php echo $lang["mota"] ?? "Mota"; ?></th>
                                <th><?php echo $lang["prezioa"] ?? "Prezioa"; ?></th>
                                <th><?php echo $lang["kantitatea"] ?? "Kantitatea"; ?></th>
                                <th><?php echo $lang["guztira"] ?? "Guztira"; ?></th>
                                <th><?php echo $lang["ekintza"] ?? "Ekintza"; ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($saskia as $item): 
                                $azpitotala = $item['prezioa'] * $item['kantitatea'];
                                $total += $azpitotala;
                            ?>
                            <tr>
                                <td data-label="<?php echo $lang["produktua"] ?? "Produktua"; ?>"><?= htmlspecialchars($item['izena']) ?></td>
                                <td data-label="<?php echo $lang["mota"] ?? "Mota"; ?>"><?= htmlspecialchars($item['mota']) ?></td>
                                <td data-label="<?php echo $lang["prezioa"] ?? "Prezioa"; ?>"><?= number_format($item['prezioa'], 2) ?>€</td>
                                <td data-label="<?php echo $lang["kantitatea"] ?? "Kantitatea"; ?>"><?= $item['kantitatea'] ?></td>
                                <td data-label="<?php echo $lang["guztira"] ?? "Guztira"; ?>"><?= number_format($azpitotala, 2) ?>€</td>
                                <td data-label="<?php echo $lang["ekintza"] ?? "Ekintza"; ?>">
                                    <form action="saskira_gehitu.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="ekintza" value="kendu">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
                                        <button type="submit" class="botoia-txikia-kendu"><?php echo $lang["kendu"] ?? "Kendu"; ?></button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="saskia-totala">
                        <h3 style="font-size: 2rem; margin: 20px 0;">
                            <?php echo $lang["guztira"] ?? "Guztira"; ?>: 
                            <span style="color: blue;"><?= number_format($total, 2) ?>€</span>
                        </h3>
                        
                        <div class="saskia-botoiak-container">
                            <form action="saskira_gehitu.php" method="POST" style="display:inline;">
                                <input type="hidden" name="ekintza" value="hustu">
                                <button type="submit" class="botoiak botoia-hustu" style="background-color: darkred;">
                                    <?php echo $lang["saskia_hustu"] ?? "Saskia Hustu"; ?>
                                </button>
                            </form>
                            
                            <button class="botoiak botoia-ordaindu" style="background-color: green;">
                                <?php echo $lang["ordaindu"] ?? "Ordaindu"; ?>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php include 'ilunmodua.php'; ?>
</body>
</html>