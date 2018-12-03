<?php

	$voornaam = trim(ispost('voornaam'));
	$initiaal = trim(ispost('initiaal'));
	$tussenv = trim(ispost('tussenv'));
	$achternaam = trim(ispost('achternaam'));
	$email = trim(ispost('email'));

	if ($_POST['wachtwoord01'] === $_POST['wachtwoord02']) {
		$wachtwoord = $_POST['wachtwoord01'];
		$regtijd = date("Y-m-d H:i:s", time());

		$init = ""; $tv = "";
		if (trim($initiaal) != "" ) { $init = trim($initiaal) . ' '; }
		if (trim($tussenv) != "" ) { $tv = trim($tussenv) . ' '; }
		$naam = trim($voornaam . ' ' . $init . $tv . $achternaam);

		$conn = dbconnect ("sqli");
		$sql = "INSERT INTO gebruikers (voornaam, initiaal, tussenv, " .
		  "achternaam, email, wachtwoord, regdatum) " .
	      "VALUES ('$voornaam', '$initiaal', '$tussenv', '$achternaam', " .
		  "'$email', '$wachtwoord', '$regtijd');";
	    $conn->query($sql);
		dbdisconnect ("sqli", $conn);

		$_SESSION['naam'] = $naam;
		$msgstr = $naam . ", je hebt succesvol een account aangemaakt.";
		phpAlertPlus($msgstr, "index.php");	}
	else {
		schrijfstring ("Je hebt verschillende wachtwoorden ingevoerd.|| ||Probeer opnieuw...");
		phpAlert ($msgstr);
		include 'includes/pagina_includes/registreren.php';
	}

?>
