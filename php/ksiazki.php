	<?php 
	
	include 'connect.php';

	// $sql = "SELECT * FROM ksiazki WHERE id_ksiazki IN (SELECT zamowienia_ksiazki.id_ksiazki FROM zamowienia_ksiazki LEFT OUTER JOIN zamowienia ON zamowienia.id_zamowienia = zamowienia_ksiazki.id_zamowienia)"; 

	$sql = "SELECT * FROM ksiazki INNER JOIN kategorie ON ksiazki.id_kategorii=kategorie.id_kategorii WHERE dostepnosc!=0";

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$string = var_export($row, true);
		 // echo $string." <br>";
			printf("<div class='ksiazka'> <img src='images/%s' class='okladka'> <br> tytuł: <strong>%s</strong> <br> autor: %s <br> rok wydania: %d <br> cena: %.2fzł<br> opis: %s <br> kategoria: %s<br><br> <button class='dodaj'>dodaj do koszyka</button>	</div>", $row['zdjecie'], $row["tytul"], $row["autor"], $row["rok"], $row["cena"], $row["opis"], $row["nazwa"]);
		}
	}

	?>