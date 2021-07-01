<?php
session_start();

if ($_SESSION['idJogador']) {
	header("Content-Type: text/xml; charset=ISO-8859-1");

	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaVO.php");

	$partidaVO = new PartidaVO();
	$partidaDAO = new PartidaDAO();
	$idPartida = $_SESSION['idPartida'];
	$idJogador = $_SESSION['idJogador'];

	$partidaVO = $partidaDAO -> getById($idPartida);

	if ($partidaVO -> vez == $idJogador) {
		echo "true";
	} else {
		echo "false";
	}

} else {
	header('Location: ../');

}
?>