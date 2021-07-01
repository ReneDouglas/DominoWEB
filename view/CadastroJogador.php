<!DOCTYPE html>
<html>

	<head>
		<meta charset="ISO-8859-1">
		<title>DOMINÓ</title>

		<link rel="stylesheet" type="text/css" href="bootstrap-3.2/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="style.css">

		<script type="text/javascript" src="cadastroJogador.js" charset="utf-8"></script>

	</head>

	<body>

		<div id="cabecalho">
			Cadastro de Jogador
		</div>

		<div id="formulario">
			<form id="formeCadastro" name="formeCadastro" method="post" onsubmit="javascript: cadastrarJogador(); return false;" >

				<input type="text" name="login" id="login" size="20" maxlength="20" class="form-control" placeholder="Login" autofocus />
				<br />

				<input type="password" name="senha" id="senha" size="20" maxlength="20" class="form-control" placeholder="Senha" />
				<br />

				<input type="password" name="confirmaSenha" id="confirmaSenha" size="20" maxlength="20" class="form-control" placeholder="Repita Senha" />
				<br />

				<input type="submit" name="cadastrar" value="Cadastrar" class="btn btn-lg btn-primary btn-block" />
				<br />

				<input type="button" onclick = "javascript: cancela();" name="cancelar" value="Cancelar" class="btn btn-lg btn-danger btn-block" />

			</form>
		</div>

	</body>
</html>