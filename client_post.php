<?php include("connexion.php"); ?>

<?php

//récupérer ce qui a été sélectionné dans la liste déroulante 
$valeur = $_POST['nomVille']; 


 
$req = $bdd->prepare('INSERT INTO client (NomClient, prenomClient, dateNaissanceClient, telephone, emailClient,ville_id) 
                                VALUES(?, ?,?,?,?,?)');


$req->execute(array($_POST['nomClient'], $_POST['prenomClient'], $_POST['dateNaissanceClient'], $_POST['telephone'], $_POST['emailClient'],$_POST['nomVille']));


// Redirection du visiteur vers la page des clients
header('Location: clients.php');
echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
?>