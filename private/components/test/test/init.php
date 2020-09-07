<?php

/**
 * init.php
 */

// array $arParameters

$arParameters['text'] = strtoupper($arParameters['text']);

$template = new Main\View\Template(APP_TEMPLATES_DIR."/test.php");
$template->setParameters($arParameters);
$template->includeTemplate();
