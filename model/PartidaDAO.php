<?php

include_once($_SERVER['DOCUMENT_ROOT']."/DominoWEB/model/PartidaVO.php");

class PartidaDAO
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
	function inserirPartida($idJogador)
	{
		$sqltxt="insert into `partida` (jogador1, estado) values ('".$idJogador."', 'espera')";
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
			return "ERRO AO INSERIR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	function deletarPartidasJogador($idJogador)
	{
		$sqltxt="DELETE FROM partida WHERE jogador1 = $idJogador OR jogador2 = $idJogador";
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
	
	function atualizar($idJogador, $idPartida)
	{
		$sqltxt="UPDATE `partida` SET `jogador2`='".$idJogador."' , `estado`='pronto' , `vez`= '".$idJogador."' WHERE id='".$idPartida."'";
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
			return "ERRO AO ATUALIZAR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	
	function atualizarVencedor($idJogador, $idPartida)
	{
		$sqltxt="UPDATE `partida` SET `estado`='finalizada' , `vencedor`= '".$idJogador."' WHERE id='".$idPartida."'";
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
			return "ERRO AO ATUALIZAR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	function atualizarVez($idJogador, $idPartida)
	{
		$sqltxt="UPDATE `partida` SET `vez`= '".$idJogador."' WHERE id='".$idPartida."'";
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
			return "ERRO AO ATUALIZAR CONTATE O SUPORTE: ".$msg;
		}
	}
	
	function getById($id)
	{
		$sqltxt="select * from partida where id=".$id;
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			$campos=mysql_fetch_array($res);
			$objPartida = new PartidaVO();
			$objPartida->id=$campos['id'];
			$objPartida->jogador1=$campos['jogador1'];
			$objPartida->jogador2=$campos['jogador2'];
			$objPartida->estado=$campos['estado'];
			$objPartida->vencedor=$campos['vencedor'];
			$objPartida->vez=$campos['vez'];

			$this->Desconectar();
			return $objPartida;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
	
	function getPartidas()
	{

		$sqltxt="select * from partida where estado='espera'";
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			//$campos=mysql_fetch_array($res);
			$listaPartidas = array();
			$i = 0;
			
			while ($partida = mysql_fetch_array($res, MYSQL_ASSOC)){
				
				$objPartida = new PartidaVO();
				$objPartida->id=$partida['id'];
				$objPartida->jogador1=$partida['jogador1'];
				
				$listaPartidas[$i] = $objPartida;
				$i++;
			}
			
			
			$this->Desconectar();
			return $listaPartidas;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
	
	function verificarMesmoJogador($idJogador, $idPartida)
	{
		$sqltxt="select * from partida where jogador1='".$idJogador."' and id='".$idPartida."'";
	
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			$campos=mysql_fetch_array($res);
			$objPartida = new PartidaVO();
				
			$objPartida->id=$campos['id'];
			$objPartida->jogador1=$campos['jogador1'];
			$objPartida->estado=$campos['estado'];
	
			$this->Desconectar();
			return $objPartida;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
	
	function getPartidaJogadorPronta($idJogador)
	{
		$sqltxt="select * from partida where jogador1='".$idJogador."' and estado='pronto'";
	
		$this->Conectar();
		$res=mysql_query($sqltxt,$this->conexao);
		if ($res && mysql_num_rows($res)>0)
		{
			$campos=mysql_fetch_array($res);
			$objPartida = new PartidaVO();
				
			$objPartida->id=$campos['id'];
			$objPartida->jogador1=$campos['jogador1'];
			$objPartida->estado=$campos['estado'];
	
			$this->Desconectar();
			return $objPartida;
		}
		else
		{
			$this->Desconectar();
			return NULL;
		}
	}
	
}

?>