CREATE TABLE `tc_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE `tc_observations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,

  `start_time` int(11) unsigned not null default 0,
	`end_time` int(11) unsigned not null default 0,
  `user_id` int not null,
	`subject_id` int not null,
	`site_id` int not null,
	`type_id` int not null,
	`valid` int not null,
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `user_observation_id` FOREIGN KEY (`user_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `subject_observation_id` FOREIGN KEY (`subject_id`) REFERENCES `tc_subjects` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `site_observation_id` FOREIGN KEY (`site_id`) REFERENCES `tc_sites` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `type_observation_id` FOREIGN KEY (`type_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;

CREATE TABLE `tc_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`observation_id` int not null,
  `notes` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_notes`
  ADD CONSTRAINT `observation_notes_id` FOREIGN KEY (`observation_id`) REFERENCES `tc_observations` (`id`) ON DELETE CASCADE;
