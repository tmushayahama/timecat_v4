CREATE TABLE `tc_types` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`category` varchar(50) not null,
		`type_entry` varchar(50) not null,
		`description` varchar(255) DEFAULT '',
			PRIMARY KEY (`id`),
			KEY `category` (`category`),
	    KEY `type_entry` (`type_entry`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

insert into `tc_types` (`category`, `type_entry`) values
('user status', 'created'),
('user status', 'validated'),
('user status', 'novice'),
('user status', 'expert'),
('roles', 'study creator'),
('roles', 'administrator'),
('roles', 'observer'),
('study types', 'simple'),
('study types', 'multitasking'),
('study types', 'multiactor'),
('study types', 'patient flow'),
('task status', 'active'),
('task status', 'inactive'),
('task categories', 'simpletime'),
('task categories', 'communication'),
('task categories', 'location'),
('task categories', 'actorN'),
('observation type','trainning'),
('observation type','IORA'),
('observation type','formal'),
('observation type','trash');


UPDATE `timecat_v4`.`tc_types` SET `description`='Each observer focuses in one dimension of the subject\'s workflow, capturing sequential tasks as they occur.' WHERE `id`='8';
UPDATE `timecat_v4`.`tc_types` SET `description`='Each observer focuses in three dimensions of the subject\'s workflow, capturing detailed data: Communication, Action and Location.' WHERE `id`='9';
UPDATE `timecat_v4`.`tc_types` SET `description`='Each observer focuses in a narrow set of tasks of multiple subject\'s workflow, capturing sequential task for each of them.' WHERE `id`='10';
UPDATE `timecat_v4`.`tc_types` SET `description`='Each observer is strategically located to track/follow patients\' flow.' WHERE `id`='11';
