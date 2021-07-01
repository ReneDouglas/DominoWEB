<?php
session_start();

if ($_SESSION['idJogador']) {

	header("Content-Type: text/xml; charset=ISO-8859-1");

	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PecaDAO.php");

	$idJogador = $_SESSION['idJogador'];

	$partidaDAO = new PartidaDAO();
	$pecaDAO = new PecaDAO();

	$partidaDAO -> deletarPartidasJogador($idJogador);
	$pecaDAO -> deletarPecasJogador($idJogador);

	session_destroy();

} else {
	header('Location: ../');

}
?>