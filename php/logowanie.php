<?php 
session_start();
include '../connect.php';

$login_user = $_POST['login'];
$haslo_user = $_POST['haslo'];

$sql = "SELECT * FROM uzytkownicy WHERE login='$login_user' AND haslo='$haslo_user'";

$result = $conn->query($sql);

if($result->num_rows > 0 && $row = $result->fetch_assoc()){
	$login = $row['login'];
	$haslo = $row['haslo'];

	if($login_user == $login && $haslo_user == $haslo){
		$_SESSION['zalogowany'] = true;
		$_SESSION['id_uzytkownika'] = $row['id_uzytkownika'];
		echo "udalo sie zalogowac!";
	} else {
		echo "niepoprawny login lub haslo!";
	}

} else {
	echo "nie udalo sie zalogowac";
}



?>