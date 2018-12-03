
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/pagina_includes/algemeen/head.php'; ?>

	<body>
		<body><header><h2>Mijn WebLog <i>(bericht plaatsen)</i></h2></header>

		<section>
		<?php
			$site = "plaatsen";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/pagina_includes/algemeen/nav.php';
			include 'includes/functionele_includes/plaatsen/plaatsenberichten.php';
			include 'includes/pagina_includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/pagina_includes/algemeen/footer.php' ?>
	</body>
</html>
