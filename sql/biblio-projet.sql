clientsDROP SCHEMA IF EXISTS `iut-projet-bdd`;
CREATE SCHEMA `iut-projet-bdd`;
USE `iut-projet-bdd`;

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
CREATE TABLE `clients` (
                           `CodeClient` int(11) NOT NULL AUTO_INCREMENT,
                           `Nom` varchar(25) NOT NULL,
                           `Prenom` varchar(20) DEFAULT NULL,
                           `Adresse` varchar(50) DEFAULT NULL,
                           `CP` char(5) DEFAULT NULL,
                           `Ville` varchar(20) DEFAULT NULL,
                           `DateCotis` date DEFAULT NULL,
                           PRIMARY KEY (`CodeClient`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clients
-- ----------------------------
INSERT INTO `clients` VALUES ('1', 'MARTIN', 'Jean', '3 rue principale', '76500', 'Elbeuf', '2015-06-14');
INSERT INTO `clients` VALUES ('2', 'DUPONT', 'Jacques', '127 Avenue Victor Hugo', '76320', 'Caudebec', '2015-05-04');
INSERT INTO `clients` VALUES ('3', 'HENRI', 'Marcel', '54 imp. des fleurs', '76500', 'Elbeuf', '2004-11-12');
INSERT INTO `clients` VALUES ('4', 'MARECHAL', 'Marie', '37 avenue Victor Hugo', '76500', 'Elbeuf', '2015-10-21');
INSERT INTO `clients` VALUES ('5', 'GAUDEFROY', 'Sylvie', '28 route de Dieppe', '76500', 'Elbeuf', '2004-01-02');
INSERT INTO `clients` VALUES ('6', 'PASQUET', 'Christian', '72 avenue Marcel Proust', '76320', 'Caudebec', '2015-04-26');
INSERT INTO `clients` VALUES ('7', 'MARTIN', 'Jacques', '4 impasse des fleurs', '76500', 'Elbeuf', '2015-03-12');
INSERT INTO `clients` VALUES ('8', 'DELAMARE', 'Annie', '17 rue verte', '76000', 'Rouen', '2016-10-23');
INSERT INTO `clients` VALUES ('9', 'SEVENOT', 'Cathie', '7 rue Pierre-Gilles de Gesne', '76320', 'Caudebec', '2016-02-14');
INSERT INTO `clients` VALUES ('10', 'JEAN', 'Martial', '12 rueEric Satie', '76000', 'Rouen', '2021-03-01');
INSERT INTO `clients` VALUES ('11', 'DUFLOT', 'Albert', '6 route de Rouen', '76500', 'Elbeuf', '2016-07-04');
INSERT INTO `clients` VALUES ('12', 'PRISCOT', 'Séverine', '12 mail Pelissier', '76000', 'Rouen', '2016-04-12');
INSERT INTO `clients` VALUES ('13', 'MARTIN', 'Denise', '7 cours Gambetta', '76500', 'Elbeuf', '2016-12-07');
INSERT INTO `clients` VALUES ('14', 'CATELIER', 'Denis', '54 Avenue du 14 juillet', '76350', 'Oissel', '2016-12-08');
INSERT INTO `clients` VALUES ('15', 'SENECHAL', 'Valérie', '20 rue Georges Sand', '76320', 'Caudebec', '2016-06-01');
INSERT INTO `clients` VALUES ('16', 'AVENEL', 'Xavier', '5 rue Emile Zola', '76500', 'La Londe', '2016-09-18');
INSERT INTO `clients` VALUES ('17', 'ALLEGRINI', 'Ghislaine', '16 rue des bruyères', '76450', 'BOSVILLE', '2019-05-03');
INSERT INTO `clients` VALUES ('18', 'COLLET', 'Laetitia', '112 route du Bourg', '76450', 'BOSVILLE', '2016-09-13');
INSERT INTO `clients` VALUES ('19', 'WURST', 'Daniel', '8 rue Paul Doumer', '76320', 'Caudebec', '2016-10-11');
INSERT INTO `clients` VALUES ('20', 'CERISOT', 'Marie-Christine', '5 place de l\'élise', '76500', 'La Londe', '2016-07-24');
INSERT INTO `clients` VALUES ('21', 'BELAID', 'Karim', '17 rue Francois Petit', '76350', 'Oissel', '2016-12-04');
INSERT INTO `clients` VALUES ('22', 'WITKIEWICZ', 'Gerald', '32 rue Edouard Levasseur', '27000', 'Evreux', '2021-02-02');
INSERT INTO `clients` VALUES ('23', 'CAMILLE', 'Jeanne', '5 route des près', '27130', 'ROMILLY', '2016-12-03');
INSERT INTO `clients` VALUES ('24', 'DURAND', 'Thierry', '4 rue du 8 mai', '76750', 'Saint Gatien', '2016-08-30');
INSERT INTO `clients` VALUES ('25', 'DOS SANTOS', 'José', '3 clos des emmurés', '76320', 'Caudebec', '2021-04-23');
INSERT INTO `clients` VALUES ('26', 'LECUYER', 'Monique', '8 quai Jean Baptiste de La Salle', '76000', 'Rouen', '2016-06-12');
INSERT INTO `clients` VALUES ('27', 'PORTE', 'Claude', '1307 route d\'Elbeuf', '27260', 'Martot', '2015-10-24');

-- ----------------------------
-- Table structure for ouvrages
-- ----------------------------
CREATE TABLE `ouvrages` (
                            `CodeOuvra` int(11) NOT NULL AUTO_INCREMENT,
                            `Titre` varchar(50) DEFAULT NULL,
                            `Auteur` varchar(20) DEFAULT NULL,
                            `DateParu` date DEFAULT NULL,
                            `Editeur` varchar(20) DEFAULT NULL,
                            `ISBN` char(10) DEFAULT NULL,
                            PRIMARY KEY (`CodeOuvra`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ouvrages
-- ----------------------------
INSERT INTO `ouvrages` VALUES ('1', 'PHP et MySQl', 'GUERIN B.A.', '2004-04-01', 'EMI', '2746023407');
INSERT INTO `ouvrages` VALUES ('2', 'Pratique de PHP et MySQL', 'RIGAUX P.', '2001-04-01', 'O\'Reilly', '2841771237');
INSERT INTO `ouvrages` VALUES ('3', 'MySQL 4', 'PELLERIN F.', '2004-03-01', 'Dunod', '2100077260');
INSERT INTO `ouvrages` VALUES ('4', 'Le système Linux', 'WELSH M.', '2004-08-01', 'O\'Reilly', '2841772411');
INSERT INTO `ouvrages` VALUES ('5', 'Linux initiation et utilisation', 'ARMSPACH', '2000-10-01', 'Dunod', '210007654X');
INSERT INTO `ouvrages` VALUES ('6', 'Java 2 préparation et certification', 'JAWORSKI J.', '2000-02-01', 'Campus Press', '2744008060');
INSERT INTO `ouvrages` VALUES ('7', 'Le registre de Windows XP', 'HIPSON P.', '1985-04-15', 'Micro App', '2742927093');
INSERT INTO `ouvrages` VALUES ('8', 'Objet relationnel sous Oracle 8', 'SOUTOU C.', '1999-03-01', 'Eyrolles', '2212090633');
INSERT INTO `ouvrages` VALUES ('9', 'Oracle PL/SQL Guide de programmation', 'FEUERSTEIN S.', '2000-02-01', 'O\'Reilly', '2841770257');
INSERT INTO `ouvrages` VALUES ('10', 'JSP', 'GOODWILL J.', '2000-08-01', 'Campus Press', '2744009504');
INSERT INTO `ouvrages` VALUES ('11', 'UML2 par la pratique', 'ROQUES P.', '2015-08-01', 'Eyrolles', '2212116802');
INSERT INTO `ouvrages` VALUES ('12', 'SWING la synthèse', 'BERTHIE V.', '2001-08-01', 'Dunod', '2100081799');
INSERT INTO `ouvrages` VALUES ('13', 'Informatique iondustrielle et Java', 'MALLET F.', '2003-09-01', 'Dunod', '2100079816');
INSERT INTO `ouvrages` VALUES ('14', 'Linux programmation système et réseau', 'DELACROIX J.', '2003-10-01', 'Dunod', '210006780X');
INSERT INTO `ouvrages` VALUES ('15', 'Le noyau Linux', 'BOVET D.P.', '2001-06-01', 'O\'Reilly', '2841771415');
INSERT INTO `ouvrages` VALUES ('16', 'Administration Linux à 200%', 'FLICKENGER R.', '2004-03-01', 'O\'Reilly', '2841772950');
INSERT INTO `ouvrages` VALUES ('17', 'Exemples en Java in a nutshell', 'FLANAGAN D.', '2003-02-01', 'O\'Reilly', '2841771377');
INSERT INTO `ouvrages` VALUES ('18', 'Introduction à XML', 'RAY E.T.', '2001-11-01', 'O\'Reilly', '2841771423');
INSERT INTO `ouvrages` VALUES ('19', 'VBA', 'MESTERS J.P.', '2003-11-01', 'Micro App', '2742932437');
INSERT INTO `ouvrages` VALUES ('20', 'Visual Basic 6', 'KIRTEIN M.', '1999-12-01', 'Micro App', '2742913858');

-- ----------------------------
-- Table structure for prets
-- ----------------------------
CREATE TABLE `prets` (
  `Client` int(11) NOT NULL,
  `Ouvrage` int(11) NOT NULL,
  `DatePret` date NOT NULL,
  `DateRetour` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of prets
-- ----------------------------
INSERT INTO `prets` VALUES ('1', '3', '2020-10-05', '2020-10-18');
INSERT INTO `prets` VALUES ('1', '7', '2020-10-05', '2020-10-18');
INSERT INTO `prets` VALUES ('4', '2', '2020-10-05', '2020-10-11');
INSERT INTO `prets` VALUES ('5', '18', '2020-10-08', '2020-10-30');
INSERT INTO `prets` VALUES ('14', '17', '2020-10-12', '2020-10-29');
INSERT INTO `prets` VALUES ('20', '16', '2020-10-15', '2020-10-25');
INSERT INTO `prets` VALUES ('8', '8', '2020-10-15', '2020-10-19');
INSERT INTO `prets` VALUES ('1', '4', '2020-10-18', '2020-11-02');
INSERT INTO `prets` VALUES ('1', '12', '2020-10-18', '2020-11-02');
INSERT INTO `prets` VALUES ('2', '11', '2020-10-20', '2020-11-03');
INSERT INTO `prets` VALUES ('15', '12', '2020-10-20', '2020-11-04');
INSERT INTO `prets` VALUES ('15', '6', '2020-10-20', '2020-11-04');
INSERT INTO `prets` VALUES ('9', '1', '2020-11-02', '2020-11-05');
INSERT INTO `prets` VALUES ('15', '3', '2020-11-04', '2020-11-18');
INSERT INTO `prets` VALUES ('15', '5', '2020-11-04', '2020-11-18');
INSERT INTO `prets` VALUES ('19', '12', '2020-11-05', '2020-11-22');
INSERT INTO `prets` VALUES ('6', '8', '2020-12-05', null);
INSERT INTO `prets` VALUES ('6', '3', '2020-12-05', null);
INSERT INTO `prets` VALUES ('3', '17', '2021-01-04', null);
INSERT INTO `prets` VALUES ('20', '12', '2021-01-18', null);

ALTER TABLE `prets` 
ADD COLUMN `id` INT NOT NULL AUTO_INCREMENT FIRST,
ADD PRIMARY KEY (`id`);