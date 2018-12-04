
<?php
    $conn = dbconnect("sqli");
    $sql = select_berichten_rubrieken();
    $result = $conn->query($sql);

    $ixprev = 0;
    foreach ($result as $row) {
        $ix = $row["id"];
        if ($ix == $ixprev) {
            $rubr[$ix] = $rubr[$ix] . ", " . $row["rubriek_naam"];
        } else {
            $id[$ix] = $ix;
            $rubr[$ix] = $row["rubriek_naam"];
        }
        $ixprev = $ix;
    }

    $sql1 = select_berichten_filter_sorteer($filterstring, $sortkey, $sortdir);
    $result = $conn->query($sql1);

    $aantalregels = 0;
    if ($result->num_rows > 0) {
        $regelopmaak = 0;
        $i = 0;
        foreach ($result as $row) {
            $ix = $row["id"];
            $id[$ix] = $ix;
            $vnm[$ix] = $row["voornaam"]; $anm[$ix] = $row["achternaam"];
            $nm[$ix] = trim($vnm[$ix] . " " . $row["initiaal"]  . " " . $row["tussenv"] . " " . $anm[$ix]);
            $nmkort[$ix] = trim($vnm[$ix] . " " . $row["tussenv"] . " " . $anm[$ix]);
            $ondw[$ix] = $row["onderwerp"];
            $td[$ix] = $row["geplaatst"]; $tdupd[$ix] = $row["gewijzigd"];
            $i++;
        }
        $aantalregels = $i;
    }
