<?php

/**
 * Services.php
 */

namespace Main\Db;

class Services 
{
	static public function getMostHitsServices(int $cnt) : array
	{
		$uintValidator = new \Main\Validators\UintValidator();

		if (! $uintValidator->validate($cnt))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' ID"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$selectServicesQuery =
			"SELECT * FROM `services` ORDER BY `hit_count` DESC LIMIT :cnt";

		try 
		{
			$query = $connection->prepare($selectServicesQuery);
			$query->bindParam(":cnt", $cnt, \PDO::PARAM_INT);
			$query->execute();
		}
		catch (\PDOException $e)
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка запроса к базе данных"
			);
		}

		return $query->fetchAll(\PDO::FETCH_ASSOC);
	}
	
	static public function getServiceById(int $id) : array
	{
		$idValidator = new \Main\Validators\IdValidator();

		if (! $idValidator->validate($id))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' ID"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$selectServicesQuery =
			"SELECT * FROM `services` WHERE `id` = :id LIMIT 1";

		try 
		{
			$query = $connection->prepare($selectServicesQuery);
			$query->bindParam(":id", $id, \PDO::PARAM_INT);
			$query->execute();
		}
		catch (\PDOException $e)
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка запроса к базе данных"
			);
		}

		if ($query->rowCount() == 0)
		{
			return [];
		}

		return $query->fetch(\PDO::FETCH_ASSOC);
	}

}
