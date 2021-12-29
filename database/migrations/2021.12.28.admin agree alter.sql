ALTER TABLE `users` ADD COLUMN `photo_agree` TINYINT DEFAULT 0 NULL AFTER `photo`; 

ALTER TABLE `materials` ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `protected`; 

ALTER TABLE `material_languages` ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `description`; 