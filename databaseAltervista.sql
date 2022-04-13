use my_anemone;

DROP TABLE persone, aree, locali, turni, permessi, utenti, temi, messaggi, casse, prodotti, conteggi, merce, scontrini, versamenti, personaLocale, messaggioutente, prodottoScontrino, scontrinoProdotti, fornitori, ordini, inventari, delivery;

CREATE TABLE `persone`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `telefono` char(10),
    `slug` varchar(32) UNIQUE NOT NULL DEFAULT (REPLACE(CONCAT((`nome`),(`cognome`)), ' ', '')),
    `nascita` date,
    `email` varchar(32)
);

CREATE TABLE `aree`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idResponsabile` int(8),
    `nominativo` varchar(32) NOT NULL UNIQUE,
    FOREIGN KEY (`idResponsabile`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `locali`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `apertura` date NOT NULL DEFAULT (CURRENT_TIMESTAMP),
    `chiusura` date,
     CONSTRAINT parts_chk_price_gt_cost 
        CHECK(chiusura >= apertura),
    `idArea` int(8),
    `idResponsabile` int(8),
    FOREIGN KEY (`idArea`)
        REFERENCES `aree` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idResponsabile`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

-- relazione persone lavora locali
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

CREATE TABLE `turni`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `da` datetime NOT NULL,
    `a` datetime NOT NULL,
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

CREATE TABLE `permessi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `da` datetime NOT NULL,
    `a` datetime NOT NULL,
    `isApprovato` BIT(1),
    `idPersona` int(8),
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `temi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) UNIQUE NOT NULL
);

INSERT INTO
    `temi` (`nome`)
VALUES
    ('green'),
    ('blue'),
    ('yellow'),
    ('red'),
    ('orange'),
    ('black');

CREATE TABLE `utenti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `username` varchar(16) UNIQUE NOT NULL,
    `password` char(64) NOT NULL,
    `idPersona` int(8) NOT NULL,
    `idTema` int(8) NOT NULL DEFAULT 1,
    FOREIGN KEY (`idTema`)
        REFERENCES `temi` (`id`)
);

CREATE TABLE `messaggi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `titolo` varchar(32),
    `testo` varchar(256),
    `idUtente` int(8),
    `quando` datetime(4) NOT NULL DEFAULT (CURRENT_TIMESTAMP),
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `messaggioutente`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idMessaggio` int(8) NOT NULL,
    `idUtente` int(8) NOT NULL,
    FOREIGN KEY (`idMessaggio`)
        REFERENCES `messaggi` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `casse` (
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idLocale` int(8) NOT NULL,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `prodotti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `costo` float(15, 2) NOT NULL DEFAULT 0
);

CREATE TABLE `merce`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `stock` int(16) NOT NULL,
    `categoria` enum('Formaggi', 'Salumi', 'Impasti', 'Caffetteria') NOT NULL
);

CREATE TABLE `prodottoScontrino`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idProdotto` int(8) NOT NULL,
    `idMerce` int(8) NOT NULL,
    `quantita` int(16) NOT NULL DEFAULT 0,
    FOREIGN KEY (`idProdotto`)
        REFERENCES `prodotti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idMerce`)
        REFERENCES `merce` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `scontrini`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `quando` datetime(4) NOT NULL,
    `prezzo` decimal(15,2) NOT NULL,
    `sconto` decimal(15,2),
    `idPersona` int(8),
    `idCassa` int(8) NOT NULL,
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idCassa`)
        REFERENCES `casse` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `scontrinoProdotti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idScontrino` int(8) NOT NULL,
    `idProdotto` int(8) NOT NULL,
    `quanti` int(16),
    FOREIGN KEY (`idScontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idProdotto`)
        REFERENCES `prodotti` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `conteggi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idPersona` int(8),
    `idCassa` int(8) NOT NULL,
    `differenza` int(8) NOT NULL,
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idCassa`)
        REFERENCES `casse` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `versamenti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idPersona` int(8),
    `idCassa` int(8) NOT NULL,
    `totale` decimal(15,2) NOT NULL,
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idCassa`)
        REFERENCES `casse` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `fornitori`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(16) NOT NULL,
    `indirizzo` varchar(32) NOT NULL,
    `telefono` char(10)
);

CREATE TABLE `ordini`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `data` date NOT NULL,
    `idLocale` int(8) NOT NULL,
    `idMerce` int(8) NOT NULL,
    `idFornitore` int(8), 
    `stock` int(16) NOT NULL,
    `confermato` bit(1) NOT NULL DEFAULT 0,
    `costo` decimal(15,2) NOT NULL DEFAULT 0,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idMerce`)
        REFERENCES `merce` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idFornitore`)
        REFERENCES `fornitori` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `inventari`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idPersona` int(8),
    `idMerce` int(8) NOT NULL,
    `quantita` int(16) NOT NULL DEFAULT (CURRENT_TIMESTAMP),
    `quando` datetime(4),
    FOREIGN KEY (`idPersona`)
        REFERENCES `persone` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idMerce`)
        REFERENCES `merce` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `delivery`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `valore` decimal(15, 2) NOT NULL,
    `fascia` int(2),
    `nome` varchar(32) NOT NULL,
    `giorno` date DEFAULT (CURRENT_TIMESTAMP)
);

INSERT INTO
    `persone` (`nome`, `cognome`)
VALUES
    ('Mario', 'Forti'), 
    ('Chiara', 'Libardoni'),
    ('Noemi', 'Bruschetta'),

    ('Luca', 'Floreacing'),
    ('Giovanni', 'Rippa'),
    ('Monica', 'Livornese'),
    ('Angela', 'Minati'),
    ('Antonio', 'Bondioli'),
    ('Paolo', 'Politano'),
    ('Lorenzo', 'Rossi'),
    ('Daniela', 'Della Casa'),
    ('Silvano', 'Esposito'),
    ('Francesca', 'Degli Espositi'),
    ('Riccardo', 'Bosi');    

INSERT INTO
    `utenti` (`idPersona`, `username`, `password`)
VALUES
    (1, 'mario', SHA('mario')),
    (2, 'luigi', SHA('luigi')),
    (3, 'chiara', SHA('chiara'));

INSERT INTO
    `aree` (`idResponsabile`, `nominativo`)
VALUES
    (1, 'Romagna'),
    (1, 'Emilia'),
    (2, 'Lombardo-Veneto'),
    (3, 'Trentino'),
    (4, 'Alto-Adige');

INSERT INTO
    `locali` (`nominativo`, `apertura`, `idArea`, `idResponsabile`)
VALUES
    ('Tigelleria Modena', '2010-01-01', 2, 4),
    ('Piadineria Cesena', '2010-01-01', 1, 5),
    ('Trattoria Trento', '2010-01-01', 3, 6);


INSERT INTO
    `personaLocale` (`idPersona`, `idLocale`)
VALUES
    (1, 1),
    (2, 1),
    (3, 1);