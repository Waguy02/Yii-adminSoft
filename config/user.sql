CREATE TABLE `Utilisateur` (
  `number` CHAR(9) NOT NULL PRIMARY KEY ,
  `name` VARCHAR(52) NOT NULL,
  `email` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `Utilisateur` VALUES ('6662001', 'LeBG',"lebg@yahoo.fr");
INSERT INTO `Utilisateur` VALUES ('6512384','Hoha',"hoha@msn.com");
INSERT INTO `Utilisateur` VALUES ('6978425','Mignon JEE',"mignonjean@gmail.com");
