
<head>
	<?php
		session_start();
		include 'hulpbestanden/connectdb.php';
		include 'functies/sql_functies.php';
		include 'functies/php_functies.php';
		include 'functies/captchafuncties.php';
	?>


	<title>myBlog</title>

	<meta charset="iso-8859-1">
	<meta name="description" content="mijn WebLog">
	<meta name="keywords" content="mijn WebLog">
	<meta name="author" content="Philip de Bruin">

	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script src="functies/js_functies.js"></script>
	<script src="functies/dragendrop_functies.js"></script>

	<link rel = "stylesheet" href = "css/flexbox.css">
	<link rel = "stylesheet" href = "css/myblog.css">
	<link rel = "stylesheet" href = "css/captcha.css">
</head>
