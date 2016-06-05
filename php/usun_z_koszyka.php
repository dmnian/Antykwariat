<?php 
session_start();

$delete = $_POST['idUsuwanego'];

if(isset($_SESSION['koszyk'])){
	$ksiazki = $_SESSION['koszyk'];

	if(in_array($_POST['idUsuwanego'], $ksiazki)){
		for ($i=0; $i < count($ksiazki) ; $i++) { 
		if($ksiazki[$i] == $delete)  unset($ksiazki[$i]); else echo "brak elementu";
		}

		foreach ($ksiazki as $ks => &$value) {
			if($ksiazki[$ks] == $delete && isset($ksiazki[$ks])) unset($ksiazki[$ks]); else echo "brak elementu";
			echo $ks."  do usuniecia:".$delete."\n";
		}
		
		$_SESSION['koszyk'] = $ksiazki;
	} 
} 


?>