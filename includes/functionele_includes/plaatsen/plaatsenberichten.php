
<?php

	$chkblock = false;
//    $id = ispost('id');
//    $onderwerp = ispost('onderwerp');
//    $rubriek = ispost('rubriek');
//    $bericht = ispost('bericht');

	if ($nieuwerubriek != "") {
		voegtoe_nieuwe_rubriek ($nieuwerubriek);
		$rubriek = $nieuwerubriek;
	}
	if ($rubriek != "" && $bericht != "") {
        include 'includes/functionele_includes/plaatsen/plaatsbericht.php';
    } else {
    	if (isset($_SESSION['update'])) {
            include 'includes/functionele_includes/plaatsen/wijzigbericht.php';
    	} elseif ($naam != "") {
            $berichtknop = "Plaats bericht";
            include 'includes/pagina_includes/plaatsen/plaatsenmag.php';
    	}
    }

?>
