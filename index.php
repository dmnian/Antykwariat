<?php 
	session_start();
 ?>
<html lang="pl">
<head>
	<meta charset="UTF-8">
	<title>Antykwariat</title>
	<link rel="stylesheet" href="style/bootstrap.min.css">
	<link rel="stylesheet" href="style/style.css">
	<script src="scripts/jquery-1.12.4.min.js"></script>
	 <script src="scripts/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<header>
			<h1>Antykwariat</h1>
		</header>
		<nav class="row">
			<ul id='menu'>
				<li><a href="index.php" class='btn btn-default'>home</a></li>
				<li><a href="#" class='btn btn-default'id="ksiazki">ksiazki</a></li>
				<li><a href="#" class='btn btn-default' <?php  echo (isset($_SESSION['zalogowany'])) ? "id='zamowienia'>zamówienia" : "id='zarejestruj'>zarejestruj się"; ?></a></li>
				<li><a href="#" class='btn btn-default' <?php  echo (isset($_SESSION['zalogowany'])) ? "id='wyloguj'>wyloguj się" : "id='zaloguj'>zaloguj się"; ?></a></li>
				<li><a href="#" class='btn btn-default'id="koszyk">koszyk</a></li>
			</ul>
		</nav>
		<section>
			<article id ='tresc'>
			<br>
			<h3>Witam wszystkich serdecznie na stronie antykwariatu!</h2> <br>
			<p>		Zapraszam was wszystkich do śledzenia oferty oraz wybierania najlepszych kąsków, w dziale książki będą sie sukcesywnie pojawiać coraz to nowe pozycje. Chociaż nazwa antykwariat sugerowałaby pojawianie się starszych tytułów to nie ograniczamy się wyłącznie do starych pozycji. Naszą główną wytyczną jest sprowadzanie książek ktore podobają się wam: pasjonatom. Także raz jeszcze zapraszam. <br> <br>
			Podpisano:<br>Główny redaktor.</p> 
			</article>
		</section>
		
		<footer>Antykwariat 2016 by Damian</footer>
		<script type="text/javascript" src="scripts/script.js"></script>
	</div>
</body>
</html>