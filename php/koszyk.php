<?php 
session_start();
include '../connect.php';

if(isset( $_SESSION['koszyk']) && count($_SESSION['koszyk'])!= 0) {
	$tab = $_SESSION['koszyk'];
	echo "<table class='tabela'>";

	$sql = "SELECT * FROM ksiazki INNER JOIN kategorie ON ksiazki.id_kategorii=kategorie.id_kategorii WHERE dostepnosc!=0";

	$result = $conn->query($sql);
	$wartosc = 0;
	echo "<tr><th>tytuł:</th><th> autor:</th> <th>rok wydania:</th> <th>cena:</th><th>kategoria:</th><th>usuń</th></tr>";
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){

			if(in_array($row['id_ksiazki'], $tab)){		
				printf("<tr  data-id=%d><td>%s</td><td> %s</td> <td>%d</td> <td class ='cena'>%.2f</td><td>%s</td><td><button class="."'delete'".">usuń</button></td></tr>", $row['id_ksiazki'], $row["tytul"], $row["autor"], $row["rok"], $row["cena"], $row["nazwa"]);
				$wartosc += $row['cena'];
			}
		}
	}


	echo "</table>";
	// echo "<br>tablica: <br>".json_encode($tab);
	
	print("<select id='przesylka'>
	<option value='6.50'>Poczta polska: 6.50zł</option>
	<option value='12.50'>Poczta polska pobranie: 12.50zł</option>
	<option value='20.00'>Kurier: 20.00zł</option>
	<option value='25.90'>Kuerier pobraniowa: 25.90zł</option>
</select>");
	

	$_SESSION['wartosc'] = $wartosc;
	echo "<button id='wartosc'>Oblicz wartość</button>";
	echo "<div id='suma'></div>";
	

echo (isset($_SESSION['id_uzytkownika'])) ? "<button id='zamow'>Zamów</button>": "<br>aby złożyć zamówienie należy być zalogowanym!";

}else {
	echo " koszyk pusty";
}


?>