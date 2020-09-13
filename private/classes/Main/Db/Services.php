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
	
	static public function getServiceById($ids) : array
	{
		$idValidator = new \Main\Validators\IdValidator();

		$connection = \Main\Application::getInstance()->getConnection();

		if (is_numeric($ids))
		{

			if (! $idValidator->validate($ids))
			{
				throw new \Main\Errors\ApplicationError(
					"Ошибка валидации '".__METHOD__."' ID"
				);
			}

			$selectServicesQuery =
				"SELECT * FROM `services` WHERE `id` = :ids LIMIT 1";

			$param = $ids;
		}
		else if (is_array($ids))
		{
			array_map(function($id) use (& $idValidator) {
				if (! $idValidator->validate($id))
				{
					throw new \Main\Errors\ApplicationError(
						"Ошибка валидации '".__METHOD__."' ID"
					);
				}
			}, $ids);

			$param = "(".implode(", ", $ids).")";

			$selectServicesQuery =
				"SELECT * FROM `services` WHERE `id` IN $param";
		}

		try 
		{
			$query = $connection->prepare($selectServicesQuery);
			$query->bindParam(":ids", $param);
			$query->execute();
		}
		catch (\PDOException $e)
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка запроса к базе данных".$e
			);
		}

		if ($query->rowCount() == 0)
		{
			return [];
		}

		if (is_array($ids))
		{
			return $query->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $query->fetch(\PDO::FETCH_ASSOC);
	}
	
	static public function getServiceByGroupId($ids) : array
	{
		$idValidator = new \Main\Validators\IdValidator();

		$connection = \Main\Application::getInstance()->getConnection();

		if (is_numeric($ids))
		{

			if (! $idValidator->validate($ids))
			{
				throw new \Main\Errors\ApplicationError(
					"Ошибка валидации '".__METHOD__."' ID"
				);
			}

			$selectServicesQuery =
				"SELECT * FROM `services` WHERE `group_id` = :ids LIMIT 1";

			$param = $ids;
		}
		else if (is_array($ids))
		{
			array_map(function($id) use (& $idValidator) {
				if (! $idValidator->validate($id))
				{
					throw new \Main\Errors\ApplicationError(
						"Ошибка валидации '".__METHOD__."' ID"
					);
				}
			}, $ids);

			$param = "(".implode(", ", $ids).")";

			$selectServicesQuery =
				"SELECT * FROM `services` WHERE `group_id` IN $param";
		}

		try 
		{
			$query = $connection->prepare($selectServicesQuery);
			$query->bindParam(":ids", $param);
			$query->execute();
		}
		catch (\PDOException $e)
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка запроса к базе данных".$e
			);
		}

		if ($query->rowCount() == 0)
		{
			return [];
		}

		if (is_array($ids))
		{
			return $query->fetchAll(\PDO::FETCH_ASSOC);
		}

		return $query->fetch(\PDO::FETCH_ASSOC);
	}

}
