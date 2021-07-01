<?php

include_once($_SERVER['DOCUMENT_ROOT']."/DominoWEB/model/JogadorVO.php");

class JogadorDAO
{
	var $conexao;
	
	function Conectar()
	{
		$this->conexao = mysql_connect("localhost", "root", "");
		if ($this->conexao)
		{
			if (!mysql_select_db("domino",$this->conexao))
				$this->Desconectar();
		}
	}
	
	
	function Desconectar()
	{
		mysql_close($this->conexao);
		$this->conexao=0;
	}
	
	
	function inserir($JogadorVO)
	{
		$sqltxt="insert into `jogador` (login, senha) values ('".$JogadorVO->login."', '".$JogadorVO->senha."')";
		$this->Conectar();
		if (mysql_query($sqltxt,$this->conexao))
		{
			$this->Desconectar();
			return "Jogador cadastrado com sucesso!";
		}
		else
		{
			$msg=mysql_error($this->conexao);
			$this->Desconectar();
			return "ERRO AO INSERIR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	
	function getById($id)
	{
		$sqltxt="select * from jogador where id=".$id;
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			
			$Campos=mysql_fetch_array($res);
			$objJogador= new JogadorVO();
			$objJogador->id=$Campos['id'];
			$objJogador->login=$Campos['login'];
			$objJogador->senha=$Campos['senha'];

			$this->Desconectar();
			return $objJogador;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
	
	
	function getByLoginSenha($login, $senha)
	{
		$sqltxt="select * from jogador where login='".$login."' and senha='".$senha."'";
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			$Campos=mysql_fetch_array($res);
			$objJogador= new JogadorVO();
			$objJogador->id=$Campos['id'];
			$objJogador->login=$Campos['login'];
			$objJogador->senha=$Campos['senha'];

			$this->Desconectar();
			return $objJogador;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
	
	function getByLogin($login)
	{
		$sqltxt="select * from jogador where login='$login'";
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			$Campos = mysql_fetch_array($res);
			$objJogador = new JogadorVO();
			$objJogador->id = $Campos['id'];
			$objJogador->login = $Campos['login'];
			$objJogador->senha = $Campos['senha'];

			$this->Desconectar();
			return $objJogador;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
}

?>