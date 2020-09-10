<?php

/**
 * init.php
 */

// array $arParameters

$errorMessage = "";
$application = \Main\Application::getInstance();

if (isset($_POST['send']))
{
	$userData = $_POST['user'];

	$first_name = $userData['first_name'];
	$last_name  = $userData['last_name'];
	$patronymic = $userData['patronymic'];
	$email      = $userData['email'];
	$password1  = $userData['password1'];
	$password2  = $userData['password2'];
	$group_id   = \Main\Db\Groups::getGroupByName("user")['id'];

	if ($password1 != $password2)
	{
		$errorMessage = "Пароли не совпадают";
	}
	else if (empty($first_name)
		|| empty($last_name)
		|| empty($email)
		|| empty($password1)
		|| empty($password2))
	{
		$errorMessage = "Не заполненны обязательные поля";
	}
	else 
	{
		$success = true;

		try 
		{
			$application->setCurrentUser(
				new \Main\User(
					\Main\Db\Users::createUser(
						$first_name,
						$last_name,
						$patronymic,
						$email,
						$group_id,
						$password1
					)
				)
			);
		}
		catch (\Main\Errors\ApplicationError $e)
		{
			if ($e->getCode() == APP_ERROR_USER_ALREADY_EXISTS)
			{
				$errorMessage = $e->getMessage();
			}
			else
			{
				$errorMessage = "Ошибка регистрации";
			}

			$success = false;
		}

		if ($success)
		{
			$application->getCurrentUser()->setLogged(true);
			$application->redirect("/index.php");
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
