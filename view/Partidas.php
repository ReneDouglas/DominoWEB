<!DOCTYPE html>
<html>
	<head>
		<?php session_start();

		if (!$_SESSION['idJogador']) {
			header('Location: ../');
//die();
		}
		?>
		<meta charset="ISO-8859-1">
		<title>Domino</title>
		<link rel="stylesheet" type="text/css" href="style.css">

		<script type="text/javascript" charset="UTF-8" src="gerenciarPartidas.js"></script>
		<script type="text/javascript" charset="UTF-8" src="gerenciarSessao.js"></script>

	</head>
	<body onload="setInterval('javascript:atualizarTabela(); verificarEstadoPartida();', 1000); verificarUsuario();">

		<table id="tabela" border="0" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th colspan="3">Partidas</th>
				</tr>
				<tr>
					<th>ID</th>
					<th>Jogador</th>
					<th></th>
				</tr>
			</thead>
			<tbody id="corpo">

			</tbody>
			<tfoot>
				<tr>
					<th colspan="3">
					<input type="button" value="Criar Partida" onclick="javascript:criarPartida();">
					</th>
				</tr>
			</tfoot>
		</table>
		
		<div id="usuario" >
			
		</div>
		
	</body>
</html>
