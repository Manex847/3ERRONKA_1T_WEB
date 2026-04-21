<?php include "hizkuntza.php"; ?>

<!DOCTYPE html>
<html lang="<?php echo $_SESSION['lang']; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $lang["titulua"]; ?></title>
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

</body>
</html>