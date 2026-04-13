<?php

    $xmlModua = simplexml_load_file('ilunmodua.xml');
    
    $oraingoTema = isset($_SESSION['tema']) ? $_SESSION['tema'] : 'claro';
    $beltza = ($oraingoTema === 'oscuro');
?>


<?php if ($beltza): ?>
<style>
    body {
        background-color: <?php echo $xmlModua->kolorea->fondo; ?>;
        color: <?php echo $xmlModua->kolorea->texto; ?>;
    }
    .nor-gara,
    .ceo,
    .komentarioak,
    .iritzia,
    .goiburua {
        background-color: <?php echo $xmlModua->kolorea->elementuak; ?>;
        color: <?php echo $xmlModua->kolorea->texto; ?>;
        border-color: <?php echo $xmlModua->kolorea->borde; ?>;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.5);
    }
    h1, h3, p {
        color: <?php echo $xmlModua->kolorea->texto; ?>;
    }
    .ceo h3 {
        color: #ffffff;
    }
    .ceo p, .iritzia p {
        color: <?php echo $xmlModua->kolorea->texto_secundario; ?>;
    }
</style>
<?php endif; ?>

<style>
    #btn-modo-oscuro {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        background-color: <?php echo $xmlModua->kolorea->boton; ?>;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        font-weight: bold;
        z-index: 1000;
        box-shadow: 2px 2px 10px rgba(0,0,0,0.3);
        transition: background 0.3s;
        text-decoration: none; 
        display: inline-block;
    }

    #btn-modo-oscuro:hover {
        background-color: <?php echo $xmlModua->kolorea->boton_hover; ?>;
    }
</style>


<a href="toggle_modo.php" id="btn-modo-oscuro">
    <?php echo $beltza ? $xmlModua->textuak->kendu : $xmlModua->textuak->activar; ?>
</a>