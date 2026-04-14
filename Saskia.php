<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$saskia = $_SESSION['saskia'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskia - A1A Car Wash</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.html'; ?>
    <main>
        <section class="nor-gara saskia-seksioa">
            <h1>ZURE SASKIA</h1>
            <div class="saskia-container">
                <?php if (empty($saskia)): ?>
                    <p style="font-size: 1.5rem;">Zure saskia hutsik dago.</p>
                <?php else: ?>
                    <table class="saskia-taula">
                        <thead>
                            <tr>
                                <th>Produktua</th>
                                <th>Mota</th>
                                <th>Prezioa</th>
                                <th>Kantitatea</th>
                                <th>Guztira</th>
                                <th>Ekintza</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($saskia as $item): 
                                $azpitotala = $item['prezioa'] * $item['kantitatea'];
                                $total += $azpitotala;
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($item['izena']) ?></td>
                                <td><?= htmlspecialchars($item['mota']) ?></td>
                                <td><?= number_format($item['prezioa'], 2) ?>€</td>
                                <td><?= $item['kantitatea'] ?></td>
                                <td><?= number_format($azpitotala, 2) ?>€</td>
                                <td>
                                    <form action="saskira_gehitu.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="ekintza" value="kendu">
                                        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">
                                        <button type="submit" class="botoia-txikia-kendu">Kendu</button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <div class="saskia-totala">
                        <h3 style="font-size: 2rem; margin: 20px 0;">Guztira: <span style="color: blue;"><?= number_format($total, 2) ?>€</span></h3>
                        <div class="saskia-botoiak-container">
                            <form action="saskira_gehitu.php" method="POST" style="display:inline;">
                                <input type="hidden" name="ekintza" value="hustu">
                                <button type="submit" class="botoiak botoia-hustu" style="background-color: darkred;">Saskia Hustu</button>
                            </form>
                            <button class="botoiak botoia-ordaindu" style="background-color: green;">Ordaindu</button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php include 'modooscuro.php'; ?>
</body>
</html>
