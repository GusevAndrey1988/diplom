<?php

require_once APP_PRIVATE_DIR."/classes/Main/ApplicationOptions.php";

$opt = Main\ApplicationOptions::getInstance();

$opt->setOption("DB", [
	"db_name"     => getenv("DB_NAME"),
	"db_user"     => getenv("DB_USER"),
	"db_host"     => getenv("DB_HOST"),
	"db_port"     => getenv("DB_PORT"),
    "db_password" => getenv("DB_PASSWORD")	
]);
