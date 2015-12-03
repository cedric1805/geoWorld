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

			//Envoie une requete à un serveur MySQL
			$result = mysql_query('SELECT lat_depart FROM depart');
			if (!$result) {
    			die('Requête invalide : ' . mysql_error());
			}

			//Retourne une ligne de résultat MySQL
			//sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
   				printf("lat_depart : %s ", $row[0]);
			}

			//Libère le résultat de la mémoire
			mysql_free_result($result);

			//Ferme la connexion MySQL
			mysql_close($db1);
?>


