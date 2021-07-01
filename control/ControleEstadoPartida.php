<?php
session_start();
if ($_SESSION['idJogador']) {
	header("Content-Type: text/xml");

	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
	include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaVO.php");

	$idJogador = $_SESSION['idJogador'];
	$partidaDAO = new PartidaDAO();
	$partidaVO = new PartidaVO();

	$partidaVO = $partidaDAO -> getPartidaJogadorPronta($idJogador);

	if (!($partidaVO == null)) {
		$_SESSION['idPartida'] = $partidaVO -> id;
		echo "estado:pronta";
		//header('Location:/DominoWEB/view/Jogo.php');
	}

} else {
	header('Location: ../');

}
?>