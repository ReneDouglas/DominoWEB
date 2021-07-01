<!DOCTYPE html>
<html>
	<head>

	<?php session_start();

	if (!$_SESSION['idJogador'] || !$_SESSION['idPartida']) {
		header('Location: ../');

	}
	?>

		<title>Domino</title>

		<link rel="stylesheet" type="text/css" href="style.css">

		<script type="text/javascript" charset="UTF-8" src="gerenciarSessao.js"></script>

	</head>

	<body onload="setInterval('javascript:verificarVez(); verificarJogada(); pecasJogadas(); pecasInimigo(); verificarVencedor();', 800); javascript:verificarUsuario();" >

		<canvas tabindex='1' id="mesaDomino" width=800 height=480>

		</canvas>

		<script type="text/javascript" charset="UTF-8" src="Jogo.js"></script>

		<div id="usuario" >

		</div>
	</body>
</html>

