
<?php

//	$naam = issessie('naam');
//	$naam = "";
	if (isset($_SESSION['naam'])) {
		if ($_SESSION['naam'] != "") {
			$gebruikerid = $_SESSION['gebruikerid'];
			$naam = trim($_SESSION['naam']);
			$admin = issessie('admin');
		}
	} else {
		$naam = ""; $admin = "";
	}
//	phpAlert ("site = $site");
	switch ($site) {
	case 'index':
		unset ($_SESSION['update']);
		unset ($_SESSION['commentaar']);
		$sortkey = issessie ('sortkey');
	    $sortdir = issessie ('sortdir');
	    $dirrubr = issessie ('rubriek');
	    $dirschr = issessie ('auteur');
	    $dirondw = issessie ('onderwerp');
	    $dirtijd = issessie ('geplaatst');
		$zoektermen = ispost ('zoekterm');
		$zoekreset = ispost('zoekreset');
		$profiel = isget('profiel');
//		phpAlert ("profiel = $profiel");
	    $arubr = "&#9650;"; $aschr = "&#9650;";
		$aondw = "&#9650;"; $atijd = "&#9660;";
		$hrubr = "black"; $hschr = "black";
		$hondw = "black"; $htijd = "black";
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
		break;
	case 'profiel':
		unset ($_SESSION['update']);
		unset ($_SESSION['commentaar']);
		unset ($_GET['profiel']);
		$sortkey = issessie ('sortkey');
		$sortdir = issessie ('sortdir');
		$dirrubr = issessie ('rubriek');
		$dirschr = issessie ('auteur');
		$dirondw = issessie ('onderwerp');
		$dirtijd = issessie ('geplaatst');
		$zoektermen = ispost ('zoekterm');
		$zoekreset = ispost('zoekreset');
	//		phpalert ("zoekreset = $zoekreset");
		$arubr = "&#9650;"; $aschr = "&#9650;";
		$aondw = "&#9650;"; $atijd = "&#9660;";
		$hrubr = "black"; $hschr = "black";
		$hondw = "black"; $htijd = "black";
	}

?>
