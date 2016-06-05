<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Antykwariat</title>
	<link rel="stylesheet" href="style/style.css">
	<script src="scripts/jquery-1.12.4.min.js"></script>
</head>
<body>
	<header>
		<h1>Antykwariat</h1>
	</header>
	<nav>
		<ul id='menu'>
			<li><a href="index.php">home</a></li>
			<li><a href="#">ksiazki</a></li>
			<li><a href="#">zarejestruj się</a></li>
			<li><a href="#">zaloguj się</a></li>
			<li><a href="php/koszyk.php">koszyk</a></li>
		</ul>
	</nav>
	<section>
		<article>
		<br>
			<?php 
			include 'php/ksiazki.php';

			?>
		<br>
		</article>
	</section>



	<footer>Antykwariat 2016 by Damian</footer>
	<script type="text/javascript" src="scripts/script.js"></script>
</body>
</html>