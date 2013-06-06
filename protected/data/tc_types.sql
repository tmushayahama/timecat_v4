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