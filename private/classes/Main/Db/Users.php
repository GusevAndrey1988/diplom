<?php

/**
 * Users.php
 */

namespace Main\Db;

class Users
{
	static public function getUserById(int $id) : array
	{
		$idValidator = new \Main\Validators\IdValidator();

		if (! $idValidator->validate($id))
		{
			throw new \Main\Errors\ApplicationError(
				"Не верный идентификатор"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$selectUserQuery = 
			"SELECT * FROM `users` WHERE `id` = :id LIMIT 1";

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

	static public function getUserByEmail(string $email) : array
	{
	}
}
