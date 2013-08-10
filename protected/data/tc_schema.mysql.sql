DROP SCHEMA if exists timecat_v4;
DROP USER 'timecat4'@'localhost';
CREATE USER 'timecat4'@'localhost' IDENTIFIED BY 'awesome++';
CREATE DATABASE timecat_v4 DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_general_ci;
GRANT ALL PRIVILEGES ON timecat_v4.* to 'timecat4'@'localhost' WITH GRANT OPTION;
USE timecat_v4;
-- -----------------------Creating Users-----------------------------------------------------
CREATE TABLE `tc_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `create_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastvisit_at` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

CREATE TABLE `tc_profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
	`avatar_url` varchar(50) NOT NULL DEFAULT '',
	`institution` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_profiles`
  ADD CONSTRAINT `user_profile_id` FOREIGN KEY (`user_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

CREATE TABLE `tc_profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
	`placeholder` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` varchar(15) NOT NULL DEFAULT '0',
  `field_size_min` varchar(15) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- ---------------Rights----------------------------
drop table if exists AuthItem;
drop table if exists AuthItemChild;
drop table if exists AuthAssignment;
drop table if exists Rights;

create table AuthItem
(
   name varchar(64) not null,
   type integer not null,
   description text,
   bizrule text,
   data text,
   primary key (name)
);

create table AuthItemChild
(
   parent varchar(64) not null,
   child varchar(64) not null,
   primary key (parent,child),
   foreign key (parent) references AuthItem (name) on delete cascade on update cascade,
   foreign key (child) references AuthItem (name) on delete cascade on update cascade
);

create table AuthAssignment
(
   itemname varchar(64) not null,
   userid varchar(64) not null,
   bizrule text,
   data text,
   primary key (itemname,userid),
   foreign key (itemname) references AuthItem (name) on delete cascade on update cascade
);

create table Rights
(
	itemname varchar(64) not null,
	type integer not null,
	weight integer not null,
	primary key (itemname),
	foreign key (itemname) references AuthItem (name) on delete cascade on update cascade
);

-- ---------------------TYPES------------------------
CREATE TABLE `tc_types` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`category` varchar(50) not null,
		`type_entry` varchar(50) not null,
		`description` varchar(255) DEFAULT '',
			PRIMARY KEY (`id`),
			UNIQUE KEY  (`category`, type_entry)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

-- -----------studies----------------
CREATE TABLE `tc_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) not null,
  `type_id` int(11) not null,
	`created` datetime not null,
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_studies`
  ADD CONSTRAINT `studies_type_id` FOREIGN KEY (`type_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;

-- -----------user-studies----------------
CREATE TABLE `tc_user_studies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) not null,
  `study_id` int(11) not null,
	`role_id` int(11) not null,
	`status` int(2) not null default 0,
	unique key (`study_id`, `user_id`),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_user_studies`
  ADD CONSTRAINT `user_studies_user_id` FOREIGN KEY (`user_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_studies`
  ADD CONSTRAINT `user_studies_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_studies`
  ADD CONSTRAINT `user_studies_role_id` FOREIGN KEY (`role_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;


CREATE TABLE `tc_study_dimensions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_id` int(11) not null,
	`dimension` varchar(50) not null,
	unique key (`study_id`,`dimension`),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_study_dimensions`
  ADD CONSTRAINT `study_dimesions_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

-- -----------sites----------
CREATE TABLE `tc_sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) not null,
  `study_id` int not null,
	`timezone` varchar(50) not null default '',
  `description` varchar(255) DEFAULT '',
	unique key (`name`, `study_id`, `timezone`),
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_sites`
  ADD CONSTRAINT `site_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

-- ------------study_tasks-------------------
CREATE TABLE `tc_study_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(50) not null,
  `study_id` int not null,
	`dimension_id` int not null,
	`start_action` varchar(255) not null default "",
	`end_action` varchar(255) not null default "",
	`definition` varchar(255) not null default "",
	`status` int not null default 0,
	`order_id` int,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_study_tasks`
  ADD CONSTRAINT `study_tasks_dimesion_id` FOREIGN KEY (`dimension_id`) REFERENCES `tc_study_dimensions` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_study_tasks`
  ADD CONSTRAINT `study_tasks_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

-- -------------subject-------------
CREATE TABLE `tc_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `study_id` int not null,
  `description` varchar(255) DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_subjects`
  ADD CONSTRAINT `subjects_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

-- --------------observation---------------
CREATE TABLE `tc_observations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` int(11) unsigned not null default 0,
	`duration` int(11) unsigned not null default 0,
	`user_id` int not null,
  `study_id` int not null,
	`subject_id` int not null,
	`site_id` int not null,
	`type_id` int,
	`valid` int not null default 0,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `user_observation_id` FOREIGN KEY (`user_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `observations_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `subject_observation_id` FOREIGN KEY (`subject_id`) REFERENCES `tc_subjects` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `site_observation_id` FOREIGN KEY (`site_id`) REFERENCES `tc_sites` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observations`
  ADD CONSTRAINT `type_observation_id` FOREIGN KEY (`type_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;


CREATE TABLE `tc_observation_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`observation_id` int,
	`study_task_id` int,
	`start_time` int(11) unsigned not null default 0,
	`duration` int(11) unsigned not null default 0,
	`status` int not null default 1, -- current task 
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_observation_tasks`
  ADD CONSTRAINT `observation_tasks_observation_id` FOREIGN KEY (`observation_id`) REFERENCES `tc_observations` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observation_tasks`
  ADD CONSTRAINT `observation_tasks_study_task_id` FOREIGN KEY (`study_task_id`) REFERENCES `tc_study_tasks` (`id`) ON DELETE CASCADE;


CREATE TABLE `tc_observation_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `observation_id` int not null,
  `observation_task_id` int,
  `note` varchar(255) DEFAULT '',
  `time_taken` int(11) unsigned not null default 0,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_observation_notes`
  ADD CONSTRAINT `observation_observation_id` FOREIGN KEY (`observation_id`) REFERENCES `tc_observations` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_observation_notes`
  ADD CONSTRAINT `observation_notes_observaztion_task_id` FOREIGN KEY (`observation_task_id`) REFERENCES `tc_observation_tasks`(`id`) ON DELETE CASCADE;

CREATE TABLE `tc_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`subject` varchar(255) DEFAULT '',
  `body` varchar(1028) not null DEFAULT '',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

CREATE TABLE `tc_user_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`message_id`  int not null,
	`sender_id` int not null,
	`recipient_id` int not null,
	`study_id`  int not null,
	`send_date` datetime not null,
  `received` int not null default 0,
	`deleted` int not null default 0,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_user_messages`
  ADD CONSTRAINT `user_message_message_id` FOREIGN KEY (`message_id`) REFERENCES `tc_messages` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_messages`
  ADD CONSTRAINT `user_message_sender_id` FOREIGN KEY (`sender_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_messages`
  ADD CONSTRAINT `user_message_recipient_id` FOREIGN KEY (`recipient_id`) REFERENCES `tc_users` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_user_messages`
  ADD CONSTRAINT `user_message_study_id` FOREIGN KEY (`study_id`) REFERENCES `tc_studies` (`id`) ON DELETE CASCADE;

CREATE TABLE `tc_task_hierarchy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
	`taskee_id`  int not null,
	`task_relationship_id` int not null,
	`tasker_id` int not null,
   PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ;

ALTER TABLE `tc_task_hierarchy`
  ADD CONSTRAINT `task_hierarchy_taskee_id` FOREIGN KEY (`taskee_id`) REFERENCES `tc_study_tasks` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_task_hierarchy`
  ADD CONSTRAINT `task_hierarchy_tasker_id` FOREIGN KEY (`tasker_id`) REFERENCES `tc_study_tasks` (`id`) ON DELETE CASCADE;

ALTER TABLE `tc_task_hierarchy`
  ADD CONSTRAINT `task_hierarchy_task_relationship_id` FOREIGN KEY (`task_relationship_id`) REFERENCES `tc_types` (`id`) ON DELETE CASCADE;

