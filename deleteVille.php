<?php
//including the database connection file
include("connexion.php");
 
//getting id of the data from url
$id = $_GET['id'];
 
//deleting the row from table
$sql = "DELETE FROM ville WHERE idVille=:id";
$query = $bdd->prepare($sql);
$query->execute(array(':id' => $id));
 
//redirecting to the display page (index.php in our case)
header("Location:villes.php");
?>

 