<?php

/**
 * ServicesGroups.php
 */

namespace Main\Db;

class ServicesGroups
{
	static public function getServicesGroupsWidthServices(int $offset = 0, int $limit = 0) : array
	{
		$uintValidator = new \Main\Validators\UintValidator();

		if (! $uintValidator->validate($offset)
			|| ! $uintValidator->validate($limit))
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка валидации '".__METHOD__."' ID"
			);
		}

		$connection = \Main\Application::getInstance()->getConnection();

		$limit = "";
		if ($limit > 0)
		{
			$limit = "OFFSET :offset LIMIT :limit";
		}

		$selectServicesGroupsQuery =
			"SELECT * FROM `services_groups` ".$limit;


		try 
		{
			$query = $connection->prepare($selectServicesGroupsQuery);
			if (! empty($limit))
			{
				$query->bindParam(":limit", $limit, \PDO::PARAM_INT);
				$query->bindParam(":offset", $offset, \PDO::PARAM_INT);
			}
			$query->execute();
		}
		catch (\PDOException $e)
		{
			throw new \Main\Errors\ApplicationError(
				"Ошибка запроса к базе данных"
			);
		}

		if ($query->rowCount() == 0)
		{
			return [];
		}

		$servicesGroups = $query->fetchAll(\Pdo::FETCH_ASSOC);

		$servicesGroupIds = [];
		foreach ($servicesGroups as $group)
		{
			$servicesGroupIds[] = $group['id'];
		}

		$services = \Main\Db\Services::getServiceByGroupId($servicesGroupIds);

		$servicesGroups = array_map(function(& $group) use ($services) {
			$group['services'] = [];

			foreach($services as $id => $service)
			{
				if ($group['id'] == $service['group_id'])
				{
					$group['services'][] = $service;
					unset($services[$id]);
				}
			}
			
			return $group;
		}, $servicesGroups);

		return $servicesGroups; 
	}
}
