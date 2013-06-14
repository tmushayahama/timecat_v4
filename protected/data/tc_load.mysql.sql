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
('study types', 'simple', 'Each observer focuses in one dimension of the subject\'s workflow, capturing sequential tasks as they occur.'),
('study types', 'multitasking', 'Each observer focuses in three dimensions of the subject\'s workflow, capturing detailed data: Communication, Action and Location.'),
('study types', 'multiactor', 'Each observer focuses in a narrow set of tasks of multiple subject\'s workflow, capturing sequential task for each of them.'),
('study types', 'patient flow', 'Each observer is strategically located to track/follow patients\' flow.'),
('task status', 'active', ''),
('task status', 'inactive', ''),
('task categories', 'simpletime', ''),
('task categories', 'communication', ''),
('task categories', 'location', ''),
('task categories', 'actorN', ''),
('observation type','trainning', ''),
('observation type','IORA', ''),
('observation type','formal', ''),
('observation type','trash', '');

-- Populate the time zones. didn't check if they are correct
insert into tc_timezone(location, gmt_time_offset) values ('International Date Line West', -12);
insert into tc_timezone(location, gmt_time_offset) values ('Midway Island', -11);
insert into tc_timezone(location, gmt_time_offset) values ('Samoa', -11);
insert into tc_timezone(location, gmt_time_offset) values ('Hawaii', -10);
insert into tc_timezone(location, gmt_time_offset) values ('Alaska', -9);
insert into tc_timezone(location, gmt_time_offset) values ('Pacific Time (US & Canada)', -8);
insert into tc_timezone(location, gmt_time_offset) values ('Tijuana', -8);
insert into tc_timezone(location, gmt_time_offset) values ('Arizona', -7);
insert into tc_timezone(location, gmt_time_offset) values ('Mountain Time (US & Canada)', -7);
insert into tc_timezone(location, gmt_time_offset) values ('Chihuahua', -7);
insert into tc_timezone(location, gmt_time_offset) values ('Mazatlan', -7);
insert into tc_timezone(location, gmt_time_offset) values ('Central Time (US & Canada)', -6);
insert into tc_timezone(location, gmt_time_offset) values ('Central America', -6);
insert into tc_timezone(location, gmt_time_offset) values ('Guadalajara', -6);
insert into tc_timezone(location, gmt_time_offset) values ('Mexico City', -6);
insert into tc_timezone(location, gmt_time_offset) values ('Monterrey', -6);
insert into tc_timezone(location, gmt_time_offset) values ('Saskatchewan', -6);
insert into tc_timezone(location, gmt_time_offset) values ('Eastern Time (US & Canada)', -5);
insert into tc_timezone(location, gmt_time_offset) values ('Indiana (East)', -5);
insert into tc_timezone(location, gmt_time_offset) values ('Bogota', -5);
insert into tc_timezone(location, gmt_time_offset) values ('Lima', -5);
insert into tc_timezone(location, gmt_time_offset) values ('Quito', -5);
insert into tc_timezone(location, gmt_time_offset) values ('Atlantic Time (Canada)', -4);
insert into tc_timezone(location, gmt_time_offset) values ('Caracas', -4);
insert into tc_timezone(location, gmt_time_offset) values ('La Paz', -4);
insert into tc_timezone(location, gmt_time_offset) values ('Santiago', -4);
insert into tc_timezone(location, gmt_time_offset) values ('Newfoundland', -3);
insert into tc_timezone(location, gmt_time_offset) values ('Brasilia', -3);
insert into tc_timezone(location, gmt_time_offset) values ('Buenos Aires', -3);
insert into tc_timezone(location, gmt_time_offset) values ('Georgetown', -3);
insert into tc_timezone(location, gmt_time_offset) values ('Greenland', -3);
insert into tc_timezone(location, gmt_time_offset) values ('Mid-Atlantic', -2);
insert into tc_timezone(location, gmt_time_offset) values ('Azores', -1);
insert into tc_timezone(location, gmt_time_offset) values ('Cape Verde Is', -1);
insert into tc_timezone(location, gmt_time_offset) values ('Casablanca', 0);
insert into tc_timezone(location, gmt_time_offset) values ('Dublin', 0);
insert into tc_timezone(location, gmt_time_offset) values ('Edinburgh', 0);
insert into tc_timezone(location, gmt_time_offset) values ('Lisbon', 0);
insert into tc_timezone(location, gmt_time_offset) values ('London', 0);
insert into tc_timezone(location, gmt_time_offset) values ('Monrovia', 0);
insert into tc_timezone(location, gmt_time_offset) values ('Amsterdam', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Belgrade', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Berlin', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Bern', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Bratislava', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Brussels', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Budapest', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Copenhagen', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Ljubljana', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Madrid', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Paris', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Prague', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Rome', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Sarajevo', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Skopje', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Stockholm', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Vienna', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Warsaw', 1);
insert into tc_timezone(location, gmt_time_offset) values ('West Central Africa', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Zagreb', 1);
insert into tc_timezone(location, gmt_time_offset) values ('Athens', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Bucharest', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Cairo', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Harare', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Helsinki', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Istanbul', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Jerusalem', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Kyev', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Minsk', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Pretoria', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Riga', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Sofia', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Tallinn', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Vilnius', 2);
insert into tc_timezone(location, gmt_time_offset) values ('Baghdad', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Kuwait', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Moscow', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Nairobi', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Riyadh', 3);
insert into tc_timezone(location, gmt_time_offset) values ('St. Petersburg', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Volgograd', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Tehran', 3);
insert into tc_timezone(location, gmt_time_offset) values ('Abu Dhabi', 4);
insert into tc_timezone(location, gmt_time_offset) values ('Baku', 4);
insert into tc_timezone(location, gmt_time_offset) values ('Muscat', 4);
insert into tc_timezone(location, gmt_time_offset) values ('Tbilisi', 4);
insert into tc_timezone(location, gmt_time_offset) values ('Yerevan', 4);
insert into tc_timezone(location, gmt_time_offset) values ('Kabul', 4);
insert into tc_timezone(location, gmt_time_offset) values ('Ekaterinburg', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Islamabad', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Karachi', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Tashkent', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Chennai', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Kolkata', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Mumbai', 5);
insert into tc_timezone(location, gmt_time_offset) values ('New Delhi', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Kathmandu', 5);
insert into tc_timezone(location, gmt_time_offset) values ('Almaty', 6);
insert into tc_timezone(location, gmt_time_offset) values ('Astana', 6);
insert into tc_timezone(location, gmt_time_offset) values ('Dhaka', 6);
insert into tc_timezone(location, gmt_time_offset) values ('Novosibirsk', 6);
insert into tc_timezone(location, gmt_time_offset) values ('Sri Jayawardenepura', 6);
insert into tc_timezone(location, gmt_time_offset) values ('Rangoon', 6);
insert into tc_timezone(location, gmt_time_offset) values ('Bangkok', 7);
insert into tc_timezone(location, gmt_time_offset) values ('Hanoi', 7);
insert into tc_timezone(location, gmt_time_offset) values ('Jakarta', 7);
insert into tc_timezone(location, gmt_time_offset) values ('Krasnoyarsk', 7);
insert into tc_timezone(location, gmt_time_offset) values ('Beijing', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Chongqing', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Hong Kong', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Irkutsk', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Kuala Lumpur', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Perth', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Singapore', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Taipei', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Ulaan Bataar', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Urumqi', 8);
insert into tc_timezone(location, gmt_time_offset) values ('Osaka', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Sapporo', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Seoul', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Tokyo', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Yakutsk', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Adelaide', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Darwin', 9);
insert into tc_timezone(location, gmt_time_offset) values ('Brisbane', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Canberra', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Guam', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Hobart', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Melbourne', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Port Moresby', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Sydney', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Vladivostok', 10);
insert into tc_timezone(location, gmt_time_offset) values ('Magadan', 11);
insert into tc_timezone(location, gmt_time_offset) values ('New Caledonia', 11);
insert into tc_timezone(location, gmt_time_offset) values ('Solomon Is.', 11);
insert into tc_timezone(location, gmt_time_offset) values ('Auckland', 12);
insert into tc_timezone(location, gmt_time_offset) values ('Fiji', 12);
insert into tc_timezone(location, gmt_time_offset) values ('Kamchatka', 12);
insert into tc_timezone(location, gmt_time_offset) values ('Marshall Is.', 12);
insert into tc_timezone(location, gmt_time_offset) values ('Wellington', 12);
