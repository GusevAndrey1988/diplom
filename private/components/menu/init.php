<?php

/**
 * init.php
 */

// array $arParameters

if (! isset($arParameters['template']))
{
	throw new Main\Errors\ApplicationError("Не указан шаблон компонента");
}

if (! isset($arParameters['menu_data']) || ! file_exists($arParameters['menu_data']))
{
	throw new Main\Errors\ApplicationError("Не указан или не создан файл с данными меню");
}

require $arParameters['menu_data'];

if (! isset($arMenuData))
{
	throw new Main\Errors\ApplicationError("Массив с данными меню не обнаружен");
}

$template = new Main\View\Template($arParameters['template']);
$template->setParameters($arMenuData);
$template->includeTemplate();
