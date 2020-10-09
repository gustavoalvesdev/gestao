<?php 

class Servico
{
	public static function insertService($serviceInfo)
	{
		$sql = MySql::conectar()->prepare('INSERT INTO `tb_site.servicos` (icone_servico, titulo_servico, descricao_servico, order_id) VALUES(?, ?, ?, ?)');
		if ($sql->execute($serviceInfo))
			return true;
		return false;
	}

	public static function getAllServices()
	{
		$services = [];
		$sql = MySql::conectar()->prepare('SELECT * FROM `tb_site.servicos`');
		$sql->execute();
		$services = $sql->fetchAll();
		return $services;
	}

	public static function deleteService($serviceId)
	{
		$sql = MySql::conectar()->prepare('DELETE FROM `tb_site.servicos` WHERE id = ?');
		$sql->execute(array($serviceId));
	}
}
