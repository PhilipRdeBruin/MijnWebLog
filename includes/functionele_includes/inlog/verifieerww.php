<?php

	if (isset($_POST['naam']) || isset($_POST['email'])) {
		$naam = trim(ispost('naam'));
		$email = trim(ispost('email'));
		$wachtwoord = trim($_POST['wachtwoord']);
		$wwinlog = "";

		if ($email != "") {
			$bfound = zoekgebruiker_met_email ($email);
		} else {
			$bfound = zoekgebruiker_met_naam ($naam);
		}
		if (!$bfound) {
			$naam = ""; $email = "";
			$msgstr = schrijfstring ("Je bent niet bekend in ons systeem.|| ||Maak eerst een account aan.");
			phpAlert ($msgstr);
		} elseif ($wachtwoord === $wwinlog) {
			update_laatste_login ($gebruikerid);
			$ilnaam = $voornaam . $tussenv . $achternaam;
			$msgstr = schrijfstring ("Welkom terug $ilnaam,||je bent nu inglogd.");
			phpAlert ($msgstr);
			$_SESSION['gebruikerid'] = $gebruikerid;
			$_SESSION['naam'] = $ilnaam;
			$_SESSION['admin'] = $admin;
			phpRedirect('index.php');
		} else {
			$msgstr = schrijfstring ("Je hebt een verkeerd wachtwoord ingevuld.|| ||Probeer het opnieuw...");
			phpAlert ($msgstr);
		}
	}
	include 'includes/pagina_includes/inlog/inloggen.php';

?>
