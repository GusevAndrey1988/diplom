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
		$email = strtolower(trim($email));

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
			$query->bindParam(":email", $email, \PDO::PARAM_STR);
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
		$nameValidator  = new \Main\Validators\NameValidator();
		$idValidator    = new \Main\Validators\IdValidator();
		$emailValidator = new \Main\Validators\EmailValidator();

		if (! $nameValidator->validate($firstName = trim($firstName)))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' FIRST_NAME"
			);
		}
		else if (! $nameValidator->validate($lastName = trim($lastName)))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' LAST_NAME"
			);
		}
		else if (! $nameValidator->validate($patronymic = trim($patronymic)))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' PATRONYMIC"
			);
		}
		else if (! $emailValidator->validate($email = strtolower(trim($email))))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' EMAIL"
			);
		}
		else if (! $idValidator->validate($groupId))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' GROUP_ID"
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
			// 23000 - dublicate primary key or unique field
			if ($e->getCode() == "23000")
			{
				$field = "";

				if (preg_match("/'email'/", $e->getMessage()))
				{
					$field = "email";
				}

				throw new \Main\Errors\ApplicationError(
					"Пользователь с таким $field уже существует",
					APP_ERROR_USER_ALREADY_EXISTS
				);
			}
			else
			{
				throw new \Main\Errors\ApplicationError(
					"Ошибка запроса к базе данных"
				);
			}
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
