ALTER TABLE `users` ADD COLUMN `photo_agree` TINYINT DEFAULT 0 NULL AFTER `photo`; 

ALTER TABLE `materials` ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `protected`; 

ALTER TABLE `material_languages` ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `description`; 

ALTER TABLE `specializations` ADD COLUMN `created_by` INT NULL AFTER `ar`, ADD COLUMN `updated_by` INT NULL AFTER `created_by`, ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `updated_by`; 

ALTER TABLE `courses` ADD COLUMN `created_by` INT NULL AFTER `ar`, ADD COLUMN `updated_by` INT NULL AFTER `created_by`, ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `updated_by`; 