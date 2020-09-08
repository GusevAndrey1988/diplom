<?php

/**
 * init.php
 */

// array $arParameters

if (isset($_POST['send']))
{
	// TODO
	echo "TODO";
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
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
