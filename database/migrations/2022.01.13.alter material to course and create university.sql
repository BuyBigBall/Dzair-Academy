CREATE TABLE `universities` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `mainname` VARCHAR(80) CHARSET utf8 NOT NULL, `en` VARCHAR(80) CHARSET ASCII, `fr` VARCHAR(80) CHARSET utf8, `ar` VARCHAR(80) CHARSET utf8, `created_at` DATETIME DEFAULT NOW(), `updated_at` TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) CHARSET=utf8; 
ALTER  TABLE  `universities` ADD COLUMN `town` VARCHAR(40) NULL AFTER `ar`; 
ALTER  TABLE `users` ADD COLUMN `university_id` INT UNSIGNED NOT NULL AFTER `phone`, ADD INDEX (`university_id`); 
RENAME TABLE `materials` TO `courses`; 
RENAME TABLE `material_languages` TO `course_languages`; 
ALTER  TABLE `course_languages` CHANGE `material_id` `course_id` INT(10) UNSIGNED NOT NULL, DROP INDEX `material_id`, ADD KEY `course_id_idx` (`course_id`); 
CREATE TABLE `reviews` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `user_id` INT UNSIGNED NOT NULL, `course_id` INT UNSIGNED NOT NULL, `marks` TINYINT DEFAULT 0, `content` TEXT CHARSET utf8 NOT NULL, `created_at` DATETIME NOT NULL DEFAULT NOW(), `updated_at` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP, `verified_at` DATETIME, PRIMARY KEY (`id`) ) CHARSET=utf8; 
ALTER  TABLE `reviews` ADD INDEX (`user_id`), ADD INDEX (`course_id`), ADD FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE, ADD FOREIGN KEY (`course_id`) REFERENCES `courses`(`id`) ON DELETE CASCADE; 
