<?php

include_once($_SERVER['DOCUMENT_ROOT']."/DominoWEB/model/PecaVO.php");

class PecaDAO
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
	
	
	function inserir($pecaVO)
	{
		$sqltxt="insert into peca (idJogador, posX, posY, img, virada, idPartida) values ($pecaVO->idJogador, $pecaVO->posX, $pecaVO->posY, '$pecaVO->img', '$pecaVO->virada', $pecaVO->idPartida)";
		$this->Conectar();
		if (mysql_query($sqltxt,$this->conexao))
		{
			$this->Desconectar();
			return "peça cadastrada com sucesso!";
		}
		else
		{
			$msg=mysql_error($this->conexao);
			$this->Desconectar();
			return "ERRO AO INSERIR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	function deletarPecasJogador($idJogador)
	{
		$sqltxt="DELETE FROM peca WHERE idJogador = $idJogador";
		$this->Conectar();
		if (mysql_query($sqltxt,$this->conexao))
		{
			$this->Desconectar();
			return "OK";
		}
		else
		{
			$msg=mysql_error($this->conexao);
			$this->Desconectar();
			return "ERRO AO DELETAR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	function getById($idJogador, $idPartida) //retorna array
	{
		$sqltxt="select * from `peca` where `idJogador` <> ".$idJogador." and `idPartida` = ".$idPartida;
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			$pecas = array();
			$i = 0;
			
			while ($Campos = mysql_fetch_array($res, MYSQL_ASSOC)){
			
				//$Campos=mysql_fetch_array($res);
				$objPeca= new PecaVO();
				$objPeca->idJogador=$Campos['idJogador'];
				$objPeca->posX=$Campos['posX'];
				$objPeca->posY=$Campos['posY'];
				$objPeca->img=$Campos['img'];
				$objPeca->virada=$Campos['virada'];
				$objPeca->idPartida=$Campos['idPartida'];
				
				$pecas[$i] = $objPeca;
				$i++;
				
			}
			
			$this->Desconectar();
			return $pecas;
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