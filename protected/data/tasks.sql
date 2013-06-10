CREATE TABLE `tc_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) not null,
  `category_id` int not null,
  `definition` varchar(255) not null,
	`description` varchar(1028) not null,
	`status` int not null default 0,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_tasks`
  ADD CONSTRAINT `tasks_category_id` FOREIGN KEY (`category_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;
