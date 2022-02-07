
DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `attached` varchar(255) DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `view_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0-create,1-sent,2-view,3-trash,4-delete',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
ALTER TABLE `messages` CHANGE `sent_at` `sent_at` DATETIME DEFAULT NOW() NULL; 