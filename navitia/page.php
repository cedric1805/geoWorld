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
		
		//Acces BDD
		include("connexion.php");
		//Appel fonction de recuperation
		include("fct_recuperation_lat_long.php");
		$id = recup_lat_long()["id"];
		$long_depart = recup_lat_long()["long_depart"];
		$lat_depart = recup_lat_long()["lat_depart"];
		print_r($id.'</br>');
		print_r($lat_depart.'</br>');
		print_r($long_depart.'</br>');

		//Appel fonction calcul
		include("fct_calcul.php");

		//Appel fonction remplissage
		include("fct_remplissage.php");

		//Ferme la connexion MySQL
		mysql_close($db1);
	?>

</body>
</html>