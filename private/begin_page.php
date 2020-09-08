<?php

session_start();

require_once "autoloader.php";
require_once "configs/dirs.php";
require_once "configs/database.php";

define("APP_IS_PAGE_BEGIN", true);

$Application = Main\Application::getInstance();

$header = new Main\View\Template(APP_TEMPLATES_DIR."/header.php");
$header->includeTemplate();
