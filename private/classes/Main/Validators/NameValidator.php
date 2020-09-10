<?php

/**
 * NameValidator.php
 */

namespace Main\Validators;

class NameValidator implements Validator
{
	public function validate($value) : bool 
	{
		$afterValue = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
		if ($afterValue != $value)
		{
			return false;
		}

		return true;
	}
}
