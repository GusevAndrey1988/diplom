<?php

/**
 * init.php
 */

// array $arParameters

if (isset($_POST['send']))
{
	$userData = $_POST['user'];

	$first_name = $userData['first_name'];
	$last_name = $userData['last_name'];
	$patronymic = $userData['patronymic'];
	$email      = $userData['email'];
	$password1  = $userData['password1'];
	$password2  = $userData['password2'];
	$group_id = \Main\Db\Groups::getGroupByName("user")['id'];

	if ($password1 != $password2)
	{
		//TODO
		throw "";
	}

	//TODO Проверка заполнения всех полей
	
	\Main\Application::getInstance()->setCurrentUser(
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

	$template = new Main\View\Template($arParameters['template']);
	$template->setParameters($arParameters);
	$template->includeTemplate();
}
