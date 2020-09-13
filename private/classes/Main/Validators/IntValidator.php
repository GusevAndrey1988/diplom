<?php

/**
 * IntValidator.php
 */

namespace Main\Validators;

class IntValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! is_numeric($value) || intval($value) != $value)
		{
			return false;
		}

		return true;
	}
}
