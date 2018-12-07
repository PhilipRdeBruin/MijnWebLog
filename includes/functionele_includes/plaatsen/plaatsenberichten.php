
<?php
	$uit = "";
	$nregels = leesbestand ("afkortingen1.txt", "berichten");
	for ($i=0; $i<$nregels[1]; $i++) {
		$j=$i+1;
		$str = $nregels[0][$i];
//		$str = str_ireplace(':', ':"', $str);
//		$str = str_ireplace(',', '",', $str);
		$uit = $uit . $str;
	}
//	echo "string = " . $uit;
?>
	<input type='hidden' id='afkortingen' value='<?php echo $uit; ?>'>

<?php
	$chkblock = false;
	$berichtaanhef = "Nieuw bericht van $naam";
	$berichtcommentaar = "Bericht";
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
		} elseif (isset($_SESSION['commentaar'])) {
            include 'includes/functionele_includes/plaatsen/commentaar.php';
    	} elseif ($naam != "") {
            $berichtknop = "Plaats bericht";
            include 'includes/pagina_includes/plaatsen/plaatsenmag.php';
    	}
    }

?>
