<?php
session_start();
header("Content-Type: text/xml");

include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PecaVO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PecaDAO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaDAO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PartidaVO.php");

$idJogador = $_SESSION['idJogador'];
$idPartida = $_SESSION['idPartida'];
$loginJogador = $_SESSION['loginJogador'];

$pecaVO = new PecaVO();
$pecaDAO = new PecaDAO();

$listaPecas = $pecaDAO -> getById($idJogador, $idPartida);

if (sizeof($listaPecas) == 7) {

	$partidaDAO = new PartidaDAO();
	$partidaDAO -> atualizarVencedor($idJogador, $idPartida);

	$listaDePartidas = $partidaDAO -> getPartidas();
	echo "O jogador $loginJogador venceu!!";
} else {
	echo "null";
}
?>