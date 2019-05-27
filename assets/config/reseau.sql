CREATE DATABASE reseau CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE reseau;

CREATE TABLE utilisateur (
  id      INT(3) NOT NULL AUTO_INCREMENT,
  pseudo  VARCHAR(20) NOT NULL,
  email   VARCHAR(255) NOT NULL,
  mdp     VARCHAR(255) NOT NULL,
  type    VARCHAR(20) DEFAULT NULL,
  PRIMARY KEY (id)

)ENGINE=INNODB;

INSERT INTO utilisateur (
  pseudo,
  email,
  mdp,
  type
) VALUES (
  'admin',
  'admin@boutique.fr',
  '$2y$10$JLQVIj9Rvp9VpNgCAAhDrOZNSSh13.OfZBwX3CifDglC6x9poX80W',
  'admin'
);
