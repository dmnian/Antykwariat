<?php 
session_start();
include '../connect.php';

if(isset( $_SESSION['koszyk']) && count($_SESSION['koszyk'])!= 0) {
	$tab = $_SESSION['koszyk'];
	echo "<table class='tabela'>";

	$sql = "SELECT * FROM ksiazki INNER JOIN kategorie ON ksiazki.id_kategorii=kategorie.id_kategorii WHERE dostepnosc!=0";

	$result = $conn->query($sql);

	echo "<tr><th>tytuł:</th><th> autor:</th> <th>rok wydania:</th> <th>cena:</th><th>kategoria:</th><th>usuń</th></tr>";
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){

			if(in_array($row['id_ksiazki'], $tab)){		
				printf("<tr  data-id=%d><td>%s</td><td> %s</td> <td>%d</td> <td>%.2f</td><td>%s</td><td><button class="."'delete'".">usuń</button></td></tr>", $row['id_ksiazki'], $row["tytul"], $row["autor"], $row["rok"], $row["cena"], $row["nazwa"]);
			}
		}
	}

	echo "</table>";

	echo "tablica: <br>".json_encode($tab);
}else {
	echo " koszyk pusty";
}
?>