<?php include("connexion.php"); ?>

<?php

//récupérer ce qui a été sélectionné dans la liste déroulante 
$valeur = $_POST['nomVille']; 


 
$req = $bdd->prepare('INSERT INTO localisation (nomLocalisation, descriptionLocalisation,ville_id) 
                                VALUES(?, ?,?)');


$req->execute(array($_POST['nomLocalisation'], $_POST['descriptionLocalisation'], $_POST['nomVille']));


// Redirection du visiteur vers la page des clients
header('Location: localisations.php');
 
?>