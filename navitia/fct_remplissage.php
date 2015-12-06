<?php
	//Fonction qui rentre le resultat du calcul 
	function remplissage($a_inserer, $id) {

		//Ecrit le resultat dans la BDD
		$sql_update = "UPDATE depart SET resultat = '$a_inserer' WHERE id = '$id' LIMIT 1 ";

		//Envoie une requete à un serveur MySQL
		$requete_update = mysql_query($sql_update);
		if (!$requete_update) {
			die('Requête invalide : ' . mysql_error());
		}


/*		//Envoie une requete à un serveur MySQL
		$requete_affiche = mysql_query("SELECT * FROM depart WHERE id = '$id' ");
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
		mysql_free_result($requete_affiche);*/



	}
?>