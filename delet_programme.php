<?php
include("config.php");

$id_programmes = $_GET["id_programmes"];
$req = "DELETE FROM programmes WHERE id_programmes=$id_programmes";
mysqli_query($conn, $req);
header("location: allprogramme.php");
?>
