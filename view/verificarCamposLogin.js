function validarDados() {

	var login = document.getElementById("login").value;
	var senha = document.getElementById("senha").value;

	if (login == '' || senha == '') {
		alert("Preencha todos os campos do formulário!");

	} else {
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
				var statusLogin = xmlhttp.responseText;

				if (statusLogin == "acessoLiberado") {
					window.location = "view/Partidas.php";

				} else {
					alert(statusLogin);

				}
			}
		};

		/*
		 não é necessário colocar " ../ " porque o index está na raize embora
		 o arquivo JavaScript esteja numa pasta separada ele é incluído no index.php
		 */

		xmlhttp.open("POST", "control/ControleLogin.php", true);

		// 'GET',classePHP
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1")

		// Envia via método POST as informações
		xmlhttp.send("login=" + login + "&senha=" + senha);
	}

}

