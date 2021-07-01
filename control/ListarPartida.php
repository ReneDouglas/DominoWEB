<?php
session_start();

if ($_SESSION['idJogador']) {
	
	header("Content-Type: text/xml; charset=ISO-8859-1");

	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaVO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/JogadorDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/JogadorVO.php");

	$listaDePartidas = array();
	$partidaDAO = new PartidaDAO();
	$jogadorDAO = new JogadorDAO();
	$listaDePartidas = $partidaDAO -> getPartidas();
	$i = 0;
	$linhas = "";
	$idJogador = $_SESSION['idJogador'];

	while ($i < sizeof($listaDePartidas)) {
		$partidaVO = new PartidaVO();
		$jogadorVO = new JogadorVO();

		$partidaVO = $listaDePartidas[$i];
		$jogadorVO = $jogadorDAO -> getById($partidaVO -> jogador1);
		// COLOCAR SO UM ECHO

		$linhas .= "<tr>
					<td>
						$partidaVO->id
					</td>
					<td>
						$jogadorVO->login
					</td>
					<td>
						<form method='post' action='../control/IniciarPartida.php'>
							<input type='hidden' id='idPartida' name='idPartida' value='$partidaVO->id'>
							<input type='hidden' id='idJogador' name='idJogador' value='$idJogador'>
							<input type='submit' value='Entrar'/>
						</form>
					</td>
				</tr>";
		$i++;
	}
	echo $linhas;

} else {
	header('Location: ../');

}
?>