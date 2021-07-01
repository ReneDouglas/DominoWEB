function encerrarSessao() {
	
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4) {
			// Quando estiver completado o Carregamento
			var resultados = xmlhttp.responseText;
			
			//alert(resultados);

			window.location = '../';

		}
	};

	// Envia via método GET as informações
	xmlhttp.open("GET", "../control/EncerrarSessao.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send(null);

}

function verificarUsuario() {
	var xmlhttp;
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();

	} else if (window.ActiveXObject) {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

	} else {
		alert("Your browser does not support XMLHTTP!");
		return;

	}

	// Carrega a função de execução do AJAX
	xmlhttp.onreadystatechange = function() {

		if (xmlhttp.readyState == 4) {
			// Quando estiver completado o Carregamento
			var resultados = xmlhttp.responseText;

			document.getElementById("usuario").innerHTML = resultados;

		}
	};

	// Envia via método GET as informações
	xmlhttp.open("GET", "../control/VerificarUsuario.php", true);
	// 'GET',classePHP
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=iso-8859-1");
	xmlhttp.send(null);

}