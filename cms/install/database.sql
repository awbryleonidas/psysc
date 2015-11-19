--
-- Table structure for table `audittrail`
--

CREATE TABLE IF NOT EXISTS `audittrail` (
`audittrail_id` int(10) unsigned NOT NULL,
  `audittrail_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `audittrail_table` varchar(255) NOT NULL,
  `audittrail_table_id` int(11) NOT NULL,
  `audittrail_action` varchar(255) NOT NULL,
  `audittrail_message` text NOT NULL,
  `audittrail_old` text NOT NULL,
  `audittrail_new` text NOT NULL,
  `audittrail_ip` varchar(80) NOT NULL,
  `audittrail_user_agent` text NOT NULL,
  `audittrail_user_id` int(10) unsigned NOT NULL,
  `audittrail_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `audittrail`
 ADD PRIMARY KEY (`audittrail_id`), ADD KEY `audittrail_date` (`audittrail_date`), ADD KEY `audittrail_table` (`audittrail_table`), ADD KEY `audittrail_table_id` (`audittrail_table_id`), ADD KEY `audittrail_action` (`audittrail_action`), ADD KEY `audittrail_ip` (`audittrail_ip`), ADD KEY `audittrail_user_id` (`audittrail_user_id`), ADD KEY `audittrail_deleted` (`audittrail_deleted`);

ALTER TABLE `audittrail`
MODIFY `audittrail_id` int(10) unsigned NOT NULL AUTO_INCREMENT;




-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
`captcha_id` mediumint(8) unsigned NOT NULL,
  `captcha_time` int(10) unsigned NOT NULL,
  `captcha_ip_address` varchar(16) NOT NULL DEFAULT '0',
  `captcha_word` varchar(32) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `captcha`
 ADD PRIMARY KEY (`captcha_id`), ADD KEY `word` (`captcha_word`);

ALTER TABLE `captcha`
MODIFY `captcha_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE IF NOT EXISTS `configs` (
`config_id` smallint(5) unsigned NOT NULL,
  `config_name` varchar(80) NOT NULL,
  `config_value` text NOT NULL,
  `config_description` text NOT NULL,
  `config_created_by` smallint(5) unsigned NOT NULL,
  `config_created_on` datetime NOT NULL,
  `config_modified_by` smallint(5) unsigned NOT NULL,
  `config_modified_on` datetime NOT NULL,
  `config_deleted` tinyint(1) NOT NULL,
  `config_deleted_by` smallint(5) unsigned NOT NULL,
  `config_deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `configs`
 ADD PRIMARY KEY (`config_id`), ADD KEY `config_name` (`config_name`), ADD KEY `config_deleted` (`config_deleted`);

ALTER TABLE `configs`
MODIFY `config_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`config_name`, `config_value`, `config_description`, `config_created_by`, `config_created_on`, `config_modified_by`, `config_modified_on`, `config_deleted`, `config_deleted_by`, `config_deleted_on`) VALUES
('application_name', 'AppName', 'The application name', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('application_email_from', 'che.leonidas@gmail.com', 'Email address to use when sending an email', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('min_password_length', '8', 'Minimum Required Length of Password', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('max_password_length', '20', 'Maximum Allowed Length of Password', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('user_expire', '0', 'How long to remember the user (seconds). Set to zero for no expiration.', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('user_extend_on_login', '1', 'Extend the users cookies everytime they auto-login', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('track_login_attempts', '0', 'Track the number of failed login attempts for each user or IP.', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('maximum_login_attempts', '3', 'The maximum number of failed login attempts.', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('user_lockout_time', '600', 'The number of miliseconds to lockout an account due to exceeded attempts', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('forgot_password_expiration', '0', 'The number of miliseconds after which a forgot password request will expire. If set to 0, forgot password requests will not expire.', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_useragent', 'AppName', '', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_protocol', 'mail', '', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_mailpath', '/usr/sbin/sendmail', '', 0, '2015-02-24 18:12:46', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_host', 'smtp.gmail.com', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_user', 'user@gmail.com', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_pass', 'password', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_port', '587', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_timeout', '30', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_wordwrap', '1', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_wrapchars', '76', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_mailtype', 'html', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_charset', 'iso-8859-1', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_crlf', '\\r\\n', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_newline', '\\r\\n', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_crypto', 'tls', '', 0, '2015-02-24 18:12:47', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_smtp_auth', '1', '', 0, '2015-02-24 18:12:48', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('email_notices', '0', 'Enable or disable email notifications on requisition process', 0, '2015-02-24 18:12:48', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
`group_id` mediumint(8) unsigned NOT NULL,
  `group_name` varchar(80) NOT NULL,
  `group_description` varchar(255) NOT NULL,
  `group_deleted` tinyint(1) NOT NULL,
  `group_deleted_by` smallint(5) unsigned NOT NULL,
  `group_deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `groups`
 ADD PRIMARY KEY (`group_id`), ADD KEY `group_name` (`group_name`), ADD KEY `group_deleted` (`group_deleted`);

ALTER TABLE `groups`
MODIFY `group_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `group_name`, `group_description`, `group_deleted`, `group_deleted_by`, `group_deleted_on`) VALUES
(1, 'Admin', '', 0, 0, '0000-00-00 00:00:00'),
(2, 'Staff', '', 0, 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `group_perms`
--

CREATE TABLE IF NOT EXISTS `group_perms` (
`group_perm_id` int(10) unsigned NOT NULL,
  `group_perm_group_id` mediumint(8) unsigned NOT NULL,
  `group_perm_permission_id` mediumint(8) unsigned NOT NULL,
  `group_perm_allowed` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=deny, 1=all, 2=group, 3=own',
  `group_perm_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `group_perms`
 ADD PRIMARY KEY (`group_perm_id`), ADD KEY `group_id` (`group_perm_group_id`), ADD KEY `perm_id` (`group_perm_permission_id`), ADD KEY `allowed` (`group_perm_allowed`), ADD KEY `deleted` (`group_perm_deleted`);

ALTER TABLE `group_perms`
MODIFY `group_perm_id` int(10) unsigned NOT NULL AUTO_INCREMENT;

INSERT INTO `group_perms` (`group_perm_id`, `group_perm_group_id`, `group_perm_permission_id`, `group_perm_allowed`, `group_perm_deleted`) VALUES
(1, 1, 1, 1, 0),
(2, 1, 4, 1, 0),
(3, 1, 2, 1, 0),
(4, 1, 3, 1, 0),
(5, 1, 15, 1, 0),
(6, 1, 6, 1, 0),
(7, 1, 9, 1, 0),
(8, 1, 5, 1, 0),
(9, 1, 8, 1, 0),
(10, 1, 7, 1, 0),
(11, 1, 13, 1, 0),
(12, 1, 14, 1, 0),
(13, 1, 10, 1, 0),
(14, 1, 12, 1, 0),
(15, 1, 11, 1, 0),
(16, 1, 17, 1, 0),
(17, 1, 34, 1, 0),
(18, 1, 37, 1, 0),
(19, 1, 30, 1, 0),
(20, 1, 33, 1, 0),
(21, 1, 32, 1, 0),
(22, 1, 29, 1, 0),
(23, 1, 31, 1, 0),
(24, 1, 38, 1, 0),
(25, 1, 35, 1, 0),
(26, 1, 36, 1, 0),
(27, 1, 21, 1, 0),
(28, 1, 23, 1, 0),
(29, 1, 18, 1, 0),
(30, 1, 20, 1, 0),
(31, 1, 19, 1, 0),
(32, 1, 22, 1, 0),
(33, 1, 27, 1, 0),
(34, 1, 28, 1, 0),
(35, 1, 24, 1, 0),
(36, 1, 26, 1, 0),
(37, 1, 25, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
`login_attempt_id` int(11) unsigned NOT NULL,
  `login_attempt_ip_address` varbinary(16) NOT NULL,
  `login_attempt_login` varchar(100) NOT NULL,
  `login_attempt_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `login_attempts`
 ADD PRIMARY KEY (`login_attempt_id`);

ALTER TABLE `login_attempts`
MODIFY `login_attempt_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`menu_id` smallint(5) unsigned NOT NULL,
  `menu_text` varchar(80) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_permission` varchar(255) NOT NULL,
  `menu_icon` varchar(80) NOT NULL,
  `menu_parent_id` smallint(5) unsigned NOT NULL,
  `menu_order` tinyint(4) NOT NULL,
  `menu_active` tinyint(1) NOT NULL,
  `menu_created_by` smallint(5) unsigned NOT NULL,
  `menu_created_on` datetime NOT NULL,
  `menu_modified_by` smallint(5) unsigned NOT NULL,
  `menu_modified_on` datetime NOT NULL,
  `menu_deleted` tinyint(1) NOT NULL,
  `menu_deleted_by` smallint(5) unsigned NOT NULL,
  `menu_deleted_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `menu`
 ADD PRIMARY KEY (`menu_id`), ADD KEY `menu_text` (`menu_text`), ADD KEY `menu_link` (`menu_link`), ADD KEY `menu_permission` (`menu_permission`), ADD KEY `menu_active` (`menu_active`), ADD KEY `menu_deleted` (`menu_deleted`);

ALTER TABLE `menu`
MODIFY `menu_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_text`, `menu_link`, `menu_permission`, `menu_icon`, `menu_parent_id`, `menu_order`, `menu_active`, `menu_created_by`, `menu_created_on`, `menu_modified_by`, `menu_modified_on`, `menu_deleted`, `menu_deleted_by`, `menu_deleted_on`) VALUES
('Overview', '/', 'Overview.Overview.List', 'fa fa-bar-chart', 0, 1, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Users', 'users', 'Users.Users.List', 'fa fa-user', 0, 9, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Users', 'users/users', 'Users.Users.List', 'fa fa-user', 2, 1, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Groups', 'users/groups', 'Users.Groups.List', 'fa fa-users', 2, 2, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Settings', 'settings', 'Settings.Settings.List', 'fa fa-cogs', 0, 10, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Application Settings', 'settings/application', 'Settings.Application.Edit', 'fa fa-cog', 5, 1, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Email Settings', 'settings/email', 'Settings.Email.Edit', 'fa fa-envelope', 5, 2, 1, 0, '2015-02-24 18:12:45', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('User Settings', 'settings/user', 'Settings.User.Edit', 'fa fa-users', 5, 3, 1, 0, '2015-02-24 18:12:45', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Sidebar Menu', 'settings/menu', 'Settings.Menu.List', 'fa fa-list-ul', 5, 8, 1, 0, '2015-02-24 18:12:45', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Reports', 'reports', 'Reports.Reports.List', 'fa fa-bar-chart', 0, 8, 1, 0, '2015-02-24 18:12:45', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00'),
('Audittrail', 'reports/audittrail', 'Reports.Audittrail.List', 'fa fa-archive', 10, 10, 1, 0, '2015-02-24 18:12:44', 0, '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00')

;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
`permission_id` mediumint(8) unsigned NOT NULL,
  `permission_name` varchar(255) NOT NULL,
  `permission_simple` tinyint(1) NOT NULL,
  `permission_active` tinyint(1) NOT NULL DEFAULT '1',
  `permission_deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `permissions`
 ADD PRIMARY KEY (`permission_id`), ADD KEY `perm_name` (`permission_name`), ADD KEY `perm_simple` (`permission_simple`), ADD KEY `perm_active` (`permission_active`), ADD KEY `perm_deleted` (`permission_deleted`);

ALTER TABLE `permissions`
MODIFY `permission_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`permission_name`, `permission_simple`, `permission_active`, `permission_deleted`) VALUES
('Overview.Overview.List', 1, 1, 0),
('Reports.Audittrail.List', 1, 1, 0),
('Reports.Audittrail.View', 1, 1, 0),
('Reports.Reports.List', 1, 1, 0),
('Settings.Application.Edit', 1, 1, 0),
('Settings.Application.List', 1, 1, 0),
('Settings.Email.Testmail', 1, 1, 0),
('Settings.Email.Edit', 1, 1, 0),
('Settings.Email.List', 1, 1, 0),
('Settings.Menu.Add', 1, 1, 0),
('Settings.Menu.Delete', 1, 1, 0),
('Settings.Menu.Edit', 1, 1, 0),
('Settings.Menu.List', 1, 1, 0),
('Settings.Menu.View', 1, 1, 0),
('Settings.Settings.List', 1, 1, 0),
('Settings.User.Edit', 1, 1, 0),
('Settings.User.List', 1, 1, 0),
('Users.Groups.Add', 1, 1, 0),
('Users.Groups.Delete', 1, 1, 0),
('Users.Groups.Edit', 1, 1, 0),
('Users.Groups.List', 1, 1, 0),
('Users.Groups.Permissions', 1, 1, 0),
('Users.Groups.View', 1, 1, 0),
('Users.Permissions.Add', 1, 1, 0),
('Users.Permissions.Delete', 1, 1, 0),
('Users.Permissions.Edit', 1, 1, 0),
('Users.Permissions.List', 1, 1, 0),
('Users.Permissions.View', 1, 1, 0),
('Users.Users.Activate', 1, 1, 0),
('Users.Users.Add', 1, 1, 0),
('Users.Users.Deactivate', 1, 1, 0),
('Users.Users.Delete', 1, 1, 0),
('Users.Users.Edit', 1, 1, 0),
('Users.Users.List', 1, 1, 0),
('Users.Users.Picture', 1, 1, 0),
('Users.Users.Profile', 1, 1, 0),
('Users.Users.View', 1, 1, 0),
('Users.Users.Password', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL,
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `sessions`
 ADD PRIMARY KEY (`session_id`);
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` smallint(5) unsigned NOT NULL,
  `user_ip_address` varbinary(16) NOT NULL,
  `user_username` varchar(100) NOT NULL,
  `user_password` varchar(80) NOT NULL,
  `user_firstname` varchar(80) NOT NULL,
  `user_lastname` varchar(80) NOT NULL,
  `user_salt` varchar(40) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_activation_code` varchar(40) DEFAULT NULL,
  `user_forgotten_password_code` varchar(40) DEFAULT NULL,
  `user_forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `user_remember_code` varchar(40) DEFAULT NULL,
  `user_created_on` int(11) unsigned NOT NULL,
  `user_last_login` int(11) unsigned DEFAULT NULL,
  `user_active` tinyint(1) unsigned DEFAULT NULL,
  `user_image` varchar(80) NOT NULL,
  `user_deleted` tinyint(1) NOT NULL,
  `user_deleted_by` smallint(5) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD KEY `username` (`user_username`), ADD KEY `email` (`user_email`), ADD KEY `firstname` (`user_firstname`), ADD KEY `lastname` (`user_lastname`), ADD KEY `deleted` (`user_deleted`);

ALTER TABLE `users`
MODIFY `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_ip_address`, `user_username`, `user_password`, `user_firstname`, `user_lastname`, `user_salt`, `user_email`, `user_activation_code`, `user_forgotten_password_code`, `user_forgotten_password_time`, `user_remember_code`, `user_created_on`, `user_last_login`, `user_active`, `user_image`, `user_deleted`, `user_deleted_by`) VALUES
(1, 0x3132372e302e302e31, 'admin', 'aab346d983852cfb19001775e7a37c8c0c652e47', 'Admin', 'User', '92231cd96e', 'admin@companyxyz.com', NULL, NULL, NULL, NULL, 1424772736, 1424772783, 1, '', 0, 0),
(2, 0x3132372e302e302e31, 'staff', 'aab346d983852cfb19001775e7a37c8c0c652e47', 'Staff', 'User', '92231cd96e', 'staff@companyxyz.com', NULL, NULL, NULL, NULL, 1424772736, 1424772736, 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE IF NOT EXISTS `users_groups` (
`user_group_id` int(11) unsigned NOT NULL,
  `user_group_user_id` int(11) unsigned NOT NULL,
  `user_group_group_id` mediumint(8) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `users_groups`
 ADD PRIMARY KEY (`user_group_id`), ADD KEY `user_id` (`user_group_user_id`), ADD KEY `group_id` (`user_group_group_id`);

ALTER TABLE `users_groups`
MODIFY `user_group_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`user_group_id`, `user_group_user_id`, `user_group_group_id`) VALUES
(1, 1, 1),
(2, 2, 2);