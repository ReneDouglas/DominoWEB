function cadastrarJogador() {

	var login = document.getElementById("login").value;
	var senha = document.getElementById("senha").value;
	var confirmaSenha = document.getElementById("confirmaSenha").value;

	if (login == '' || senha == '' || confirmaSenha == '') {
		alert("Preencha todos os campos do formulário!");

	} else if (senha != confirmaSenha) {
		alert("As senhas são diferentes!");

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
				// document.getElementById("formeCadastro").submit();
				// Quando estiver completado o Carregamento
				var statusCadastro = xmlhttp.responseText;
				alert(statusCadastro);
				window.location = "..";

			}
		};

		// Envia via método GET as informações
		// xmlhttp.open("GET", "../control/ControleJogador.php?login="+login+"?senha="+senha+"?confirmaSenha="+confirmaSenha, true);
		xmlhttp.open("POST", "../control/ControleJogador.php", true);

		// 'GET',classePHP
		xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1")

		// Envia via método POST as informações
		xmlhttp.send("login=" + login + "&senha=" + senha + "&confirmaSenha=" + confirmaSenha);
	}

}

function cancela() {

	window.location = "..";
	//abre a raiz http://localhost/DominoWEB

}
