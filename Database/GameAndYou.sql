DROP TABLE IF EXISTS `review`;
DROP TABLE IF EXISTS `game_genre`;
DROP TABLE IF EXISTS `game`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `genre`;

/*
Game would contain some of the main information about the game in question
*/
CREATE TABLE `game` (
	`id` mediumint unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`name` varchar(50) DEFAULT NULL,
	`release_date` DATE DEFAULT NULL,
	`platform` ENUM('PC','XBOX ONE','XBOX 360', 'PS4', 'PS3', 'Wii U', '3DS', 'Other') DEFAULT 'Other',
	`num_review` mediumint DEFAULT 0
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*
The user table would contain some basic information about the user and the amount of reivews they have done
*/
CREATE TABLE `user` (
	`id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`first` varchar(20) DEFAULT NULL,
	`last` varchar(20) DEFAULT NULL,
	`birthdate` DATE DEFAULT NULL,
	`reviewAmount` tinyint(3) DEFAULT 0	
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


/*
The game genre matches the game and what genre it fits into
*/
CREATE TABLE `game_genre` (
	`game_id` mediumint unsigned NOT NULL,	
	`genre` ENUM("First Person Shooter", "Role Playing Game", "Platformer" , "Rogue", "MOBA", "Visual Novel", "Other") DEFAULT 'Other',
	FOREIGN KEY (`game_id`) 
		REFERENCES `game`(`id`)
		ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

/*
This would be the the information related to each review
*/
CREATE TABLE `review` (
	`id` int unsigned NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`reviewer_id` tinyint(3) unsigned NOT NULL,
	`game_id` mediumint unsigned NOT NULL,
	`overall` tinyint(3) DEFAULT NULL,
	`relate_sad` tinyint(3) DEFAULT NULL,
	`relate_lost` tinyint(3) DEFAULT NULL,
	`relate_family` tinyint(3) DEFAULT NULL,
	`relate_anxiety` tinyint(3) DEFAULT NULL,
	`relate_confidence` tinyint(3) DEFAULT NULL,
	`relate_stress` tinyint(3) DEFAULT NULL,
	`notes` varchar(500) DEFAULT NULL,
	FOREIGN KEY (`reviewer_id`) 
		REFERENCES `user`(`id`) 
		ON DELETE RESTRICT ON UPDATE CASCADE,
	FOREIGN KEY (`game_id`) 
		REFERENCES `game`(`id`)
		ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user`(first, last, birthdate, reviewAmount) VALUES ("James","Smith",'1992-06-01', 1),("Bob","Mckoy",'1986-06-12', 1),("George","Buckle",'1990-07-02', 0),("Xing","Tan-Fu",'1996-04-04', 0),("IT","Horror",'1890-08-21', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `game` WRITE;
/*!40000 ALTER TABLE `game` DISABLE KEYS */;
INSERT INTO `game`(name, release_date, platform, num_review) VALUES ("Call of Duty",'1992-06-01', "XBOX ONE", 1),("Journey",'1986-06-12', "PC", 1);
/*!40000 ALTER TABLE `game` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `game_genre` WRITE;
/*!40000 ALTER TABLE `game_genre` DISABLE KEYS */;
INSERT INTO `game_genre`(game_id, genre) VALUES (1,"First Person Shooter"),(2,"Other"),(2,"Visual Novel");
/*!40000 ALTER TABLE `game_genre` ENABLE KEYS */;
UNLOCK TABLES;

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review`(reviewer_id,game_id,  overall, relate_sad, relate_lost, relate_family, relate_anxiety, relate_confidence, relate_stress ) VALUES (1,1 , 3, 1,3, 2, 2, 2, 2),(2,2 , 3, 1,3, 5, 5, 2, 2);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;



