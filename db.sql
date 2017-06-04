CREATE TABLE IF NOT EXISTS `dashboard_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `dashboard_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `timestamp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `hotel_updates` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `timestamp` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `master_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(1000) NOT NULL,
  `value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `longstory` text COLLATE latin1_general_ci,
  `shortstory` text COLLATE latin1_general_ci,
  `published` int(10) NOT NULL DEFAULT '0',
  `image` varchar(255) COLLATE latin1_general_ci DEFAULT '{@master_cdn}/img/mastercms.png',
  `campaign` int(1) NOT NULL DEFAULT '0',
  `campaignimg` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `author` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT '1',
  `comments` enum('0','1') COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

CREATE TABLE IF NOT EXISTS `news_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `timestamp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `news_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `new_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `refers_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `refers_amount` int(11) NOT NULL,
  `award_type` varchar(20) NOT NULL,
  `value` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `users_refer_limit` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `ref_limit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1; 

CREATE TABLE IF NOT EXISTS `user_awards` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `award_id` int(11) NOT NULL,
  `award_type` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user_delete_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `expire` int(50) NOT NULL,
  `timestamp` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user_forgot_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `expire` int(25) NOT NULL,
  `timestamp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user_refers` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `refered_user` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` int(15) NOT NULL,
  `refer_ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `user_verification_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL,
  `code` text NOT NULL,
  `expire` int(50) NOT NULL,
  `new_mail` varchar(100) NOT NULL,
  `timestamp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `logs_client_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `data_string` text NOT NULL,
  `machine_id` varchar(75) NOT NULL DEFAULT '',
  `timestamp` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `ranks`;

CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL,
  `color` varchar(7) NOT NULL,
  `fuse_hide_staff` enum('0','1') NOT NULL DEFAULT '0',
  `badge` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `ranks` (`id`, `name`, `badge`, `color`, `fuse_hide_staff`) VALUES
(1, 'Usuario(s).', '', '#fff', '0'),
(2, 'Linces', 'ADM', '#fff', '0'),
(3, 'Encargados de Publicidad', 'ADM', '#fff', '0'),
(4, 'PBL & Soporte', 'ADM', '#fff', '0'),
(5, 'EDP & Ayuda', 'ADM', '#fff', '0'),
(6, 'Inters', 'ADM', '#fff', '0'),
(7, 'Colaboradores', 'ADM', '#fff', '0'),
(8, 'Colaboradores & DS', 'ADM', '#fff', '0'),
(9, 'Soporte EN & Seguridad', 'ADM', '#fff', '0'),
(10, 'Diversi&oacute;n & GM', 'ADM', '#fff', '0'),
(11, 'Moderadores & SP', 'ADM', '#fff', '0'),
(12, 'Co Administradores & ES', 'ADM', '#fff', '0'),
(13, 'Administradores & EP', 'ADM', '#fff', '0'),
(14, 'Managers & Supervisores', 'ADM', '#fff', '0'),
(15, 'Ceo\'s & Encargados', 'ADM', '#fff', '0'),
(16, 'T&eacute;cnicos & Fundadores', 'ADM', '#fff', '0'),
(17, 'Oculto', 'ADM', '#fff', '1');