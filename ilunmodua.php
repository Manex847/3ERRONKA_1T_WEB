<?php

    $xmlModo = simplexml_load_file('ilunmodua.xml');
    
    $temaActual = isset($_SESSION['tema']) ? $_SESSION['tema'] : 'claro';
    $esOscuro = ($temaActual === 'oscuro');
?>


<?php if ($esOscuro): ?>
<style>
    body {
        background-color: <?php echo $xmlModo->colores->fondo; ?>;
        color: <?php echo $xmlModo->colores->texto; ?>;
    }
    .nor-gara,
    .ceo,
    .komentarioak,
    .iritzia,
    .goiburua {
        background-color: <?php echo $xmlModo->colores->fondo_elementos; ?>;
        color: <?php echo $xmlModo->colores->texto; ?>;
        border-color: <?php echo $xmlModo->colores->borde; ?>;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.5);
    }
    h1, h3, p {
        color: <?php echo $xmlModo->colores->texto; ?>;
    }
    .ceo h3 {
        color: #ffffff;
    }
    .ceo p, .iritzia p {
        color: <?php echo $xmlModo->colores->texto_secundario; ?>;
    }
</style>
<?php endif; ?>

<style>
    #btn-modo-oscuro {
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 10px 20px;
        background-color: <?php echo $xmlModo->colores->boton; ?>;
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
        background-color: <?php echo $xmlModo->colores->boton_hover; ?>;
    }
</style>


<a href="toggle_modo.php" id="btn-modo-oscuro">
    <?php echo $esOscuro ? $xmlModo->textos->desactivar : $xmlModo->textos->activar; ?>
</a>
