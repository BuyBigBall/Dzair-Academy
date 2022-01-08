ALTER TABLE `faculties` ADD COLUMN `created_by` INT NULL AFTER `ar`, ADD COLUMN `updated_by` INT NULL AFTER `created_by`, ADD COLUMN `status` TINYINT DEFAULT 0 NULL AFTER `updated_by`; 
