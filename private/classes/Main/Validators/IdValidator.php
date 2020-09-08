<?php

/**
 * IDValidator.php
 */

namespace Main\Validators;

class IdValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! is_integer($value))
		{
			return false;
		}

		if ($value < 1) 
		{
			return false;
		}

		return true;
	}
}
