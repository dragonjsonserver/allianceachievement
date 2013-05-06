CREATE TABLE `allianceachievements` (
	`allianceachievement_id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
	`modified` TIMESTAMP NOT NULL DEFAULT NOW() ON UPDATE NOW(),
	`created` TIMESTAMP NOT NULL DEFAULT '0000-00-00 00:00:00',
	`alliance_id` BIGINT(20) UNSIGNED NOT NULL,
	`gamedesign_identifier` VARCHAR(255) NOT NULL,
	`data` TEXT NOT NULL,
	`level` INTEGER(11) NOT NULL,
	PRIMARY KEY (`allianceachievement_id`),
	UNIQUE KEY `alliance_id` (`alliance_id`, `gamedesign_identifier`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
