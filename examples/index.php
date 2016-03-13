<?php

    // Load classes
    require_once '../vendor/autoload.php';

    // Initialize StrGen
    $strGen   = new StrGen\StrGen();
    $alphaNum = new StrGen\StrGen(array('lower', 'upper', 'numeric'));

?>

<h5>16 Characters (Full Character Set)</h5>

<?php for($i = 0; $i < 16; $i++):?>
    <code><?php echo htmlentities($strGen->generate(16)); ?></code>
<?php endfor; ?>

<h5>24 Characters (Limited Character Set)</h5>
<?php for($i = 0; $i < 16; $i++):?>
    <code><?php echo htmlentities($alphaNum->generate(24)); ?></code>
<?php endfor; ?>

<style type="text/css">

    h5 {
        font-family: sans-serif;
        font-size: 11px;
        font-weight: normal;
        text-transform: uppercase;
    }

    code {
        background-color: #F3F3F3;
        border-radius: 4px;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        padding: 6px;
    }

</style>
