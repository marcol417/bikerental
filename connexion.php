<?php

try {
	$bdd = new PDO('mysql:host=localhost:3306;dbname=bikerental_bd', 'root', '');
}catch (Exception $e){
die('Erreur : ' . $e->getMessage());
}

?>