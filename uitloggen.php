<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/pagina_includes/algemeen/head.php'; ?>

	<body>

	<?php

	$naam = issessie('naam');
	$gebruikerid = issessie('gebruikerid');
	phpAlert ("gebruikerid = $gebruikerid");
	if ($naam != "") {
		update_laatste_loguit ($gebruikerid);
		$msgstr = schrijfstring ("$naam,||je bent succesvol uitgelogd!|| ||Tot ziens.");
		phpAlertPlus ($msgstr, "index.php");
	}
	session_destroy();
	?>

	</body>
</html>
