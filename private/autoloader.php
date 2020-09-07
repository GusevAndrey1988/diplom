<?php

/**
 * autoloader.php
 *
 * Автозагрузка классов
 */

spl_autoload_register(function (string $class) {
	$class = str_replace("\\", "/", $class);
	$classDir = dirname($_SERVER['DOCUMENT_ROOT'])."/private/classes";

	require_once "$classDir/$class.php";
});
