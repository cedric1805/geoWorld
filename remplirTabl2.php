<?php
	if (isset($_POST['retour'])){
		$retours = json_decode($_POST['retour'], true);
		
		if (($handle = fopen("TestPoints.csv", "a+")) !== FALSE) {
			foreach ($retours as $r) {
				$line = $r['identifiant'] . ';' . $r['adresse'] . ';' . $r['dist'] . ';' . $r['distance'] . ';' 
				. $r['dur'] . ';' . $r['duration'] . "\r\n"; 
				fputs($handle, $line);
			}
			fclose($handle);
			print_r(count($retours) . ' éléments écrits !');
		}
	} else {
		echo "erreur lors de la réponse du serveur";
	}
?>