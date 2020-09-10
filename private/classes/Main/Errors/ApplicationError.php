<?php
/*
 * ApplicationError.php
 *
 */

namespace Main\Errors;

define("APP_ERROR_USER_ALREADY_EXISTS", 1);

class ApplicationError extends \Exception
{
	/*
	 * Конструктор
	 *
	 * @param string $message сообщение ошибки
	 * @param int    $code код ошибки
	 */
	public function __constructor(string $message, int $code = 0)
	{
		parent::__constructor($message, $code);
	}
}
