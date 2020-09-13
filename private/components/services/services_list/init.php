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
	$count = 0;
}

if (! isset($arParameters['offset']))
{
	$offset = $arParameters['offset'];
}
else
{
	$offset = 0;
}

$arServicesGroups = \Main\Db\ServicesGroups::getServicesGroupsWidthServices($offset, $count);
$arParameters['servicesGroups'] = $arServicesGroups;

$template = new Main\View\Template(APP_TEMPLATES_DIR."/components/services/services_list.php");
$arParameters['errorMessage'] = $errorMessage;
$template->setParameters($arParameters);
$template->includeTemplate();
