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

		require $this->filename;
	}
}
