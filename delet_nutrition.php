<?php
include("config.php");

$id_nutritions = $_GET["id_nutritions"];
$req = "DELETE FROM nutritions WHERE id_nutritions=$id_nutritions";
mysqli_query($conn, $req);
header("location: allnutrition.php");
?>
