<?php

/**
 * IntValidator.php
 */

namespace Main\Validators;

class IntValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! is_integer($value))
		{
			return false;
		}

		return true;
	}
}
