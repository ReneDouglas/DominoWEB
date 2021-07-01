<?php
session_start();

if ($_SESSION['idJogador']) {
	header("Content-Type: text/xml; charset=ISO-8859-1");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaVO.php");

	$idPartida = $_POST['idPartida'];
	$idJogador = $_POST['idJogador'];

	//echo 'idPartida ' . $idPartida;
	//echo 'idJogador ' . $idJogador;

	$partidaDAO = new PartidaDAO();
	$partidaVO = new PartidaVO();

	$partidaVO = $partidaDAO -> verificarMesmoJogador($idJogador, $idPartida);

	if ($partidaVO == null) {
		$_SESSION['idPartida'] = $idPartida;
		$partidaDAO -> atualizar($idJogador, $idPartida);
		header('Location:/DominoWEB/view/Jogo.php');
	} else {
		header('Location:/DominoWEB/view/Partidas.php');
	}
} else {
	header('Location: ../');

}
?>