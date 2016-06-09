<?php 
session_start();
include "../connect.php";

$id_ksiazek = $_SESSION['koszyk'];
$id_uzytkownika = $_SESSION['id_uzytkownika'];
$wartosc = $_SESSION['wartosc'];
$koszt = $_POST['koszt'];

$wartosc += $koszt;

$sql = "INSERT INTO zamowienia (id_uzytkownika, wartosc) VALUES ($id_uzytkownika, $wartosc)";
$conn->query($sql);
$id_zamowienia = $conn->insert_id;

foreach ($id_ksiazek as $id_ksiazki) {
	$sql = "INSERT INTO zamowienia_ksiazki (id_zamowienia, id_ksiazki) VALUES($id_zamowienia, $id_ksiazki)";
	$conn->query($sql);
	$sql = "UPDATE ksiazki SET dostepnosc=0 WHERE id_ksiazki=$id_ksiazki";	
	$conn->query($sql);
}

unset($_SESSION['koszyk']);

echo "zamowienie zlozone!";
?>