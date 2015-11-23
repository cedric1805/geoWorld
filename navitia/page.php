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
		$long_depart=2.34890667295726;
		$lat_depart=48.8645759658477;
		$long_arrivee=2.176139;
		$lat_arrivee=48.890218;
		$date="20151118T0700";
		//requete
		//http://api.navitia.io/v1/journeys?from=2.34890667295726;48.8645759658477&to=2.176139;48.890218&datetime=20151118T0700
		$req="http://api.navitia.io/v1/journeys?from=$long_depart;$lat_depart&to=$long_arrivee;$lat_arrivee&datetime=$date";
		
		//parametre authentification
		$API_KEY = "e2d2010d-9c5b-47b8-88a7-424202c0fa14";
		$context = stream_context_create(array(
    		'http' => array(
        		'method' => 'GET',
        		'header' => 'Authorization: '.$API_KEY
    		)
		));
		$data = file_get_contents($req, false, $context); 
		echo $data;



		


		//recuperer
		//$data = json_decode($jsonString, true);
		//$obj = var_dump(json_decode($json,true));
		//echo "la";
		//print $obj->{"tickets"};
		//echo $data();
		//print_r $journeys = $data["journeys"]['co2_emission']['value'];

	?>

</body>
</html>