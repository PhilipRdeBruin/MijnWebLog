
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/pagina_includes/algemeen/head.php'; ?>

	<body>
		<header><h2>Mijn WebLog <i>(inloggen)</i></h2></header>

		<section>
		<?php
			$site = "inlog";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/pagina_includes/algemeen/nav.php';
			include 'includes/pagina_includes/inlog/inlogopties.php';
			include 'includes/pagina_includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/pagina_includes/algemeen/footer.php' ?>
	</body>
</html>
