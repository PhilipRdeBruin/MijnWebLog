
<?php

//	$naam = issessie('naam');
	$naam = "";
	if (isset($_SESSION['naam'])) {
		if ($_SESSION['naam'] != "") {
			$gebruikerid = $_SESSION['gebruikerid'];
			$naam = trim($_SESSION['naam']);
		}
	}

	switch ($site) {
	case 'index':
		$sortkey = issessie ('sortkey');
	    $sortdir = issessie ('sortdir');
	    $dirrubr = issessie ('rubriek');
	    $dirschr = issessie ('auteur');
	    $dirondw = issessie ('onderwerp');
	    $dirtijd = issessie ('geplaatst');
	    $arubr = "&#9650;"; $aschr = "&#9650;";
		$aondw = "&#9650;"; $atijd = "&#9660;";
		$hrubr = "black"; $hschr = "black";
		$hondw = "black"; $htijd = "black";
		$zoektermen = "";
		break;
	case 'inlog':
		$voornaam = ispost ('voornaam');
		$initiaal = ispost ('initiaal');
		$tussenv = ispost ('tussenv');
		$achternaam = ispost ('achternaam');
		$email = ispost ('email');
		break;
	case 'plaatsen':
		$id = ispost('id');
		$onderwerp = ispost('onderwerp');
		$rubriek = ispost('rubriek');
		$nieuwerubriek = ispost('nieuwerubriekpost');
		$bericht = ispost('bericht');
		if (isset($_SESSION['update'])) {
			$id = issessie('id');
			$onderwerp = issessie('onderwerp');
			$rubriek = issessie('rubriek');
		}
	}

?>
