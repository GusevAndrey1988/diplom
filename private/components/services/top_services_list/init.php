<?php

/**
 * init.php
 */

// array $arParameters

$errorMessage = "";
$application = \Main\Application::getInstance();

if (! isset($arParameters['count']))
{
	$count = $arParameters['count'];
}
else
{
	$count = 5;
}

$arServices = \Main\Db\Services::getMostHitsServices($count);
$arParameters['services'] = $arServices;

$template = new Main\View\Template(APP_TEMPLATES_DIR."/components/services/top_list.php");
$arParameters['errorMessage'] = $errorMessage;
$template->setParameters($arParameters);
$template->includeTemplate();
