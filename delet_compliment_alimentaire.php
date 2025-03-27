<?php
include("config.php");

$id_compliment_alimentaire = $_GET["id_compliment_alimentaire"];
$req = "DELETE FROM compliment_alimentaire WHERE id_compliment_alimentaire=$id_compliment_alimentaire";
mysqli_query($conn, $req);
header("location: allcomplimentalimentaire.php");
?>
