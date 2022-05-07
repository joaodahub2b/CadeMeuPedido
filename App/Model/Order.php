<?php

class Order{

	public static function Select(){
		$connection = Connection::getConn();

		$query = "SELECT * FROM order ORDER BY id DESC";
		$query = $connection->prepare($query);
		$query->execute();
		$response = array();

		while($row = $query->fetchObject('Order')){
			$response[] = $row;
		}
		if(!$response){
			throw new Exception("Nenhuma ordem foi localizada no banco de dados");
		}
		return $response;

		
	}

	public static function SelectById($idUsuario){
		/*$connection = Connection::getConn();

		$query = "SELECT * FROM order WHERE orderId = :orderId";
		$query = $connection->prepare($query);
		$query->bindValue(':orderId', $orderId, PDO::PARAM_INT);
		$query->execute();
		$response = $query->fetchObject('Order');

		if(!$response){
			throw new Exception("Ordem " + $idOrder + " não foi localizada no banco de dados");
		}	
		return $response;*/

		$connection = Connection::getConn();

		$query = "SELECT * FROM usuario WHERE idUsuario = :idUsuario";
		$query = $connection->prepare($query);
		$query->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
		$query->execute();
		$response = $query->fetchObject('Order');

		if(!$response){
			throw new Exception("Ordem " + $idOrder + " não foi localizada no banco de dados");
		}	
		return $response;
	}

	public static function Insert($Order){
		$connection = Connection::getConn();
		$query = "INSERT INTO order(OrderId, CodigoRastreio, StatusPermissao, ParceiroId, ClienteCPF, ClienteNome, EntregaRua, EntregaNumero, EntregaBairro, EntregaCidade, EntregaCEP, EntregaComplemento, CompraData, PagamentoData, FaturamentoData, EnvioData, EntregaPrevisaoData, EntregaData, PedidoStatus, AtualDescricao) VALUES (:OrderId, :CodigoRastreio, :StatusPermissao, :ParceiroId, :ClienteCPF, :ClienteNome, :EntregaRua, :EntregaNumero, :EntregaBairro, :EntregaCidade, :EntregaCEP, :EntregaComplemento, :CompraData, :PagamentoData, :FaturamentoData, :EnvioData, :EntregaPrevisaoData, :EntregaData, :PedidoStatus, :AtualDescricao)";
		$query->bindValue(':OrderId', $Order['OrderId']);
		$query->bindValue(':CodigoRastreio', $Order['CodigoRastreio']);
		$query->bindValue(':StatusPermissao', $Order['StatusPermissao']);
		$query->bindValue(':ParceiroId', $Order['ParceiroId']);
		$query->bindValue(':ClienteCPF', $Order['ClienteCPF']);
		$query->bindValue(':ClienteNome', $Order['ClienteNome']);
		$query->bindValue(':EntregaRua', $Order['EntregaRua']);
		$query->bindValue(':EntregaNumero', $Order['EntregaNumero']);
		$query->bindValue(':EntregaBairro', $Order['EntregaBairro']);
		$query->bindValue(':EntregaCidade', $Order['EntregaCidade']);
		$query->bindValue(':EntregaCEP', $Order['EntregaCEP']);
		$query->bindValue(':EntregaComplemento', $Order['EntregaComplemento']);
		$query->bindValue(':CompraData', $Order['CompraData']);
		$query->bindValue(':PagamentoData', $Order['PagamentoData']);
		$query->bindValue(':FaturamentoData', $Order['FaturamentoData']);
		$query->bindValue(':EnvioData', $Order['EnvioData']);
		$query->bindValue(':EntregaPrevisaoData', $Order['EntregaPrevisaoData']);
		$query->bindValue(':EntregaData', $Order['EntregaData']);
		$query->bindValue(':PedidoStatus', $Order['PedidoStatus']);
		$query->bindValue(':AtualDescricao', $Order['AtualDescricao']);

		/*$query = "INSERT INTO usuario(idUsuario, userName, userPass, fullName) VALUES (:idUsuario, :userName, :userPass, :fullName)";
		$query = $connection->prepare($query);
		$query->bindValue(':idUsuario', $Order['idUsuario']);
		$query->bindValue(':userName', $Order['userName']);
		$query->bindValue(':userPass', $Order['userPass']);
		$query->bindValue(':fullName', $Order['fullName']);*/

		$response = $query->execute();

		if(!$response){
			throw new Exception("Falha ao Inserir os Dados na tabela de Order");
			return false;
		}
		return true;
	}

	public static function Delete($OrderId){
		$connection = Connection::getConn();

		$query = "DELETE FROM order WHERE id = :OrderId";
		$query = $connection->prepare($query);
		$query->bindValeu(':OrderId', $OrderId, PDO::PARAM_INT);
		$response = $query->execute();

		if(!$response){
			throw new Exception("Falha ao deletar a ordem da tabela Order");
			return false;
		}
		return true;
	}

	public static function Update(){

	}
}