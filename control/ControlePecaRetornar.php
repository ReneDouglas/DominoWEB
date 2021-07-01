<?php
session_start();
header("Content-Type: text/xml; charset=ISO-8859-1");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PecaVO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/PecaDAO.php");

$idJogador = $_SESSION['idJogador'];
$idPartida = $_SESSION['idPartida'];

$listaPecas = array();
$pecaDAO = new PecaDAO();
$listaPecas = $pecaDAO -> getById($idJogador, $idPartida);
$i = 0;
$linhas = "";

$linhas .= "<?xml version=\"1.0\" encoding=\"iso-8859-1\" ?>\n";
$linhas .= "<pecas>";
while ($i < sizeof($listaPecas)) {
	
	$pecaVO = new PecaVO();
	$pecaVO = $listaPecas[$i];

	$linhas .= "<peca posX='$pecaVO->posX' posY='$pecaVO->posY' img='$pecaVO->img' virada='$pecaVO->virada'/>";

	$i++;

}
$linhas .= "</pecas>";

echo $linhas;
?>