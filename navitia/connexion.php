<?php
	//Ouvre une connexion à un serveur MySQL
	$hote = "localhost";
	$login = "root";
	$pass = "";

	$db1 = mysql_connect($hote, $login, $pass)
		or die("Impossible de se connecter : " . mysql_error());
	echo 'Connexion réussie'.'</br>';

	//Connexion à la database
	$db_selected = mysql_select_db('geoworld', $db1);
	if (!$db_selected) {
		die ('Impossible de sélectionner la base de données : ' . mysql_error());
	}
?>


