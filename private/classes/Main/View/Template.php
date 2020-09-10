<?php

/**
 * Template.php
 */

namespace Main\View;

class Template
{
	private $arParameters = [];
	private $filename = "";

	public function __construct(string $filename = "")
	{
		$this->filename = $filename;
	}

	public function setParameters(array $arParameters)
	{
		$this->arParameters = $arParameters;
	}

	public function getParameters() : array
	{
		return $this->arParameters;
	}

	public function includeTemplate()
	{
		$arParameters = $this->getParameters();

		if (! file_exists($this->filename)) 
		{
			throw new \Main\Errors\ApplicationError(
				"Файл шаблона не обнаружен"
			);
		}

		require $this->filename;
	}
}
