
<?php

    $id = issessie('id');
    $onderwerp = issessie('onderwerp');
    $rubriek = issessie('rubriek');
    $bericht = str_ireplace("<br/>", "", extractverhaal($id));

    unset ($_SESSION['update']);

    $berichtknop = "Wijzig bericht";
    include 'includes/pagina_includes/plaatsen/plaatsenmag.php';

?>
