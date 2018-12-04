
<?php
    if ($aantalregels != 0) {
        foreach ($result as $row) {
            if ($regelopmaak==1) { $regelopmaak = 2; } else { $regelopmaak = 1; }
            $ix = $row["id"];
            $ixbest = str_pad($ix, 4, '0', STR_PAD_LEFT);
            $berichtenbestand = "bericht_" . $ixbest . ".txt";
            $verhaalarr = leesbestand($berichtenbestand, "berichten");

            $verhaal = "";
            for ($ii=4; $ii<$verhaalarr[1]; $ii++) {
                $verhaal = $verhaal . $verhaalarr[0][$ii] . "<br/>";
            }
?>

            <table id="berichtentabel">
                <tr id="btblrij1">
                    <td width="25%"><?php echo $nmkort[$ix]; ?></td><td width="75%"><?php echo $ondw[$ix]; ?></td>
                </tr>
                <tr>
                    <td id="btblcelx"><i>rubriek:</i> <?php echo $rubr[$ix]; ?></td><td id="btblcelb" rowspan="1"><?php echo $verhaal; ?></td>
                </tr>
                <tr>
                    <td id="btblrijz" colspan="2"><i>laatst gewijzigd:   <?php echo $tdupd[$ix]; ?></i></td>
                </tr>
        <?php
                if (trim($naam) == trim($nm[$ix])) { ?>
                    <tr>
                        <form action="#" method="post">
                            <td><input type="submit" class = "berknoppen" name="delbericht<?php echo $id[$ix]; ?>" value="verwijder"></td>
                              <!-- alternatief: 2 formulieren, updbericht: action="plaatsen.php" -->
                            <td><input type="submit" class = "berknoppen" name="updbericht<?php echo $id[$ix]; ?>" value="wijzig"></td>
                        </form>
                    </tr>
        <?php   } ?>
            </table>
        <?php
        }
    }

    dbdisconnect ("sqli", $conn);
?>
