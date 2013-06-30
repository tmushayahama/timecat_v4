
INSERT INTO `tc_profiles_fields` (`id`, `varname`, `title`, `field_type`, `placeholder`,`field_size`, `field_size_min`, `required`, `match`, `range`, `error_message`, `other_validator`, `default`, `widget`, `widgetparams`, `position`, `visible`) VALUES
(1, 'lastname', 'Last Name', 'VARCHAR', 'Last Name', 50, 3, 1, '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', 1, 3),
(2, 'firstname', 'First Name', 'VARCHAR', 'First Name', 50, 3, 1, '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', 0, 3),
(3, 'institution', 'Institution', 'VARCHAR', 'Ohio State University', 50, 3, 1, '', '', 'Incorrect Institution (length between 3 and 50 characters).', '', '', '', '', 0, 3);

-- ---------------TYPES-----------------------
insert into `tc_types` (`category`, `type_entry`, `description`) values
('user status', 'created', ''),
('user status', 'validated', ''),
('user status', 'novice', ''),
('user status', 'expert', ''),
('roles', 'study creator', ''),
('roles', 'administrator', ''),
('roles', 'observer', ''),
('study types', 'Linear (sequential) time', 'Each observer focuses in one dimension of the subject\'s workflow, capturing sequential tasks as they occur.'),
('study types', 'Multitasking', 'Each observer focuses in three dimensions of the subject\'s workflow, capturing detailed data: Communication, Action and Location.'),
('study types', 'Multi-actor', 'Each observer focuses in a narrow set of tasks of multiple subject\'s workflow, capturing sequential task for each of them.'),
('study types', 'Multi-Observer Patient Flow', 'Each observer is strategically located to track/follow patients\' flow.'),
('task status', 'active', ''),
('task status', 'inactive', ''),
('task categories', 'simpletime', ''),
('task categories', 'communication', ''),
('task categories', 'location', ''),
('task categories', 'actorN', ''),
('observation type','trainning', ''),
('observation type','IORA', ''),
('observation type','formal', ''),
('observation type','trash', ''),
('task relationship type','parent', ''),
('task relationship type','next', ''),
('task relationship type','siblings', '');
