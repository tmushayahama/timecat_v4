CREATE TABLE `tc_type_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`),
   UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE `tc_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_type` int(11),
  `type` varchar(255) DEFAULT '',
   `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`),
   UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_types`
  ADD CONSTRAINT `type_category_id` FOREIGN KEY (`category_type`) REFERENCES `tc_type_category` (`id`) ON DELETE CASCADE;

INSERT INTO `tc_type_category` (`category`) VALUES
('user_status'),
('study_types'),
('roles'),
('task_status'),
('observation_type'),
('task_category');