<?php include("connexion.php"); ?>

<?php
 //Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO typevelo (nomType, descriptionType) 
                                VALUES(?, ?)');
$req->execute(array($_POST['type'], $_POST['description']));
// Redirection du visiteur vers la page du minichat
header('Location: types.php');
?>