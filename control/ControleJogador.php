<?php

header("Content-Type: text/xml; charset=ISO-8859-1");

include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/JogadorDAO.php");
include_once ($_SERVER['DOCUMENT_ROOT'] . "/DominoWEB/model/JogadorVO.php");

if (isset($_POST['login']) && isset($_POST['senha']) && isset($_POST['confirmaSenha'])) {

	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$confirmaSenha = $_POST['confirmaSenha'];

	if ($login == "" && $senha == "" && $confirmaSenha == "") {
		echo 'Preencha todos os campos do formulário!';

	} else if ($senha != $confirmaSenha) {
		echo 'As senhas são diferentes!';

	} else {
		$jogadorDAO = new JogadorDAO();

		if ($jogadorDAO -> getByLogin($login) != NULL) {
			echo 'Já existe um cadastro para este login!';

		} else {
			$jogador = new JogadorVO();

			$jogador -> id = 0;
			$jogador -> login = $login;
			$jogador -> senha = $senha;

			$resultado = $jogadorDAO -> inserir($jogador);

			echo "$resultado";

		}

	}

} else {

	echo 'Erro ao carregar dados do formulário!';

}
?>
