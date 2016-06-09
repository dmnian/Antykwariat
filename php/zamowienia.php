<?php 
session_start();
include '../connect.php';
$id_uzytkownika = $_SESSION['id_uzytkownika'];
// echo $id_uzytkownika;

// $sql = "SELECT * FROM zamowienia INNER JOIN zamowienia_ksiazki ON zamowienia.id_zamowienia = zamowienia_ksiazki.id_zamowienia INNER JOIN ksiazki ON ksiazki.id_ksiazki=zamowienia_ksiazki.id_ksiazki WHERE id_uzytkownika=$id_uzytkownika ORDER BY zamowienia.id_zamowienia";

$sql = "SELECT * FROM zamowienia LEFT OUTER JOIN zamowienia_ksiazki ON zamowienia.id_zamowienia = zamowienia_ksiazki.id_zamowienia LEFT OUTER JOIN ksiazki ON ksiazki.id_ksiazki=zamowienia_ksiazki.id_ksiazki WHERE id_uzytkownika=$id_uzytkownika ORDER BY zamowienia.id_zamowienia";

$result = $conn->query($sql);

if($result->num_rows >0){
	echo "<br><table class='table-striped table'>";
	$id = -1;
	while($row = $result->fetch_assoc()){
		if($id != $row['id_zamowienia']){
			echo ($id != -1) ? "<tr><th><br><br></th><th><br><br></th><th><br><br></th><th><br><br></<th></th></tr>" : "";
			echo "<tr><th>nr zamówienia</th><th>stan zamówienia</th><th>wartość zamowienia</th><th>data złożenia</th></tr>";
			printf("<tr><td>%d</td><td>%s</td><td>%.2f</td><td>%s</td></tr>", $row['id_zamowienia'], $row['stan'], $row['wartosc'], $row['data']);
			echo "<tr><th></th><th>tytul</th><th>autor</th><th>cena</th></tr>";
			printf("<tr><td></td><td>%s</td><td>%s</td><td>%.2f</td></tr>", $row['tytul'], $row['autor'], $row['cena']);
			$id = $row['id_zamowienia'];
		} else {
			printf("<tr><td></td><td>%s</td><td>%s</td><td>%.2f</td></tr>", $row['tytul'], $row['autor'], $row['cena']);
		} 
	}
	echo "</table>";
}


?>
