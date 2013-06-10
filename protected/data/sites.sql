CREATE TABLE `tc_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) not null,
  `study_id` int not null,
	`timezone_id` int not null,
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_sites`
  ADD CONSTRAINT `site_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_sites`
	ADD CONSTRAINT `site_timezone_id` FOREIGN KEY (`timezone_id`) REFERENCES `tc_timezone` (`id`) ON DELETE CASCADE;
