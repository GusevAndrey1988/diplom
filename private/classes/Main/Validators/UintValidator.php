<?php

/**
 * UintValidator.php
 */

namespace Main\Validators;

class UintValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! is_integer($value))
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
