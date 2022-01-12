
SET FOREIGN_KEY_CHECKS = 0; 
RENAME TABLE `courses` TO `modules`; 
ALTER TABLE `modules` ADD COLUMN `level_id` INT UNSIGNED NOT NULL AFTER `specialization_id`, ADD KEY `level_id` (`level_id`); 
ALTER TABLE `modules` ADD CONSTRAINT `level_forign_key` FOREIGN KEY (`level_id`) REFERENCES `levels`(`id`) ON DELETE CASCADE; 

ALTER TABLE `modules` ADD INDEX `spec_idx` (`specialization_id`), ADD CONSTRAINT `spec_forign_key` FOREIGN KEY (`specialization_id`) REFERENCES `specializations`(`id`) ON DELETE CASCADE; 
ALTER TABLE `modules` CHANGE `level_id` `level` VARCHAR(10) CHARSET ASCII DEFAULT '' NOT NULL, DROP FOREIGN KEY `level_forign_key`, DROP FOREIGN KEY `modules_ibfk_1`; 
SET FOREIGN_KEY_CHECKS = 1; 


CREATE TABLE `universities` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `mainname` VARCHAR(80) CHARSET utf8 NOT NULL, `en` VARCHAR(80) CHARSET ASCII, `fr` VARCHAR(80) CHARSET utf8, `ar` VARCHAR(80) CHARSET utf8, `created_at` DATETIME DEFAULT NOW(), `updated_at` TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) CHARSET=utf8; 
ALTER TABLE  `universities` ADD COLUMN `town` VARCHAR(40) NULL AFTER `ar`; 
ALTER TABLE `users` ADD COLUMN `university_id` INT UNSIGNED NOT NULL AFTER `phone`, ADD INDEX (`university_id`); 