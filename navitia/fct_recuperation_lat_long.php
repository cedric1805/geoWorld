<?php 
	function recup_lat_long(){
		//Recuperation des lat_long et retourne si on peut continuer 
		//COMMENT RENVOYER TRUE OR FALSE ????
		$requete_ok = False; 
		$tab_resultat = array();

		//Envoie une requete à un serveur MySQL
		$query = "SELECT id, lat_depart, long_depart FROM depart WHERE resultat = '' LIMIT 1 ";
		$requete_selection = mysql_query($query); 
		if (!$requete_selection) {
			die('Requête invalide : ' . mysql_error());
		}

		//Retourne une ligne de résultat MySQL
		//sous la forme d'un tableau associatif, d'un tableau indexé, ou les deux
		while ($row = mysql_fetch_array($requete_selection, MYSQL_NUM)) {
				//printf("id : %s lat_depart : %s long_depart : %s", $row[0], $row[1], $row[2]);
			$requete_ok = True;
			//Envoie des variables vers page.php
			$id = $row[0];
			$long_depart = $row[1];
			$lat_depart = $row[2];
		}

		//Libère le résultat de la mémoire
		mysql_free_result($requete_selection);

		//On remplit le tableau uniquement si la requete est faisable  
		if ($requete_ok == True) {
			$tab_resultat = array("Continue?" => $requete_ok, "id" => $id, "long_depart" => $long_depart, 
				"lat_depart" => $lat_depart);
		}
		else {
			$tab_resultat = array("Continue?" => $requete_ok);
		}

		return ($tab_resultat);
	}

?>