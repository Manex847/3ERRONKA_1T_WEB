<?php
    if (!isset($xmlModua)) {
        $xmlModua = simplexml_load_file('ilunmodua.xml');
    }
    
    $oraingoTema = isset($_SESSION['modua']) ? $_SESSION['modua'] : 'argia';
    $beltza = ($oraingoTema === 'iluna');
?>


<?php if ($beltza): ?>
<style>
    body {
        background-color: <?php echo $xmlModua->koloreak->fondoa; ?>;
        color: <?php echo $xmlModua->koloreak->textua; ?>;
    }
    .nor-gara,
    .ceo,
    .komentarioak,
    .iritzia,
    .goiburua {
        background-color: <?php echo $xmlModua->koloreak->elementu_fondoa; ?>;
        color: <?php echo $xmlModua->koloreak->textua; ?>;
        border-color: <?php echo $xmlModua->koloreak->bordea; ?>;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.5);
    }
    h1, h3, p {
        color: <?php echo $xmlModua->koloreak->textua; ?>;
    }
    .ceo h3 {
        color: #ffffff;
    }
    .ceo p, .iritzia p {
        color: <?php echo $xmlModua->koloreak->bigarren_textua; ?>;
    }
</style>
<?php endif; ?>

