
<table id="overzichtstabel">

<?php
    $profielstring = ($profiel != "") ? " AND b.auteur_id = '$profiel'" : "";
    $conn = dbconnect("sqli");
//    $sql = "SELECT * FROM berichten $filterstring ORDER BY $sortkey $sortdir;";
//    $sql = "SELECT * FROM berichten b INNER JOIN rubrieken r ON b.rubriek_id = r.rubr_id $filterstring ORDER BY $sortkey $sortdir;";
    $sql = "SELECT b.id, b.onderwerp, b.auteur_id, g.achternaam, g.initiaal, g.tussenv, g.voornaam, r.rubriek_naam, b.geplaatst, b.gewijzigd, b.verhaal
        FROM berichten2 b, rubrieken r, berichten2_rubrieken br, gebruikers g
        WHERE b.id = br.bericht_id AND r.rubr_id = br.rubriek_id AND b.auteur_id = g.gebr_id $filterstring $zoekstring $profielstring
        ORDER BY b.id DESC;";

//    echo "sql = $sql";
//    die();

    $result = $conn->query($sql);

    $aantalregels = 0;
    if ($result->num_rows > 0) {
        $regelopmaak = 0;
        $i = 0; $j=0; $idprev = 0;
        while($row = $result->fetch_assoc()) {
            $id[$i] = $row["id"];
            $initiaal = ($row["initiaal"] != "") ? " " . $row["initiaal"] : "";
            $tussenv = ($row["tussenv"] != "") ? " " . $row["tussenv"] : "";
            $nm[$i] = trim ($row["voornaam"] . $initiaal . $tussenv . " " . $row["achternaam"]);
            $nmkort[$i] = trim ($row["voornaam"] . $tussenv . " " . $row["achternaam"]);
            $ondw[$i] = $row["onderwerp"];
            $auteurid[$i] = $row['auteur_id'];
            $rubr[$i] = str_ireplace("_", " ", $row["rubriek_naam"]);
            $verhaal[$i] = $row['verhaal'];
            $td[$i] = $row["geplaatst"]; $tdupd[$i] = $row["gewijzigd"];

//            $msgstr = "i, idprev, id(i) : $i, $idprev, " . $id[$i];
//            phpAlert ($msgstr);
            if ($id[$i] == $idprev) {
                $j++;
                $rubr[$i - $j] = $rubrprev . ", " . $rubr[$i];
//                $msgstr = "i, id(i), idprev, rubr(i): $i, " . $id[$i] . ", $idprev, " . $rubr[$i];
//                phpAlert ($msgstr);
                $idprev = $id[$i];
            } else {
                $j = 0;
                if ($regelopmaak==1) { $regelopmaak = 2; } else { $regelopmaak = 1; }
                echo '<tr id="regel' . $regelopmaak . '">';
                echo '    <td width="20%">' . $rubr[$i] . '</td><td width=20%">' . $nmkort[$i] . '</td><td width="35%">' . $ondw[$i] . '</td><td width="25%">' . $row["geplaatst"] . '</td>';
                echo '</tr>';
                $rubrprev = $rubr[$i];
                $idprev = $id[$i];
                $i++;
            }
        }
        $aantalregels = $i;
    } else {
        echo "0 results";
    }
    dbdisconnect("sqli", $conn);
?>
</table>
