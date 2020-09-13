<?php

/**
 * IDValidator.php
 */

namespace Main\Validators;

class IdValidator implements Validator
{
	public function validate($value) : bool 
	{
		if (! is_numeric($value) || intval($value) != $value)
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
