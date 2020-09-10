<?php

/**
 * start_app.php
 */

session_start();

require_once "autoloader.php";
require_once "configs/dirs.php";
require_once "configs/database.php";

define("APP_IS_PAGE_BEGIN", true);

$application = Main\Application::getInstance();
