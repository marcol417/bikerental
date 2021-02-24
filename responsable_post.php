<?php include("connexion.php"); ?>

<?php

//récupérer ce qui a été sélectionné dans la liste déroulante 
//$valeur = $_POST['nomVille']; 


 
$req = $bdd->prepare('INSERT INTO responsable (nomResponsable, prenomResponsable, dateNaissanceResponsable, telephoneResponsable, emailResponsable, login, passwordResponsable, localisation_id) 
                                VALUES(?, ?,?,?,?, ?, ?,?)');


$req->execute(array($_POST['nom'], $_POST['prenom'], $_POST['datenaiss'], $_POST['telephone'], $_POST['emailResp'], $_POST['login'], $_POST['pass'],$_POST['localisation']));


// Redirection du visiteur vers la page des clients
header('Location: responsables.php');
echo '<script>alert("Welcome to Geeks for Geeks")</script>'; 
?>