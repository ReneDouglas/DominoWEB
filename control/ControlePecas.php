<?php
session_start();
header("Content-Type: text/xml");

include_once($_SERVER['DOCUMENT_ROOT']."/DominoWEB/model/PecaVO.php");
include_once($_SERVER['DOCUMENT_ROOT']."/DominoWEB/model/PecaDAO.php");

//echo 'entrou';
$idJogador = $_SESSION['idJogador'];
$idPartida = $_SESSION['idPartida'];

$peca1_img = $_POST['p1_img'];
$peca1_posX = $_POST['p1_posX'];
$peca1_posY = $_POST['p1_posY'];
$peca1_virada = $_POST['p1_virada'];
$peca1_jogada =  $_POST['p1_jogada'];
$peca1_dragok = $_POST['p1_dragok'];

$peca2_img = $_POST['p2_img'];
$peca2_posX = $_POST['p2_posX'];
$peca2_posY = $_POST['p2_posY'];
$peca2_virada = $_POST['p2_virada'];
$peca2_jogada =  $_POST['p2_jogada'];
$peca2_dragok = $_POST['p2_dragok'];

$peca3_img = $_POST['p3_img'];
$peca3_posX = $_POST['p3_posX'];
$peca3_posY = $_POST['p3_posY'];
$peca3_virada = $_POST['p3_virada'];
$peca3_jogada =  $_POST['p3_jogada'];
$peca3_dragok = $_POST['p3_dragok'];

$peca4_img = $_POST['p4_img'];
$peca4_posX = $_POST['p4_posX'];
$peca4_posY = $_POST['p4_posY'];
$peca4_virada = $_POST['p4_virada'];
$peca4_jogada =  $_POST['p4_jogada'];
$peca4_dragok = $_POST['p4_dragok'];

$peca5_img = $_POST['p5_img'];
$peca5_posX = $_POST['p5_posX'];
$peca5_posY = $_POST['p5_posY'];
$peca5_virada = $_POST['p5_virada'];
$peca5_jogada =  $_POST['p5_jogada'];
$peca5_dragok = $_POST['p5_dragok'];

$peca6_img = $_POST['p6_img'];
$peca6_posX = $_POST['p6_posX'];
$peca6_posY = $_POST['p6_posY'];
$peca6_virada = $_POST['p6_virada'];
$peca6_jogada =  $_POST['p6_jogada'];
$peca6_dragok = $_POST['p6_dragok'];

$peca7_img = $_POST['p7_img'];
$peca7_posX = $_POST['p7_posX'];
$peca7_posY = $_POST['p7_posY'];
$peca7_virada = $_POST['p7_virada'];
$peca7_jogada =  $_POST['p7_jogada'];
$peca7_dragok = $_POST['p7_dragok'];

//echo "peca_jogada1: $peca1_jogada";

if($peca1_posX < 500 && $peca1_jogada == "false" && $peca1_dragok == "false")
{
	//echo "vai cadastrar";
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca1_img;
	$pecaVO->posX = $peca1_posX;
	$pecaVO->posY = $peca1_posY;
	$pecaVO->virada = $peca1_virada;
	
	$pecaDAO->inserir($pecaVO);
	
	echo 'peca1';
}


if($peca2_posX < 500  && $peca2_jogada == "false" && $peca2_dragok == "false")
{
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca2_img;
	$pecaVO->posX = $peca2_posX;
	$pecaVO->posY = $peca2_posY;
	$pecaVO->virada = $peca2_virada;
	
	$pecaDAO->inserir($pecaVO);
	echo 'peca2';
}

if($peca3_posX < 500  && $peca3_jogada == "false" && $peca3_dragok == "false")
{
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca3_img;
	$pecaVO->posX = $peca3_posX;
	$pecaVO->posY = $peca3_posY;
	$pecaVO->virada = $peca3_virada;
	
	$pecaDAO->inserir($pecaVO);
	echo 'peca3';
}

if($peca4_posX < 500  && $peca4_jogada == "false" && $peca4_dragok == "false")
{
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca4_img;
	$pecaVO->posX = $peca4_posX;
	$pecaVO->posY = $peca4_posY;
	$pecaVO->virada = $peca4_virada;
	
	$pecaDAO->inserir($pecaVO);
	echo 'peca4';
	
}

if($peca5_posX < 500 && $peca5_jogada == "false" && $peca5_dragok == "false")
{
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca5_img;
	$pecaVO->posX = $peca5_posX;
	$pecaVO->posY = $peca5_posY;
	$pecaVO->virada = $peca5_virada;
	
	$pecaDAO->inserir($pecaVO);
	echo 'peca5';
}

if($peca6_posX < 500 && $peca6_jogada == "false" && $peca6_dragok == "false")
{
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca6_img;
	$pecaVO->posX = $peca6_posX;
	$pecaVO->posY = $peca6_posY;
	$pecaVO->virada = $peca6_virada;
	
	$pecaDAO->inserir($pecaVO);
	echo 'peca6';
}

if($peca7_posX < 500 && $peca7_jogada == "false" && $peca7_dragok == "false")
{
	$pecaVO = new PecaVO();
	$pecaDAO = new PecaDAO();
	
	$pecaVO->idJogador = $idJogador;
	$pecaVO->idPartida = $idPartida;
	$pecaVO->img = $peca7_img;
	$pecaVO->posX = $peca7_posX;
	$pecaVO->posY = $peca7_posY;
	$pecaVO->virada = $peca7_virada;
	
	$pecaDAO->inserir($pecaVO);
	echo 'peca7';
}

?>