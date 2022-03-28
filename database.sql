DROP DATABASE IF EXISTS anemone;

CREATE DATABASE anemone;

USE anemone;

CREATE TABLE `persone`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `nascita` date
);

INSERT INTO
    `persone` (`nome`, `cognome`)
VALUES
    ('Tommaso', 'Paoli'),
    ('Maria', 'Nosiglia'),
    ('Stefania', 'Bixio'),
    ('Fabrizio', 'Tutino'),
    ('Venancio', 'Papafava'),
    ('Massimiliano', 'Lussu');

CREATE TABLE `categorieProdotti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `titolo` varchar(16) NOT NULL
);

INSERT INTO
    `categorieProdotti` (`titolo`)
VALUES
    ('Bevande'),    -- 1
    ('Alcolici'),   -- 2
    ('Salumi'),     -- 3
    ('Formaggi'),   -- 4
    ('Scatolame'),  -- 5
    ('Salse'),      -- 6
    ('DPI'),        -- 7
    ('Pulizie'),    -- 8
    ('Indumenti');  -- 9

CREATE TABLE `prodotti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(32) NOT NULL,
    `stock` int(16) NOT NULL,
    `idCategoria` int(8) NOT NULL,
    FOREIGN KEY (`idCategoria`)
        REFERENCES `categorieProdotti` (`id`)
        ON DELETE CASCADE
);

INSERT INTO
    `prodotti` (`nome`, `stock`, `idCategoria`)
VALUES
    ('Cocacola', 24, 1),
    ('Cocacola zero', 24, 1),
    ('Maionese', 6, 6),
    ('Salsa cocktail', 6, 6),
    ('Maglietta bianca logo S', 3, 9),
    ('Maglietta bianca logo M', 3, 9),
    ('Maglietta bianca logo L', 3, 9);

CREATE TABLE `aree`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idResponsabile` int(8),
    `nominativo` varchar(32) NOT NULL UNIQUE,
    FOREIGN KEY (`idResponsabile`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

INSERT INTO
    `aree` (`idResponsabile`, `nominativo`)
VALUES
    (1, 'Alpha'),
    (1, 'Beta'),
    (2, 'Gamma'),
    (NULL, 'Delta');

CREATE TABLE `locali`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `apertura` date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `chiusura` date CHECK (`chiusura` > `apertura`),
    `idArea` int(8),
    `idResponsabile` int(8),
    FOREIGN KEY (`idArea`)
        REFERENCES `aree` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idResponsabile`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

INSERT INTO
    `locali` (`nominativo`, `idArea`, `idResponsabile`)
VALUES
    ('Piadineria Modena', '1', 1),
    ('Piadineria Lucca', '1', 2),
    ('Piadineria Varese', '2', 3),
    ('Alice Pizza Varese', '4', 2),
    ('Alice Pizza Milano', '2', 1);

CREATE TABLE `personaLocale` (
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idPersona` int(8),
    `idLocale` int(8),
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `temi` (
  `id` INT(16) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(32) UNIQUE NOT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO
  `temi` (`nome`)
VALUES
  ('yellow'),
  ('orange'),
  ('red'),
  ('blue'),
  ('green');

CREATE TABLE `utenti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(16) UNIQUE NOT NULL,
    `password` char(64) NOT NULL,
    `email` varchar(32) UNIQUE,
    `idPersona` int(8),
    `idTema` int(16) NOT NULL DEFAULT 1,
    FOREIGN KEY (`idTema`)
        REFERENCES `temi` (`id`),
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

INSERT INTO
    `utenti` (`username`, `password`, `email`, `idPersona`)
VALUES
    ('tomaoli', SHA("asdasd"), 1, 1);

CREATE TABLE `lavora`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `data` date NOT NULL,
    `dalle` time NOT NULL,
    `alle` time NOT NULL,
    `pausa` time,
    `straordinari` time,
    `idPersona` int(8),
    `idLocale` int(8) NOT NULL,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

INSERT INTO
    `lavora` (`data`, `dalle`, `alle`, `pausa`, `straordinari`, `idPersona`, `idLocale`)
VALUES
    ('2012-06-18', '10:30', '14:00', '00:00', '01:30', 1, 1);

CREATE TABLE `ordini`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `data` date NOT NULL,
    `idLocale` int(8) NOT NULL,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE
);

INSERT INTO
    `ordini` (`data`, `idLocale`)
VALUES
    ('2018-02-03', 1);