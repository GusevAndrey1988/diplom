<?php

/**
 * Validator.php
 */

namespace Main\Validators;

interface Validator 
{
	public function validate($value) : bool;
}
