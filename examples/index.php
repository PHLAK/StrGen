<?php

    // Load classes
    require_once '../src/StrGen/StrGen.php';

    // Initialize StrGen
    $strGen = new StrGen\StrGen(array('lower', 'upper', 'numeric'));

?>

<h5>24 Characters</h5>
<?php for($i = 0; $i < 10; $i++):?>
    <code><?php echo htmlentities($strGen->generate(24)); ?></code>
<?php endfor; ?>

<h5>16 Characters (Strict)</h5>

<?php for($i = 0; $i < 10; $i++):?>
    <code><?php echo htmlentities($strGen->generate(16, true)); ?></code>
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
