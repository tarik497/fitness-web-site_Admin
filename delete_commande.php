<?php
include("config.php");

$id_commande = $_GET["id_commande"];
$req = "DELETE FROM commande WHERE id_commande=$id_commande";
mysqli_query($conn, $req);
header("location: commande.php");
?>