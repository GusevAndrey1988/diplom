<?php

/**
 * User.php
 */

namespace Main;

class User
{
	private $id               = null;
	private $first_name       = null;
	private $last_name        = null;
	private $patronymic       = null;
	private $password         = null;
	private $passport_data_id = null;
	private $email            = null;
	private $reg_date         = null;
	private $group_id         = null;
	private $checked          = null;

	private $changed = false;

	private $logged  = false;

	public function __construct($arParameters = [])
	{
		if (isset($arParameters['id']))
		{
			$this->id = $arParameters['id'];
		}

		if (isset($arParameters['first_name']))
		{
			$this->first_name = $arParameters['first_name'];
		}

		if (isset($arParameters['last_name']))
		{
			$this->last_name = $arParameters['last_name'];
		}

		if (isset($arParameters['patronymic']))
		{
			$this->patronymic = $arParameters['patronymic'];
		}
		
		if (isset($arParameters['password']))
		{
			$this->password = $arParameters['password'];
		}
		
		if (isset($arParameters['passport_data_id']))
		{
			$this->passport_data_id = $arParameters['passport_data_id'];
		}

		if (isset($arParameters['email']))
		{
			$this->email = $arParameters['email'];
		}
		
		if (isset($arParameters['reg_date']))
		{
			$this->reg_date = $arParameters['reg_date'];
		}

		if (isset($arParameters['group_id']))
		{
			$this->group_id = $arParameters['group_id'];
		}

		if (isset($arParameters['checked']))
		{
			$this->checked = $arParameters['checked'];
		}
	}

	public function setId(int $id)
	{
		$this->changed = true;
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setFirstName(string $firstName)
	{
		$this->changed = true;
		$this->first_name = $firstName;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function setLastName(string $lastName)
	{
		$this->changed = true;
		$this->last_name = $lastName;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function setPatronymic(string $patronymic)
	{
		$this->changed = true;
		$this->patronymic = $patronymic;
	}

	public function getPatronymic()
	{
		return $this->patronymic;
	}

	public function setPassword(string $password)
	{
		$this->changed = true;
		$this->password = $password;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassportDataId(int $id)
	{
		$this->changed = true;
		$this->passport_data_id = $id;
	}

	public function getPassportDataId()
	{
		return $this->passport_data_id;
	}

	public function setEmail(string $email)
	{
		$this->changed = true;
		$this->email = $email;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function setRegDate(\DateTime $date)
	{
		$this->changed = true;
		$this->reg_date = $date->format("Y-m-d");
	}

	public function getRegDate()
	{
		return $this->req_date;
	}

	public function setGroupId(int $id)
	{
		$this->changed = true;
		$this->group_id = $id;
	}

	public function getGroupId()
	{
		return $this->group_id;
	}

	public function setChecked(bool $checked)
	{
		$this->changed = true;
		$this->checked = $checked;
	}

	public function getChecked()
	{
		return $this->checked;
	}

	public function isLogged() : bool 
	{
		return $this->logged;
	}

	public function setLogged(bool $logged)
	{
		$this->logged = $logged;
	}
}
