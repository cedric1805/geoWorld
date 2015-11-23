<?php

if (isset($_GET['debut'])) {$debut = $_GET['debut'];} else {$debut = 0;}
if (isset($_GET['fin'])) {$fin = $_GET['fin'];} else {$fin = 100000;}

$lines = file('adresseGeoWorld.csv');
$json = array();
for ($n = $debut; $n < min($fin, count($lines)); $n++) {
	$tps = explode(';', $lines[$n]);
	$tps2 = array(
		//number_format($nombre, 8) 
		'ID_BKC' => intval($tps[0]),
		'LonDepart' => $tps[1], // floatval
		'LatDepart' => $tps[2], // floatval
		'LonArrive' => $tps[3], // floatval
		'LatArrive' => $tps[4] // floatval
	);
	$json[] = $tps2;
}
echo json_encode($json);
?>
