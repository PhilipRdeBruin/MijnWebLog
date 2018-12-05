
<?php

    $id = issessie('id');
    $onderwerp = issessie('onderwerp');
    $rubriek_id = issessie('rubriek_id');
    $auteur_id = issessie('auteur_id');

    $conn = dbconnect ("sqli");
    $sql = "SELECT rubriek_naam FROM rubrieken WHERE rubr_id = '$rubriek_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $rubriek = ($row != null) ? $row['rubriek_naam'] : "";
    dbdisconnect ("sqli", $conn);

    $conn = dbconnect ("sqli");
    $sql = "SELECT voornaam, tussenv, achternaam FROM gebruikers WHERE gebr_id = '$auteur_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();

    if ($row != null) {
        $tv = ($row['tussenv'] != "") ? " " . $row['tussenv'] : "";
        $auteur = $row['voornaam'] . $tv . " " . $row['achternaam'];
    }
    dbdisconnect ("sqli", $conn);

    $bericht = "";
    $berichtaanhef = "$naam: Geef commentaar op bericht van $auteur...";
    $berichtcommentaar = "Commentaar";
    $berichtknop = "Voeg commentaar toe";
    include 'includes/pagina_includes/plaatsen/plaatsenmag.php';

?>
