<?php 
	include '../connect.php';

	$imie = $_POST['imie'];
	$nazwisko = $_POST['nazwisko'];
	$email = $_POST['email'];
	$login = $_POST["login"];
	$haslo = $_POST["haslo"];


	$sql = "INSERT INTO uzytkownicy VALUES (NULL, '$imie', '$nazwisko', '$login', '$haslo', '$email')";

	$conn->query($sql);

	echo "Poprawnie!";

 ?>