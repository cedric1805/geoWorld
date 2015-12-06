<?php
	function calcul ($long_depart, $lat_depart, $date) {
		$resultats_calcul = array();
		//parametres calcul
		//$long_depart = 2.34890667295726;
		//$lat_depart = 48.8645759658477;
		$long_arrivee = 2.176139;
		$lat_arrivee = 48.890218;
		$API_KEY = "e2d2010d-9c5b-47b8-88a7-424202c0fa14";
		//requete
		//http://api.navitia.io/v1/journeys?from=2.34890667295726;48.8645759658477&to=2.176139;48.890218&datetime=20151118T0700
		//$req = "http://api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date";
		
		// Possibilité d'utiliser l'identification via : http://user:mdp@site.com
		// Exemple : http://e2d2010d-9c5b-47b8-88a7-424202c0fa14@api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date
		// Donc : http://e2d2010d-9c5b-47b8-88a7-424202c0fa14@api.navitia.io/v1/journeys?from=2.34890667295726;48.8645759658477&to=2.176139;48.890218&datetime=20151118T0700

		//parametre authentification
		/*
		$API_KEY = "e2d2010d-9c5b-47b8-88a7-424202c0fa14";
		$context = stream_context_create(array(
			'http' => array(
				'method' => 'GET',
				'header' => 'Authorization: '.$API_KEY
			)
		));
		$data = file_get_contents($req, false, $context);
		*/
		$req = "http://$API_KEY@api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date";
		$data = file_get_contents($req, false);//, $context);

		//recuperer 
		$obj = json_decode($data, true);
		//print_r($obj);

		$co2_emission = $obj["journeys"][0]['co2_emission']['value'];
		

		$resultats_calcul = array("co2_emission" => $co2_emission);

		

		return ($resultats_calcul);
	}
?>