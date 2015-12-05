<?php
	function remplissage($a_inserer) {

		//Ecrit le resultat dans la BDD
		$sql_update = 'UPDATE depart SET resultat = $a_inserer WHERE id = 1';

		//Envoie une requete à un serveur MySQL
		$requete_update = mysql_query($sql_update);
		if (!$requete_update) {
			die('Requête invalide : ' . mysql_error());
		}

		//Envoie une requete à un serveur MySQL
		$requete_affiche = mysql_query('SELECT * FROM depart WHERE id = 1');
		if (!$requete_affiche) {
			die('Requête invalide : ' . mysql_error());
		}


		// on fait une boucle qui va faire un tour pour chaque enregistrement 
		while($data = mysql_fetch_assoc($requete_affiche)) { 
			// on affiche les informations de l'enregistrement en cours 
					echo $data['resultat']; 
			//echo ' <i>date de naissance : '.$data['date'].'</i><br>'; 
		} 

		//Libère le résultat de la mémoire
		mysql_free_result($requete_affiche);

	}
?>