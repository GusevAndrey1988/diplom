<?php

/**
 * EmailValidator.php
 */

namespace Main\Validators;

class EmailValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! filter_var($value, FILTER_VALIDATE_EMAIL))
		{
			return false;
		}

		return true;
	}
}
