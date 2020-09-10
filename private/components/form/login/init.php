<?php

/**
 * init.php
 */

// array $arParameters

$errorMessage = "";
$application = \Main\Application::getInstance();

if (isset($_POST['send']))
{
	$userInput = $_POST['user'];

	$email    = $userInput['email'];
	$password = $userInput['password'];

	if (empty($email)
		|| empty($password))
	{
		$errorMessage = "Не заполненны обязательные поля";
	}
	else
	{
		$success = true;

		try
		{
			$userData = \Main\Db\Users::getUserByEmail($email);

			if (empty($userData))
			{
				$errorMessage = "Неверный логин или пароль";
				$success = false;
			}
			else
			{
				if (! password_verify($password, $userData['password']))
				{
					$errorMessage = "Неверный логин или пароль";
					$success = false;
				}
				else
				{
					$user = new \Main\User($userData);
					$user->setLogged(true);

					$application->setCurrentUser($user);
				}
			}
		}
		catch (\Main\Errors\ApplicationError $e)
		{
			echo "Ошибка входа";
		}

		if ($success)
		{
			$application->redirect("\index.php");
		}
	}
}
else
{
	if (! isset($arParameters['template']))
	{
		throw new Main\Errors\ApplicationError("Не указан шаблон компонента");
	}

	if (! isset($arParameters['action']))
	{
		throw new Main\Errors\ApplicationError("Не указан обработчик формы");
	}
}

if (! isset($_POST['send']) || ! empty($errorMessage))
{
	$template = new Main\View\Template($arParameters['template']);
	$arParameters['errorMessage'] = $errorMessage;
	if (isset ($_POST['user']))
	{
		$arParameters['user'] = $_POST['user'];
	}
	$template->setParameters($arParameters);
	$template->includeTemplate();
}
