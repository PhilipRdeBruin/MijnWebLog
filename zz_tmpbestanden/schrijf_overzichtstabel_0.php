
<table id="overzichtstabel">

<?php
    $conn = dbconnect("sqli");
//    $sql = "SELECT * FROM berichten $filterstring ORDER BY $sortkey $sortdir;";
    $sql = "SELECT * FROM berichten2 b INNER JOIN rubrieken r ON b.rubriek_id = r.rubr_id $filterstring ORDER BY $sortkey $sortdir;";
//    phpAlert ("sql = $sql");

    $result = $conn->query($sql);

    $aantalregels = 0;
    if ($result->num_rows > 0) {
        $regelopmaak = 0;
        $i = 0;
        while($row = $result->fetch_assoc()) {
            $id[$i] = $row["id"];
            $nm[$i] = $row["auteur"]; $ondw[$i] = $row["onderwerp"];
            $rubr[$i] = str_ireplace("_", " ", $row["rubriek_naam"]);
            $td[$i] = $row["geplaatst"]; $tdupd[$i] = $row["gewijzigd"];

            if ($regelopmaak==1) { $regelopmaak = 2; } else { $regelopmaak = 1; }
            echo '<tr id="regel' . $regelopmaak . '">';
            echo '    <td width="20%">' . $rubr[$i] . '</td><td width=20%">' . $row["auteur"] . '</td><td width="35%">' . $row["onderwerp"] . '</td><td width="25%">' . $row["geplaatst"] . '</td>';
            echo '</tr>';
            $i++;
        }
        $aantalregels = $i;
    } else {
        echo "0 results";
    }
    dbdisconnect("sqli", $conn);
?>
</table>
