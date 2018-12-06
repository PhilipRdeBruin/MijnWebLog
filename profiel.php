
<!DOCTYPE html>
<html lang="nl">

	<?php include 'includes/pagina_includes/algemeen/head.php'; ?>

	<body>
		<body><header><h2>Mijn WebLog <i>(Profiel van <?php echo $_SESSION['naam']; ?>)</i></h2></header>

		<section>
		<?php
			$site = "profiel";
			include 'hulpbestanden/sessionvar.php';
			include 'includes/pagina_includes/algemeen/nav.php';
			include 'includes/pagina_includes/profiel/mijnprofiel.php';
			include 'includes/pagina_includes/algemeen/aside.php';
		?>
		</section>

		<?php include 'includes/pagina_includes/algemeen/footer.php' ?>
	</body>
</html>
