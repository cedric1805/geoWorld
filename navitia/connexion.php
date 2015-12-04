<?php
			session_start();

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
			$requete_selection = mysql_query('SELECT lat_depart, long_depart FROM depart WHERE id = 1 AND resultat = ""');
			if (!$requete_selection) {
    			die('Requête invalide : ' . mysql_error());
			}

			//Retourne une ligne de résultat MySQL
			//sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
			while ($row = mysql_fetch_array($requete_selection, MYSQL_NUM)) {
   				//printf("lat_depart : %s long_depart : %s", $row[0], $row[1]);
				
				//Envoie des variables vers page.php
   				$lat_depart = $row[0];
				$_SESSION['latitude'] = $lat_depart;

				$long_depart = $row[1];
				$_SESSION['longitude'] = $long_depart;
			}

			//Libère le résultat de la mémoire
			mysql_free_result($requete_selection);

			
			////////////////////////////////////////////////////////////////////////		
			// //Ecrit le resultat dans la BDD
			// $sql_update = 'UPDATE depart SET resultat = "" WHERE id = 1';

			// //Envoie une requete à un serveur MySQL
			// $requete_update = mysql_query($sql_update);
			// if (!$requete_update) {
   //  			die('Requête invalide : ' . mysql_error());
			// }

			// //Envoie une requete à un serveur MySQL
			// $requete_affiche = mysql_query('SELECT * FROM depart WHERE id = 1');
			// if (!$requete_affiche) {
   //  			die('Requête invalide : ' . mysql_error());
			// }

		
			// // on fait une boucle qui va faire un tour pour chaque enregistrement 
			// while($data = mysql_fetch_assoc($requete_affiche)) { 
   //  			// on affiche les informations de l'enregistrement en cours 
   // 	 			echo $data['resultat']; 
   //  			//echo ' <i>date de naissance : '.$data['date'].'</i><br>'; 
   //  		} 

			// //Libère le résultat de la mémoire
			// mysql_free_result($requete_affiche);

			//Ferme la connexion MySQL
			mysql_close($db1);
?>


