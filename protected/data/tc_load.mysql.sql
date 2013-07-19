
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
<<<<<<< HEAD
('observation type','trainning', ''),
('observation type','IORA', ''),
('observation type','formal', ''),
('observation type','trash', ''),
=======
('task categories', 'simpletime', ''),
('task categories', 'communication', ''),
('task categories', 'location', ''),
('task categories', 'actorN', ''),
('observation type','trainning', 'Training Session'),
('observation type','IORA', 'I.O.R.A'),
('observation type','formal', 'Real observation'),
>>>>>>> tc_observations
('task relationship type','parent', ''),
('task relationship type','next', ''),
('task relationship type','siblings', '');

INSERT INTO `tc_users` (`id`, `password`, `email`, `activkey`, `superuser`, `status`) VALUES
(1, '827ccb0eea8a706c4c34a16891f84e7b', 'test1@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(2, '827ccb0eea8a706c4c34a16891f84e7b', 'test2@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(3, '827ccb0eea8a706c4c34a16891f84e7b', 'test3@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(4, '827ccb0eea8a706c4c34a16891f84e7b', 'test4@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(5, '827ccb0eea8a706c4c34a16891f84e7b', 'test5@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1),
(6, '827ccb0eea8a706c4c34a16891f84e7b', 'test6@example.com', '9a24eff8c15a6a141ece27eb6947da0f', 0, 1);

INSERT INTO `tc_profiles` (`user_id`, `lastname`, `firstname`, `avatar_url`, `institution`) VALUES
(1, 'Test1', 'One', 'timecat_avatar.gif', 'OSU 1'),
(2, 'Test2', 'Two', 'timecat_avatar.gif', 'OSU 2'),
(3, 'Test3', 'Three', 'timecat_avatar.gif', 'OSU 3'),
(4, 'Test4', 'Four', 'timecat_avatar.gif', 'OSU 4'),
(5, 'Test5', 'Five', 'timecat_avatar.gif', 'OSU 5'),
(6, 'Test6', 'Six', 'timecat_avatar.gif', 'OSU 6');
