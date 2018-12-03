
<?php

    $berichtx = $bericht;
    $defpad = getcwd();
    $msgpad = $defpad . "/berichten/";
    $checkbestand = "verbodenwoorden.txt";
    $lines = file($msgpad . $checkbestand);
    $xwoorden = explode (", ", $lines[0]);
    $aantalwoorden = count ($xwoorden);

    $chkblock = false;
    for ($i=0; $i<$aantalwoorden; $i++) {
        $fndstr = stripos ($bericht, $xwoorden[$i]);
        if ($fndstr != false) {
            $chkblock = true;
            $repl = '[' . $xwoorden[$i] . ']';
            $replx = '<span class="fout">' . $xwoorden[$i] . '</span>';
            $berichtx = str_ireplace ($xwoorden[$i], $replx, $berichtx);
            $bericht = str_ireplace ($xwoorden[$i], $repl, $bericht);
        }
    }

    if ($chkblock === false) {
        include 'includes/functionele_includes/plaatsen/plaatsbericht.php';
    }
    $msg = schrijfbericht ("Je hebt een (aantal) ontoelaatbare woord(en) gebruikt,||waardoor het bericht niet geplaatst kan worden...|| ||Corrigeer dit s.v.p.");
    phpalert ($msg);

?>
