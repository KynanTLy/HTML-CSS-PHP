DROP TABLE IF EXISTS `review`;
DROP TABLE IF EXISTS `game`;


/*
Game would contain some of the main information about the game in question
*/
CREATE TABLE `game` (
	`id` mediumint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` varchar(50) DEFAULT NULL,
	`platform` ENUM('PC','XBOX ONE','XBOX 360', 'PS4', 'PS3', 'Wii U', '3DS', 'Other') DEFAULT 'Other'
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*
This would be the the information related to each review
*/
CREATE TABLE `review` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`game_id` mediumint unsigned NOT NULL,
	`overall` tinyint(3) DEFAULT NULL,
	`relate_sad` tinyint(3) DEFAULT NULL,
	`relate_lost` tinyint(3) DEFAULT NULL,
	`relate_family` tinyint(3) DEFAULT NULL,
	`relate_anxiety` tinyint(3) DEFAULT NULL,
	`relate_confidence` tinyint(3) DEFAULT NULL,
	`relate_stress` tinyint(3) DEFAULT NULL,
	`notes` varchar(500) DEFAULT NULL,
	FOREIGN KEY (`game_id`) 
		REFERENCES `game`(`id`)
		ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game`(name, platform) VALUES ("Call of Duty", "XBOX ONE"),("Journey","PC");
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;


LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review`(game_id,  overall, relate_sad, relate_lost, relate_family, relate_anxiety, relate_confidence, relate_stress ) VALUES (1 , 3, 1,3, 2, 2, 2, 2),(2 , 3, 1,3, 5, 5, 2, 2);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;



