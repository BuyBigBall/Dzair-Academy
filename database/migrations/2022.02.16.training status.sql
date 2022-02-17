ALTER TABLE `trainings` ADD COLUMN `status` TINYINT DEFAULT 0 NOT NULL AFTER `ar`; 
UPDATE `trainings` SET `status`=1