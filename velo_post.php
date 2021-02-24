<?php include("connexion.php"); ?>

<?php

//récupérer ce qui a été sélectionné dans la liste déroulante 
//$valeur = $_POST['nomVille']; 


 
$req = $bdd->prepare('INSERT INTO velo (nomVelo, dateAchat, prix, description, prixLocation, type_id, localisation_id) 
                                VALUES(?, ?,?,?, ?, ?,?)');


$req->execute(array($_POST['nom'], $_POST['dateachat'], $_POST['prix'], $_POST['description'], $_POST['prixlocation'], $_POST['typevelo'],$_POST['localisation']));


// Redirection du visiteur vers la page des clients
header('Location: velos.php');
?>