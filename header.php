<?php 
session_start();
include "hizkuntza.php";

$xmlModua = simplexml_load_file('ilunmodua.xml');
$oraingoTema = isset($_SESSION['modua']) ? $_SESSION['modua'] : 'argia';
$beltza = ($oraingoTema === 'iluna');
?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang["titulua"]; ?></title>
    <style>
        #btn-modu-toggle {
            background-color: <?php echo $xmlModua->koloreak->botoia; ?>;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 20px;
            cursor: pointer;
            font-weight: bold;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            transition: background 0.3s;
            font-size: 14px;
        }
        #btn-modu-toggle:hover {
            background-color: <?php echo $xmlModua->koloreak->botoi_hover; ?>;
        }
    </style>
</head>

<body>

<header>
    <div class="goiburua">
        <button id="menu-btn" class="menu-botoia">&#9776;</button>
        <h1><?php echo $lang["titulua"]; ?></h1>
        <div class="hizkuntza-aukerak">
            <a href="?lang=eu" class="hizkuntza <?php echo $_SESSION['lang']=='eu'?'aktibo':''; ?>">
                <img src="Argazkiak/euskera_botoia.png" alt="EU">
            </a>

            <a href="?lang=en" class="hizkuntza <?php echo $_SESSION['lang']=='en'?'aktibo':''; ?>">
                <img src="Argazkiak/ingeles_botoia.png" alt="EN">
            </a>

            <a href="toggle_modua.php" id="btn-modu-toggle">
                <?php echo $beltza ? $xmlModua->textuak->desaktubatu : $xmlModua->textuak->aktibatu; ?>
            </a>
        </div>
    </div>
    <div id="sidebar" class="sidebar">
        <button id="close-btn" class="close-botoia">&times;</button>
        <ul>
            <li><a href="login.php"><?php echo $lang["saioa_hasi"]; ?></a></li>
            <li><a href="index.php"><?php echo $lang["hasiera"]; ?></a></li>
            <li><a href="prezioak.php"><?php echo $lang["prezioak"]; ?></a></li>
            <li><a href="eskatuordua.php"><?php echo $lang["eskatu_ordua"]; ?></a></li>
            <li><a href="Saskia.php"><?php echo $lang["saskia"]; ?> 🛒</a></li>
        </ul>
    </div>
</header>

<?php
if (isset($_SESSION['bezero_id'])) {
    try {
        $stmtUser = $conn->prepare("SELECT izena FROM bezeroak WHERE id = ?");
        $stmtUser->execute([$_SESSION['bezero_id']]);
        $usuario = $stmtUser->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            $mensajeBienvenida = "Ongi etorri, " . htmlspecialchars($usuario['izena']) . "!";
            echo "<div style='background-color: #4CAF50; color: white; padding: 10px; text-align: center; font-weight: bold;'>";
            echo $mensajeBienvenida;
            echo " <a href='logout.php' style='color: white; text-decoration: underline; margin-left: 20px;'>Saioa itxi</a>";
            echo "</div>";
        }
    } catch (Exception $e) {
        // Error silencioso
    }
}
?>

<?php include 'ilunmodua.php'; ?>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $("#menu-btn").click(function(){
            $("#sidebar").addClass("active");
        });
        
        $("#close-btn").click(function(){
            $("#sidebar").removeClass("active");
        });
    });
</script>