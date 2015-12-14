//restriction element
var form_button = document.getElementById("action");

function fonction_appel(){

	// création de l'objet xhr
	var ajax = new XMLHttpRequest();

	// destination et type de la requête AJAX (asynchrone ou non)
	ajax.open('POST', 'page.php', true);

	// métadonnées de la requête AJAX
	ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

	// evenement de changement d'état de la requête
	ajax.addEventListener('readystatechange',  function(e) {
	    // si l'état est le numéro 4 et que la ressource est trouvée
	    if(ajax.readyState == 4 && ajax.status == 200) {
	        // le texte de la réponse
			document.getElementById("sortie").innerHTML = ajax.responseText;
	        //console.log(ajax.responseText);
	    }
	});	


	// données POST éventuelles de la requête AJAX
	var data = "";

	// envoi de la requête
	ajax.send(data);
	

};


