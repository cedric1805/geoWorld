var RETOUR_PHP = [];

$(document).ready(function() {
	$('#nbLancer').val('0');
	$('#nbRetour').val('0');
	$('#lancer').click(function() {
		$.ajax({
			url : 'remplirTabl2.php',
			type : 'POST',
			data : 'retour=' + JSON.stringify(RETOUR_PHP),
			success : function(retour) {
				console.log(retour);
			}
		});
	});
});

function initMap() {
		$.ajax({
			url : 'json.php?debut=' + $('#debut').val() + '&fin=' + $('#fin').val(),
			success : function(retour) {
				var data = JSON.parse(retour);
				$.each(data, function(i, elm) {

					setTimeout(function() {

						//console.log(elm.ID_BKC);
						$('#sortie').append(elm.ID_BKC+'\n');
						// ID_BKC LatArrive LatDepart LonArrive LonDepart

						$('#nbLancer').val(1+parseInt($('#nbLancer').val()));
						var service = new google.maps.DistanceMatrixService();
						service.getDistanceMatrix({
						    destinations: [new google.maps.LatLng(elm.LatArrive, elm.LonArrive)],
						    origins: [new google.maps.LatLng(elm.LatDepart, elm.LonDepart)],
						    travelMode: google.maps.TravelMode.TRANSIT,
						    //transitOptions: TransitOptions,
						    unitSystem: google.maps.UnitSystem.METRIC,
						    avoidHighways: false,
						    avoidTolls: false
						}, function callback(response, status) {
							//console.log(response, status);
							if (status == google.maps.DistanceMatrixStatus.OK) {
							    var origins = response.originAddresses;
							    var destinations = response.destinationAddresses;


								var val = response.rows[0].elements[0];
							    if (val.status == 'OK')  {
									RETOUR_PHP.push({
										adresse : response.originAddresses[0],
										distance : val.distance.text,
										duration : val.duration.text,
										dist : val.distance.value,
										dur : val.duration.value,
										identifiant : elm.ID_BKC
									});
							    } else {
									RETOUR_PHP.push({
										adresse : -1,
										distance : -1,
										duration : -1,
										dist : -1,
										dur : -1,
										identifiant : elm.ID_BKC
									});
							    }
								$('#nbRetour').val(RETOUR_PHP.length);
							}
						});

					}, i*100);

				});
			}
		});
}
