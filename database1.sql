USE `diplom`;

DROP TABLE IF EXISTS `record_list`;
DROP TABLE IF EXISTS `services`;
DROP TABLE IF EXISTS `services_groups`;

/* Таблица групп услуг */
CREATE TABLE `services_groups` (
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(60) UNIQUE NOT NULL,
	`description` VARCHAR(256) DEFAULT NULL,
	`responsible_id` INT(11),

	FOREIGN KEY (`responsible_id`)
		REFERENCES `users` (`id`)
			ON DELETE SET NULL
			ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/* Таблица услуг */
CREATE TABLE `services` (
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name` VARCHAR(60) UNIQUE NOT NULL,
	`description` VARCHAR(256) DEFAULT NULL,
	`group_id` INT(11) NOT NULL,
	`responsible_id` INT(11),
	`hit_count` INT(11) NOT NULL DEFAULT 0,

	FOREIGN KEY (`group_id`)
		REFERENCES `service_groups` (`id`)
			ON DELETE CASCADE 
			ON UPDATE CASCADE,

	FOREIGN KEY (`responsible_id`)
		REFERENCES `users` (`id`)
			ON DELETE SET NULL
			ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

/* Список записей на услуги */
CREATE TABLE `records_list` (
	`id` INT(11) PRIMARY KEY AUTO_INCREMENT,
	`user_id` INT(11) NOT NULL,
	`service_id` INT(11) NOT NULL,
	`reg_date` DATETIME NOT NULL DEFAULT NOW(),
	`active` BOOL NOT NULL DEFAULT 1,

	UNIQUE KEY (`user_id`, `service_id`),

	FOREIGN KEY (`user_id`)
		REFERENCES `users` (`id`)
			ON DELETE CASCADE 
			ON UPDATE CASCADE,
			
	FOREIGN KEY (`service_id`)
		REFERENCES `services` (`id`)
			ON DELETE CASCADE 
			ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
