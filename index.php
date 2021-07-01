<!DOCTYPE html>
<html>
	<head>
		<meta charset="ISO-8859-1">
		<title>Dominó</title>

		<link rel="stylesheet" type="text/css" href="view/bootstrap-3.2/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="view/style.css">

		<script type="text/javascript" src="view/verificarCamposLogin.js" charset="utf-8"></script>

	</head>
	<body>

		<div id="cabecalho"> Acesso ao Jogo </div>

		<div id="formulario">

			<form id="form1" name="form1" method="post" onsubmit="javascript: validarDados(); return false;" >
				<input type="text" id="login" name="login" size="20" maxlength="20" class="form-control" placeholder="Login" autofocus />
				<br />

				<input type="password" id="senha" name="senha" size="20" maxlength="20" class="form-control" placeholder="Senha" />
				<br />

				<input type="submit" name="botao" class="btn btn-lg btn-primary btn-block" value="Entrar" />
				<br />

				Não tem cadastro? <a href="view/CadastroJogador.php"> Clique aqui</a>

			</form>
		</div>

	</body>
</html>