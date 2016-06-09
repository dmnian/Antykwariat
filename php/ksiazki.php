	<?php 
	
	include '../connect.php';

	$sql = "SELECT * FROM ksiazki INNER JOIN kategorie ON ksiazki.id_kategorii=kategorie.id_kategorii WHERE dostepnosc!=0";

	$result = $conn->query($sql);

	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			$string = var_export($row, true);
		 // echo $string." <br>";
			printf("<div class='ksiazka' data-id=%d> <img src='images/%s' class='okladka'> <br> tytuł: <strong>%s</strong> <br> autor: %s <br> rok wydania: %d <br> cena: %.2fzł<br> opis: %s <br> kategoria: %s<br><br> <button class='dodaj btn btn-default'>dodaj do koszyka</button>	</div>", $row['id_ksiazki'], $row['zdjecie'], $row["tytul"], $row["autor"], $row["rok"], $row["cena"], $row["opis"], $row["nazwa"]);
		}
	}

		?>