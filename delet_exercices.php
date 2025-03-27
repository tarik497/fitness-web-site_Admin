<?php
include("config.php");

$id_exercices = $_GET["id_exercices"];
$req = "DELETE FROM exercices WHERE id_exercices=$id_exercices";
mysqli_query($conn, $req);
header("location: allexercices.php");
?>