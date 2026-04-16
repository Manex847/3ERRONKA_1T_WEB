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
        <h1><?php echo $lang["titulua"]; ?></h1>
    </div>

    <nav>
        <a href="?lang=eu">EU</a> |
        <a href="?lang=es">ES</a>
    </nav>
</header>
