<?php include("connexion.php"); ?>

<?php
 //Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO Ville (codePostal, NomVille) 
								VALUES(?, ?)');
$req->execute(array($_POST['codePostal'], $_POST['ville']));
// Redirection du visiteur vers la page du minichat
header('Location: villes.php');
?>


