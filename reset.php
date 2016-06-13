<?php 
include "connect.php";

$sql = "SET  FOREIGN_KEY_CHECKS = 0;";
$conn->query($sql);

$sql = "TRUNCATE
  zamowienia;";
$conn->query($sql);

$sql = "TRUNCATE
  zamowienia_ksiazki;";
$conn->query($sql);

$sql ="UPDATE ksiazki SET dostepnosc=1";
$conn->query($sql);

echo "sukces!";
 ?>