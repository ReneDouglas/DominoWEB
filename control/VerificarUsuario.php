<?php
session_start();

if ($_SESSION['idJogador']) {

	header("Content-Type: text/xml; charset=ISO-8859-1");

	$loginJogador = $_SESSION['loginJogador'];

	echo "Bem vindo -- $loginJogador --<input type='button' id='sair' onclick='javascript: encerrarSessao();' value='Sair' />";
} else {
	header('Location: ../');

}
?>