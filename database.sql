CREATE DATABASE `diplom` CHARACTER SET utf8 COLLATE utf8_general_ci;

USE `diplom`;

/* Таблица разрешений (по типу "белый список") */
CREATE TABLE `permissions` (
	`id`          INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name`        VARCHAR(20) NOT NULL UNIQUE,
	`description` VARCHAR(256)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

/* Таблица групп пользователей */
CREATE TABLE `groups` (
	`id`          INT(11) PRIMARY KEY AUTO_INCREMENT,
	`name`        VARCHAR(20) NOT NULL UNIQUE,
	`description` VARCHAR(256)
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

/* Таблица соответствия групп с из правами */
CREATE TABLE `group_permission` (
	`group_id`  INT(11) NOT NULL,
	`permis_id` INT(11) NOT NULL,
	UNIQUE KEY `group_permis_key` (`group_id`, `permis_id`),   #Делаем пару (group_id, permis_id) уникальной

	FOREIGN KEY (`group_id`)
		REFERENCES `groups` (`id`)
			ON DELETE CASCADE
			ON UPDATE CASCADE,

	FOREIGN KEY (`permis_id`)
		REFERENCES `permissions` (`id`)
			ON DELETE CASCADE
			ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

/* Таблица паспортных данных пользователей */
CREATE TABLE `passports_data` (
	`id`               INT(11) PRIMARY KEY AUTO_INCREMENT,
	`number`           VARCHAR(6) NOT NULL,          #Номер из диапазона 000101 <= n <= 999999
	`series`           VARCHAR(4) NOT NULL,          #Серия
	`date`             DATE NOT NULL,                #Дата выдачи
	`departament_code` VARCHAR(6) NOT NULL,          #Код подразделеиня
	`issued_by`        VARCHAR(256) NOT NULL,        #Кем выдан

	UNIQUE KEY `passport_key` (`series`, `number`)   #Делаем пару (series, number) уникальной
) ENGINE = InnoDB DEFAULT CHARSET=utf8;

/* Таблица пользователей */
CREATE TABLE `users` (
	`id` INT(11)       PRIMARY KEY AUTO_INCREMENT,
	`first_name`       VARCHAR(64) NOT NULL,
	`last_name`        VARCHAR(64) NOT NULL,
	`patronymic`       VARCHAR(64) DEFAULT "",       #Отчество
	`password`         VARCHAR(100) NOT NULL,
	`passport_data_id` INT(11) UNIQUE DEFAULT NULL,
	`email`            VARCHAR(100) NOT NULL UNIQUE,
	`reg_date`         DATETIME NOT NULL,            #Дата регистрации
	`group_id`         INT(11) NOT NULL,
	`checked`          BOOL NOT NULL DEFAULT 0,      #Подтверждёная учётная запись

	FOREIGN KEY `passport` (`passport_data_id`)
		REFERENCES `passports_data` (`id`)
			ON UPDATE CASCADE,

	FOREIGN KEY `group` (`group_id`)
		REFERENCES `groups` (`id`)
			ON DELETE NO ACTION
			ON UPDATE CASCADE
) ENGINE = InnoDB DEFAULT CHARSET=utf8;
