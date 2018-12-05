
<?php

    $id = issessie('id');
    $onderwerp = issessie('onderwerp');
    $rubriek_id = issessie('rubriek_id');

    $conn = dbconnect ("sqli");
    $sql = "SELECT rubriek_naam FROM rubrieken WHERE rubr_id = '$rubriek_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $rubriek = ($row != null) ? $row['rubriek_naam'] : "";
    dbdisconnect ("sqli", $conn);

//    $bericht = str_ireplace("<br/>", "", extractverhaal($id));

    $bericht = $_SESSION['verhaal'];
    $berichtaanhef = "$naam: Bericht aanpassen...";
    $berichtknop = "Wijzig bericht";
    include 'includes/pagina_includes/plaatsen/plaatsenmag.php';

//    unset ($_SESSION['update']);
?>
