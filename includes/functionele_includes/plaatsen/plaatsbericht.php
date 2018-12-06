
<?php

    $id = trim($id);
    $tijd = date("Y-m-d H:i:s", time());
    $bericht = str_ireplace("'", "\'", $bericht);

    $conn = dbconnect ("sqli");
    $sql = "SELECT rubr_id FROM rubrieken WHERE rubriek_naam = '$rubriek';";
    $result = $conn->query($sql);
    if ($row = $result->fetch_assoc()) {
        $rubriekid = $row['rubr_id'];
    }
    dbdisconnect ("sqli", $conn);

    if (trim($id) == "") {
        $conn = dbconnect ("sqli");
        $sql = "INSERT INTO berichten2 (onderwerp, auteur_id, verhaal, geplaatst, gewijzigd) " .
              "VALUES ('$onderwerp', '$gebruikerid', '$bericht', '$tijd', '$tijd');";
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);

        $conn = dbconnect ("sqli");
        $sql = "SELECT id FROM berichten2 WHERE onderwerp = '$onderwerp' AND geplaatst = '$tijd';";
        $result = $conn->query($sql);
        if($row = $result->fetch_assoc()) {
            $berichtid = $row['id'];
//            $ix = str_pad($berichtid, 4, '0', STR_PAD_LEFT);
            }
        dbdisconnect ("sqli", $conn);

        $conn = dbconnect ("sqli");
        $sql = "INSERT INTO berichten2_rubrieken (bericht_id, rubriek_id) " .
              "VALUES ('$berichtid', '$rubriekid');";
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    } elseif (isset($_SESSION['update'])) {
        $conn = dbconnect ("sqli");
//        $ix = str_pad ($id, 4, '0', STR_PAD_LEFT);
        $sql = "UPDATE berichten2 SET onderwerp = '$onderwerp', rubriek_id = '$rubriekid', verhaal = '$bericht', gewijzigd = '$tijd' " .
               "WHERE id = '$id';";
        $conn->query($sql);
        dbdisconnect ("sqli", $conn);

        /*  Nog code schrijven om bij "Update" evt. nieuwe rubriek toe te voegen...  */

    } elseif (isset($_SESSION['commentaar'])) {
        $anoniem = ispost('anoniemcomm');
        $anoniem = ($anoniem != "") ? 1 : 0;
        $conn = dbconnect ("sqli");
        $sql = "INSERT INTO commentaar (bericht_id, commentator_id, anoniem, commentaar, commentgeplaatst) " .
              "VALUES ('$id', '$gebruikerid', '$anoniem', '$bericht', '$tijd');";

//        echo "$sql";
//        die();

        $conn->query($sql);
        dbdisconnect ("sqli", $conn);
    }
//    $filenaam = "bericht_" . $ix . ".txt";
//    $inhoud = $tijd . "\n" . $naam . "\n" . $onderwerp . "\n" . $rubriek . "\n" . $bericht;
//    schrijfbestand ("w", $filenaam, $inhoud, "berichten");
    update_laatste_activiteit($gebruikerid);
    phpRedirect ("index.php");

?>
