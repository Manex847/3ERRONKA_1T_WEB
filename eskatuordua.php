<?php
include 'hizkuntza.php'; 
include 'konexioa.php';

$mezua = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eskatu_ordua'])) {
    $bezero_id = $_SESSION['bezero_id'] ?? 1;
    $denboraldia = $_POST['denboraldia'];
    $garbitze_mota = $_POST['garbitze_mota'];
    $prezioa = $_POST['prezioa'];
    $egoera = "Garbitzeko";
    $pdf = ""; 

    try {
        $stmt = $conn->prepare("INSERT INTO zitak (bezero_id, denboraldia, prezioa, garbitze_mota, egoera, pdf) VALUES (:bezero_id, :denboraldia, :prezioa, :garbitze_mota, :egoera, :pdf)");
        
        $stmt->bindParam(':bezero_id', $bezero_id, PDO::PARAM_INT);
        $stmt->bindParam(':denboraldia', $denboraldia);
        $stmt->bindParam(':prezioa', $prezioa, PDO::PARAM_INT);
        $stmt->bindParam(':garbitze_mota', $garbitze_mota);
        $stmt->bindParam(':egoera', $egoera);
        $stmt->bindParam(':pdf', $pdf);
        
        $stmt->execute();
        
        $mezua = "<p style='color: green; text-align: center; font-size: 1.2rem; font-weight: bold;'>" . ($lang["zita_ondo"] ?? "Zita ondo gorde da!") . "</p>";
    } catch(PDOException $e) {
        $mezua = "<p style='color: red; text-align: center; font-weight: bold;'>Errorea: " . $e->getMessage() . "</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang["eskatu_ordua"] ?? "Eskatu Ordua"; ?> - A1A Car Wash</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <main>
        <div class="eskatu-container">
            <h2><?php echo $lang["eskatu_ordua"] ?? "Eskatu Zure Ordua"; ?></h2>
            
            <?= $mezua ?>
            
            <form action="eskatuordua.php" method="POST">
                <input type="hidden" name="eskatu_ordua" value="1">

                <div class="form-taldea">
                    <label for="denboraldia"><?php echo $lang["denboraldia_etiketa"] ?? "Eguna eta Ordua"; ?></label>
                    <input type="datetime-local" name="denboraldia" id="denboraldia" required>
                </div>

                <div class="form-taldea">
                    <label for="garbitze_mota"><?php echo $lang["garbitze_mota"] ?? "Garbitze Mota"; ?></label>
                    <select name="garbitze_mota" id="garbitze_mota" required>
                        <option value="" disabled selected><?php echo $lang["aukeratu_mota"] ?? "Aukeratu..."; ?></option>
                        <option value="Oinarrizkoa" data-prezioa="15">Oinarrizkoa (15€)</option>
                        <option value="PREMIUM" data-prezioa="25">PREMIUM (25€)</option>
                        <option value="VIP Orokorra" data-prezioa="40">VIP Orokorra (40€)</option>
                    </select>
                </div>

                <div class="form-taldea">
                    <label for="prezioa"><?php echo $lang["prezioa"] ?? "Prezioa"; ?> (€)</label>
                    <input type="number" name="prezioa" id="prezioa" readonly required placeholder="<?php echo $lang["auto_kalkulua"] ?? "Automatiko kalkulatua"; ?>">
                </div>

                <button type="submit" class="botoia-bidali"><?php echo $lang["gorde_zita"] ?? "Gorde Zita"; ?></button>
            </form>
        </div>
    </main>

    <?php include 'ilunmodua.php'; ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#garbitze_mota').change(function() {
                var prezioa = $(this).find(':selected').data('prezioa');
                if(prezioa) {
                    $('#prezioa').val(prezioa);
                } else {
                    $('#prezioa').val('');
                }
            });
        });
    </script>
</body>
</html>