
<?php
    for ($i = 1; $i<=$aantalregels; $i++) {
        $j = $i - 1;
//        $ix = str_pad($id[$j], 4, '0', STR_PAD_LEFT);
//        $berichtenbestand = "bericht_" . $ix . ".txt";
//        $verhaalarr = leesbestand($berichtenbestand, "berichten");

//        $verhaal = "";
//        for ($ii=4; $ii<$verhaalarr[1]; $ii++) {
//            $verhaal = $verhaal . $verhaalarr[0][$ii] . "<br/>";
//        }

        echo '<table id="berichtentabel">';
        echo '    <tr id="btblrij1">';
        echo '        <td class="btblrij1" width="25%">' . $nmkort[$j] . '</td><td class="btblrij1" width="75%">' . $ondw[$j] . '</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '        <td id="btblcelx"><i>rubriek:</i>  ' . $rubr[$j] . '</td><td id="btblcelb" rowspan="1">' . $verhaal[$j] . '</td>';
        echo '    </tr>';
        echo '    <tr>';
        echo '        <td id="btblrijz" colspan="2"><i>laatst gewijzigd:   ' . $tdupd[$j] . '</i></td>';
        echo '    </tr>';
        if ($naam == $nm[$j]) {
            echo '<tr>';
            echo '    <form action="#" method="post">';
            echo '        <td><input type="submit" class = "berknoppen" name="delbericht' . $id[$j] . '" value="verwijder"></td>';
                      // alternatief: 2 formulieren, updbericht: action="plaatsen.php"
            echo '        <td><input type="submit" class = "berknoppen" name="updbericht' . $id[$j] . '" value="wijzig"></td>';
            echo '    </form>';
            echo '</tr>';
        }
        echo '</table>';
    }
?>
