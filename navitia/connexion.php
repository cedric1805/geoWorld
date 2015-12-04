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
			$result = mysql_query('SELECT lat_depart, long_depart FROM depart WHERE id = 1 AND resultat = ""');
			if (!$result) {
    			die('Requête invalide : ' . mysql_error());
			}

			//Retourne une ligne de résultat MySQL
			//sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
			while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
   				printf("lat_depart : %s long_depart : %s", $row[0], $row[1]);
			}

			//Libère le résultat de la mémoire
			mysql_free_result($result);

			////////////////////////////////////////////////////////////////////////		
			//Ecrit le resultat dans la BDD
			$requete_update = 'UPDATE depart SET resultat = "toto" WHERE id = 1';

			//Envoie une requete à un serveur MySQL
			$result_update = mysql_query($requete_update);
			if (!$result_update) {
    			die('Requête invalide : ' . mysql_error());
			}

			//Envoie une requete à un serveur MySQL
			$result_affiche = mysql_query('SELECT * FROM depart WHERE id = 1');
			if (!$result_affiche) {
    			die('Requête invalide : ' . mysql_error());
			}

			//Retourne une ligne de résultat MySQL
			//sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
			while ($row = mysql_fetch_array($result_update, MYSQL_NUM)) {
   				printf("lat_depart : %s long_depart : %s resultat : %s", $row[0], $row[1]);
			}
			//Libère le résultat de la mémoire
			mysql_free_result($result_affiche);

			//Ferme la connexion MySQL
			mysql_close($db1);
?>


