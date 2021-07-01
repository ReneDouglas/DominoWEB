<?php
session_start();

if ($_SESSION['idJogador']) {
	header("Content-Type: text/xml; charset=ISO-8859-1");

	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");

	$id = $_SESSION['idJogador'];
	$partidaDAO = new PartidaDAO();
	$partidaDAO -> inserirPartida($id);
} else {
	header('Location: ../');

}
?>