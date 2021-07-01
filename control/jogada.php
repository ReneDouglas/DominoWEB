<?php
session_start();
if ($_SESSION['idJogador']) {
	header("Content-Type: text/xml; charset=ISO-8859-1");

	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaVO.php");

	$vez = $_POST['vez'];

	echo $vez;

	if ($vez == "false") {
		$idPartida = $_SESSION['idPartida'];
		$idJogador = $_SESSION['idJogador'];
		$partidaVO = new PartidaVO();
		$partidaDAO = new PartidaDAO();

		$partidaVO = $partidaDAO -> getById($idPartida);

		if ($idJogador == $partidaVO -> jogador1) {
			$partidaDAO -> atualizarVez($partidaVO -> jogador2, $idPartida);
		} else {
			$partidaDAO -> atualizarVez($partidaVO -> jogador1, $idPartida);
		}

	}
} else {
	header('Location: ../');

}
?>