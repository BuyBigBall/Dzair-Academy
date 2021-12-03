CREATE TABLE `messages` ( `id` INT UNSIGNED NOT NULL AUTO_INCREMENT, `from` INT UNSIGNED NOT NULL, `to` INT UNSIGNED NOT NULL, `title` VARCHAR(255) CHARSET utf8 NOT NULL, `content` TEXT NOT NULL, `attached` VARCHAR(255) CHARSET utf8, `sent_at` DATETIME, `view_at` DATETIME, `status` TINYINT DEFAULT 0 COMMENT '0-create,1-sent,2-view,3-trash,4-delete', `created_at` DATETIME DEFAULT NOW(), `updated_at` TIMESTAMP DEFAULT NOW() ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`id`) ) CHARSET=utf8; 

ALTER TABLE `materials` CHANGE `traning_id` `training_id` INT(10) UNSIGNED NULL; 
ALTER TABLE `material_languages` ADD FOREIGN KEY (`material_id`) REFERENCES `softui`.`materials`(`id`); 
ALTER TABLE `users` CHANGE `role` `role` ENUM('admin','staff','user') CHARSET utf8mb4 COLLATE utf8mb4_unicode_ci NULL AFTER `id`, ADD COLUMN `status` ENUM('active','inactive') NULL AFTER `role`; 
ALTER TABLE `users` ADD COLUMN `role` ENUM('admin','staff','user') NULL AFTER `remember_token`; 