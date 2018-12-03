
	<form id="inlogform" action="#" method="post">
	<p><u>Voer gebruikersnaam of email-adres in:</u></p>
		<table width="80%">
			<tr><th colwidth="40%"></th><th colwidth="60%"></th></tr>
			<tr><td>Gebruikersnaam:</td><td><input type="text" id="naam" name="naam" value=" <?php echo $naam; ?> " placeholder="voornaam [I.] [tv] achternaam"></td></tr>
			<tr><td>Email-adres:</td><td><input type="email" id="emailcont" name="email" value=" <?php echo $email; ?> " placeholder="naam123@provider.nl"></td></tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td></tr>
			<tr><td id="wachtwoord">wachtwoord:</td><td><input required type="password" name="wachtwoord"></td></tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td></tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td></tr>
			<tr><td colspan="2" id="tdknop" align="center"><input type="submit" id="login" name="input" value="Inloggen"></td></tr>
		</table>
	</form>

	<div id="registreren">
		<p>Als je nog geen account hebt, kun je je met onderstaande knop registreren.</p>
		<form id="registratieknop" action="#" method="post">
			<input type="submit" id="registerknop" name="registerknop" value="Registreren">
		</form>
	</div>
