<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Tranports en commun via l'API Navitia</title>
  <style type="text/css">
    html { height: 100% }
    body { height: 100%; margin: 0px; padding: 0px }
  </style>
</head>
<body>
	<?php

		//parametres calcul
		$long_depart = 2.34890667295726;
		$lat_depart = 48.8645759658477;
		$long_arrivee = 2.176139;
		$lat_arrivee = 48.890218;
		$date = "20151118T0700";
		//requete
		//http://api.navitia.io/v1/journeys?from=2.34890667295726;48.8645759658477&to=2.176139;48.890218&datetime=20151118T0700
		//$req = "http://api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date";
		
		// Possibilité d'utiliser l'identification via : http://user:mdp@site.com
		// Exemple : http://e2d2010d-9c5b-47b8-88a7-424202c0fa14@api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date
		// Donc : http://e2d2010d-9c5b-47b8-88a7-424202c0fa14@api.navitia.io/v1/journeys?from=2.34890667295726;48.8645759658477&to=2.176139;48.890218&datetime=20151118T0700

		//parametre authentification
		/*$API_KEY = "e2d2010d-9c5b-47b8-88a7-424202c0fa14";
		$context = stream_context_create(array(
			'http' => array(
				'method' => 'GET',
				'header' => 'Authorization: '.$API_KEY
			)
		));*/
		$req = "http://e2d2010d-9c5b-47b8-88a7-424202c0fa14@api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date";
		//$data = file_get_contents($req, false, $context);
		$data = file_get_contents($req, false);//, $context);

		//recuperer
		$obj = json_decode($data, true);
		//print_r($obj);
		echo $journeys = $obj["journeys"][0]['co2_emission']['value'];

	?>

</body>
</html>