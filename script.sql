---- création de la base--------
CREATE DATABASE login_uballers;
--------------------------------

---- création de la table--------
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  nom varchar(100) NOT NULL,
  prenom varchar(100) NOT NULL,
  contact varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  date_nai date NOT NULL,
  sexe varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB ;