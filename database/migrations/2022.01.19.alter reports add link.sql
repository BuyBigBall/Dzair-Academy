ALTER TABLE `reports` ADD COLUMN `link` VARCHAR(255) CHARSET utf8 NOT NULL AFTER `content`; 
ALTER TABLE `reports` DROP FOREIGN KEY `reports_ibfk_1`; 