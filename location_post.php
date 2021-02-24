<?php include("connexion.php"); ?>

<?php

//récupérer ce qui a été sélectionné dans la liste déroulante 
//$valeur = $_POST['nomVille']; 


 
$req = $bdd->prepare('INSERT INTO location (dateLocation, dureeLocation, commentaires, client_id, velo_id, responsable_id) 
                                VALUES(?, ?,?,?,?,?)');


$req->execute(array($_POST['datelocation'], $_POST['duree'], $_POST['commentaires'], $_POST['client'], $_POST['velo'],$_POST['respo']));


// Redirection du visiteur vers la page des clients
header('Location: locations.php');
 
?>