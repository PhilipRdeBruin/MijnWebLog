
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/pagina_includes/algemeen/head.php'; ?>

	<body>

<?php
	if (isget('profiel') != "") {
		$profiel = $_GET['profiel'];
		$profielnaam = naam_from_id ($profiel);
//		phpAlert ("profielnaam = $profielnaam");
		$titel = "Profielpagina van $profielnaam";
	} else {
		$profielnaam = "";
		$titel = "Mijn Weblog";
	}
 ?>

		<header><h2><?php echo $titel; ?></h2></header>

		<section>
		<?php
			$site = "index";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/pagina_includes/algemeen/nav.php';
			include 'includes/pagina_includes/index/toonberichten.php';
			include 'includes/pagina_includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/pagina_includes/algemeen/footer.php' ?>
	</body>
</html>
