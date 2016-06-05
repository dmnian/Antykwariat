<?php 
session_start();

if(isset($_SESSION['koszyk'])){
	$ksiazki = $_SESSION['koszyk'];

	if(in_array($_POST['idKsiazki'], $ksiazki)){
		echo "ta ksiazka zostala juz dodana do koszyka!";
	} else {

		$ksiazki[] = $_POST['idKsiazki'];
		$_SESSION['koszyk'] = $ksiazki;
		echo "Dodano do koszyka";
	}
} else {
	$ksiazki[] = $_POST['idKsiazki'];
	$_SESSION['koszyk'] = $ksiazki;
	echo "Dodano do koszyka";
}


?>