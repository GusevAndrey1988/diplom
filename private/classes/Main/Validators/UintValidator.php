<?php

/**
 * UintValidator.php
 */

namespace Main\Validators;

class UintValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! is_numeric($value) || intval($value) != $value)
		{
			return false;
		}

		if ($value < 0)
		{
			return false;
		}

		return true;
	}
}
