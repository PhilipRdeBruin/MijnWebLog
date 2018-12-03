
	<form id="inlogform" action="#" method="post">
		<p><u>Voer gebruikersnaam of email-adres in:</u></p>
		<table width="80%">
			<tr><th colwidth="40%"></th><th colwidth="60%"></th></tr>
			<tr><td>Voornaam: <super>*</super></td><td><input required type="text" id="voornaam" name="voornaam" value= "<?php echo $voornaam ?>"></td><td></td></tr>
			<tr><td>Initialen:</td><td><input type="text" id="initiaal" name="initiaal" value= "<?php echo $initiaal ?>"></td><td></td></tr>
			<tr><td>Tussenvoegsel:</td><td><input type="text" id="tussenv" name="tussenv" value= "<?php echo $tussenv ?>"></td><td></td></tr>
			<tr><td>Achternaam: <super>*</super></td><td><input required type="text" id="achternaam" name="achternaam" value= "<?php echo $achternaam ?>"></td><td></td></tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td></tr>
			<tr><td>Email-adres: <super>*</super></td><td><input required type="email" id="emailcont" name="email" value= "<?php echo $email ?>" placeholder="naam123@provider.nl"></td><td></td></tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td><td></td></tr>
			<tr><td colspan="2" id="pcaptcha"><i>Om uit te sluiten dat je een robot bent, vragen we je om onderstaande beeldpuzzel op te lossen.  Vul daarna een wachtwoord in (en bevestig deze nogmaals) en druk dan op de knop 'Maak account aan'.</i></td><td></td></tr>
			<tr><td colspan="2" class="tdcaptcha">
					<div id="captcha">
						<input type="hidden" id="captchavolgorde" name="captchavolgorde" value="">
						<?php plaatschaptchadivs() ?>
					</div>
				</td>
				<td>
					<div id="voorbeeldfoto">
						<script>
							fotoid = document.getElementById("fotoid").value;
							document.write ('<img src="afbeeldingen/captchafotos/foto' + fotoid + '.png" alt="foto' + fotoid + '">');
						</script>
						<p><i>voorbeeld</i></p>
					</div>
				</td>
			</tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td><td></td></tr>
			<tr><td id="wachtwoord">wachtwoord: <super>*</super></td><td><input required type="password" id="wachtwoord01" name="wachtwoord01"></td><td></td></tr>
			<tr><td id="wachtwoord">bevestig wachtwoord: <super>*</super></td><td><input required type="password" id="wachtwoord02" name="wachtwoord02"></td><td></td></tr>
			<tr><td class="blank">xxx</td><td class="blank">xxx</td><td></td></tr>
			<tr><td colspan="2" id="tdknop" align="center"><input type="submit" id="aanmaken_acct" name="aanmaken_acct" value="Maak account aan"></td><td></td></tr>
		</table>
		<br/>
		<p class="px12"><super>*</super><i>verplicht veld</i></p>
	</form>
