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
				"Ошибка валидации '".__METHOD__."' ID"
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
		$email = trim($email);

		$emailValidator = new \Main\Validators\EmailValidator();

		if (! $emailValidator->validate($email))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' EMAIL"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$selectUserQuery = 
			"SELECT * FROM `users` WHERE `email` = :email LIMIT 1";

		try
		{
			$query = $connection->prepare($selectUserQuery);
			$query->bindParam(":email", $email, \PDO::PARAM_INT);
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

	static function createUser(
		string $firstName, 
		string $lastName,
		string $patronymic,
		string $email,
		int    $groupId,
		string $password
	) : array {
		$nameValidator = new \Main\Validators\NameValidator();
		$idValidator   = new \Main\Validators\IdValidator();
		$emailValidator   = new \Main\Validators\EmailValidator();

		if (! ($nameValidator->validate(trim($firstName)) 
			&& $nameValidator->validate(trim($lastName))
			&& $nameValidator->validate(trim($patronymic))
			&& $emailValidator->validate(trim($email))
			&& $idValidator->validate($groupId)))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."'"
			);
		}

		$passHash = password_hash(trim($password), PASSWORD_BCRYPT);

		$connection = \Main\Application::getInstance()->getConnection();

		$createUserQuery =
			"INSERT INTO `users` (`first_name`, `last_name`, `patronymic`, `password`,
				`email`, `reg_date`, `group_id`) VALUES (:first_name, :last_name, :patronymic,
				:password, :email, NOW(), :group_id)";

		try
		{
			$query = $connection->prepare($createUserQuery);
			$query->bindParam(":first_name", $firstName, \PDO::PARAM_STR);
			$query->bindParam(":last_name", $lastName, \PDO::PARAM_STR);
			$query->bindParam(":patronymic", $patronymic, \PDO::PARAM_STR);
			$query->bindParam(":password", $passHash, \PDO::PARAM_STR);
			$query->bindParam(":email", $email, \PDO::PARAM_STR);
			$query->bindParam(":group_id", $groupId, \PDO::PARAM_INT);

			$query->execute();
		}
		catch (\PDOException $e)
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка запроса к базе данных"
			);
		}

		return [
			'id'         => $connection->lastInsertId(),
			'first_name' => $firstName,
			'last_name'  => $lastName,
			'patronymic' => $patronymic,
			'password'   => $passHash,
			'email'      => $email,
			'group_id'   => $groupId
		];
	}
}
