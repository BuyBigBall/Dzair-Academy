CREATE TABLE `universities` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `mainname` VARCHAR(80) CHARSET utf8 NOT NULL, `en` VARCHAR(80) CHARSET ASCII, `fr` VARCHAR(80) CHARSET utf8, `ar` VARCHAR(80) CHARSET utf8, `created_at` DATETIME DEFAULT NOW(), `updated_at` TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) CHARSET=utf8; 
ALTER TABLE  `universities` ADD COLUMN `town` VARCHAR(40) NULL AFTER `ar`; 
ALTER TABLE `users` ADD COLUMN `university_id` INT UNSIGNED NOT NULL AFTER `phone`, ADD INDEX (`university_id`); 
RENAME TABLE `materials` TO `courses`; 
ALTER TABLE `coursel_languages` CHANGE `material_id` `course_id` INT(10) UNSIGNED NOT NULL, DROP INDEX `material_id`, ADD KEY `course_id_idx` (`course_id`); 
