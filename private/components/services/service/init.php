<?php

/**
 * init.php
 */

// array $arParameters

$errorMessage = "";
$application = \Main\Application::getInstance();

if (isset($_POST['send']))
{
	$user = $application->getCurrentUser();
	if (! $user->isLogged())
	{
		$errorMessage = "Для записи необходимо войти в систему";
	}
	else if (is_null($user->getPassportDataId()))
	{
		$errorMessage = "Заполните ваши паспортные данные";
	}
	else if ($user->getChecked() == false)
	{
		$errorMessage = "Ваша учётная запись ещё не проверна";
	}
	//TODO
}
else
{
	if (
		! isset($arParameters['service_id']) 
		|| is_null($arParameters['service_id'])
		|| empty($arParameters['service_id'])
	) {
		$errorMessage = "Услуга не найдена";
	}
	else 
	{
		$arParameters['service'] = \Main\Db\Services::getServiceById($arParameters['service_id']);
	}

	if (
		! isset($arParameters['action'])
		|| is_null($arParameters['action'])
		|| empty($arParameters['action'])
	) {
		throw new \Main\Errors\ApplicationError(
			"Не задан параметр шаблона"
		);
	}
}

$template = new Main\View\Template(APP_TEMPLATES_DIR."/components/services/service.php");
$arParameters['errorMessage'] = $errorMessage;
$template->setParameters($arParameters);
$template->includeTemplate();
