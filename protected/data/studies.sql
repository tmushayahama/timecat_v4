CREATE TABLE `tc_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) not null,
  `type_id` int(11) not null,
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_studies`
  ADD CONSTRAINT `studies_type_id` FOREIGN KEY (`type_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;

CREATE TABLE `tc_user_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) not null,
  `study_id` int(11) not null,
	`role_id` int(11) not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_user_studies`
  ADD CONSTRAINT `user_studies_user_id` FOREIGN KEY (`user_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_studies`
  ADD CONSTRAINT `user_studies_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_studies`
  ADD CONSTRAINT `user_studies_role_id` FOREIGN KEY (`role_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;
