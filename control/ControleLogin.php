<?php
session_start();
header("Content-Type: text/xml; charset=ISO-8859-1");

include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/JogadorDAO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/JogadorVO.php");

/*echo "chegou no controle";*/

if (isset($_POST['login']) && isset($_POST['senha'])) {
	//session_start();

	$login = $_POST['login'];
	$senha = $_POST['senha'];

	if ($login == '' || $senha == '') {
		echo 'Preencha todos os campos do formulário!';

	} else {
		$jogadorVO = new JogadorVO();
		$jogadorDAO = new JogadorDAO();

		$jogadorVO = $jogadorDAO -> getByLogin($login);

		if ($jogadorVO == NULL) {
			echo 'Jogador não cadastrado!';

		} elseif ($jogadorVO -> login != $login || $jogadorVO -> senha != $senha) {
			echo 'Login ou Senha incorretos!';

		} else {
			$_SESSION['idJogador'] = $jogadorVO -> id;
			$_SESSION['loginJogador'] = $jogadorVO -> login;

			//echo 'Entrou! Id do jogador: '.$_SESSION['idJogador'];
			echo 'acessoLiberado';

		}
	}

} else {
	echo 'Erro ao carregar dados do formuário!';
}
?>