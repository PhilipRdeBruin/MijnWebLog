
<?php

//    phpAlert ("admin = $admin");
    $ncommin = 0;
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
        $argprof = ($profielnaam != "") ? $profielnaam : "'y'";
        $argstring = $argprof . ', ' . $auteurid[$j] . ', \'' . $nmkort[$j] . '\'';
//        echo "argstring = $argstring<br/>";
        echo '        <td class="btblcel1" id="auteurnaam"' . $auteurid[$j] . ' width="25%" onmouseup="naarprofiel (' . $argprof . ', ' . $auteurid[$j] . ', \'' . $nmkort[$j] . '\')" >' . $nmkort[$j] . '</td><td class="btblrij1" width="75%">' . $ondw[$j] . '</td>';
//        echo '        <td class="btblcel1" onmouseup="naarprofiel()">auteur</td>';
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
                      // alternatief:  2 formulieren, updbericht: action="plaatsen.php"
            echo '        <td><input type="submit" class = "berknoppen" name="updbericht' . $id[$j] . '" value="wijzig"></td>';
            echo '    </form>';
            echo '</tr>';
        } elseif ($naam != "") {
            echo '<tr>';
            echo '    <form action="#" method="post">';
            echo '        <td></td><td><input type="submit" class = "commknoppen" name="commentaar' . $id[$j] . '" value="schrijf een reactie op dit bericht"></td>';
            echo '    </form>';
            echo '</tr>';
        }


        $conn = dbconnect("sqli");
        $sql = "SELECT c.comment_id, c.anoniem, c.commentaar, c.commentgeplaatst,
                       c.status_comm, g.voornaam, g.tussenv, g.achternaam
                FROM commentaar c
                INNER JOIN gebruikers g ON c.commentator_id = g.gebr_id
                WHERE c.bericht_id = '$id[$j]' AND c.status_comm != 'verwijderd' ORDER BY commentgeplaatst DESC;";

        $result = $conn->query($sql);
        foreach ($result as $row) {
            $ncommin++;
            $cid = $row['comment_id'];
            $anoniem = $row['anoniem'];
            $tv = ($row['tussenv'] != "") ? " " . $row['tussenv'] : "";
            $commentator = $row['voornaam'] . $tv . " " . $row['achternaam'];
            $commentator = ($anoniem == 1) ? "<i>anoniem</>" : $commentator;
            $commentaar = $row['commentaar'];
            $tijd = $row['commentgeplaatst'];

            echo "<tr><td id='commentrij1' colspan='2'>commentaar van: $commentator   <i>($tijd)</i></td></tr>";
            echo "<tr>";
            echo "<td id='commentrij2' colspan='2'>$commentaar</td>";
            if ($admin == "admin") {
                echo "<form id='commentdelete' action='#' method='post'>";
                echo "<input type='hidden' name='commid' value='$cid'>";
                echo "<td><button class='delete'><strong>x</strong></button></td>";
                echo "</form>";
            }
            echo "</tr>";

        }
        dbdisconnect ("sqli", $conn);

        echo '</table>';
    }
//    if ($profielnaam != "") {
//        phpAlert ("profielnaam, aantalregels, ncommin: $profielnaam, $aantalregels, $ncommin");
//        insert_statistieken();
//    }
?>
