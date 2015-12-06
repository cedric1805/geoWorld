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

		//Inclusions 
		include("fct_recuperation_lat_long.php");
		include("fct_calcul.php");
		include("fct_remplissage.php");



		//Appel fonction de recuperation
		$tab_resulat = recup_lat_long();

		//Test si le tableau de la BDD n'est pas entièrement traité
		if ($tab_resulat["Continue?"] == True) {
			echo "CONTINUONS !<br/>";
			print_r($tab_resulat);

			$id = $tab_resulat["id"];
			$long_depart = $tab_resulat["long_depart"];
			$lat_depart = $tab_resulat["lat_depart"];

			print_r('</br>'.$id.'</br>');
			print_r($lat_depart.'</br>');
			print_r($long_depart.'</br>');

			//Parametres de calcul 
			$date = "20151118T0700"; //a modifier en JS

			//Appel fonction calcul
			$resultats_calcul = calcul ($long_depart, $lat_depart, $date);
			print_r($resultats_calcul);
			$co2_emission = $resultats_calcul["co2_emission"];

			print_r('</br>'.$co2_emission.'</br>');

			//Appel fonction remplissage 
			remplissage($co2_emission, $id);

		}

		else {
			echo "STOP !";
		}

		//Ferme la connexion MySQL
		mysql_close($db1);
	?>

</body>
</html>