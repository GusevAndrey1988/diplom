<?php

/*
 * ApplicationOptionos.php
 */

namespace Main;

class ApplicationOptions
{
	static private $_instance = null;

	private function __clone() {/* empty */}

	public function __construct()
	{
		if (! is_null(self::$_instance))
		{
			throw new Errors\ApplicationError(
				"Класс одиночка ".__CLASS__." уже создан."
			);
		}

		self::$_instance = $this;
	}

	static public function getInstance()
	{
		if (is_null(self::$_instance))
		{
			self::$_instance = new ApplicationOptions();
		}

		return self::$_instance;
	}

	private $arOptions = [];

	/**
	 * Устанавливает опцию
	 *
	 * @param string $name название опции
	 * @param mixed  $value значение опции
	 */
	public function setOption(string $name, $value)
	{
		$this->arOptions[$name] = $value;
	}

	/**
	 * Получть значение опции
	 *
	 * @param string $name
	 * @return mixed значение опции либо null если опция не установлена
	 */
	public function getOption(string $name)
	{
		if (! isset($this->arOptions[$name]))
		{
			return null;
		}

		return $this->arOptions[$name];
	}
}
