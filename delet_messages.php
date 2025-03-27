<?php
include("config.php");

$id_message = $_GET["id_message"];
$req = "DELETE FROM messages WHERE id_message=$id_message";
mysqli_query($conn, $req);
header("location: messages.php");
?>