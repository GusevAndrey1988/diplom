<?php

/**
 * Groups.php
 */

namespace Main\Db;

class Groups 
{
	static public function getGroupById(int $id) : array
	{
		$idValidator = new \Main\Validators\IdValidator();

		if (! $idValidator->validate($id))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' ID"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$selectUserQuery = 
			"SELECT * FROM `groups` WHERE `id` = :id LIMIT 1";

		try
		{
			$query = $connection->prepare($selectUserQuery);
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

	static public function getGroupByName(string $name) : array
	{
		$nameValidator = new \Main\Validators\NameValidator();

		if (! $nameValidator->validate($name))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' NAME"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$selectUserQuery = 
			"SELECT * FROM `groups` WHERE `name` = :name LIMIT 1";

		try
		{
			$query = $connection->prepare($selectUserQuery);
			$query->bindParam(":name", $name, \PDO::PARAM_STR);
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
