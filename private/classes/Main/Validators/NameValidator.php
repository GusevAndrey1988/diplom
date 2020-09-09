<?php

/**
 * NameValidator.php
 */

namespace Main\Validators;

class NameValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (preg_match('/[^\s\w]/', $value))
		{
			return false;
		}

		return true;
	}
}
