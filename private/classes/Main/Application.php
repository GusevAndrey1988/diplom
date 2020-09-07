<?php

/**
 * Application.php
 */

namespace Main;

class Application
{
	static private $_instance = null;

	private $connection = null;

	private function __clone() {/* empty */}

	private function initDatabase()
	{
		$opt = ApplicationOptions::getInstance();

		$user     = $opt->getOption("DB")['db_user'];
		$password = $opt->getOption("DB")['db_password'];
		$host     = $opt->getOption("DB")['db_host'];
		$port     = $opt->getOption("DB")['db_port'];
		$dbname   = $opt->getOption("DB")['db_name'];

		try 
		{
			$this->connection = new \PDO(
				"mysql:dbname=$dbname;host=$host;port=$port",
				$user,
				$password,
				[\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]
			);
		}
		catch (\PDOException $e)
		{
			throw new Errors\ApplicationError("Не удалось подключиться к базе данных");
		}
	}

	public function __construct()
	{
		if (! is_null(self::$_instance))
		{
			throw new Errors\ApplicationError(
				"Класс одиночка ".__CLASS__." уже создан."
			);
		}

		self::$_instance = $this;

		$this->initDatabase();
	}

	static public function getInstance()
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new Application();
		}

		return self::$_instance;
	}

	public function getConnection()
	{
		return $this->connection;
	}
}
