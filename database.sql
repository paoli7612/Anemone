use my_anemone;

DROP TABLE merceProdotto;       --  merce prodotti
DROP TABLE scontrinoProdotti;   -- scontrini prodotti
DROP TABLE utenteLocale;        -- utenti locali
DROP TABLE messaggioUtente;     -- messaggi utenti
DROP TABLE prodottoScontrino;   -- prodotti scontrini
DROP TABLE scontrini;       -- utenti casse
DROP TABLE ordini;          -- locali merce fornitori
DROP TABLE turni;           -- locali utenti
DROP TABLE permessi;        -- utenti
DROP TABLE messaggi;        -- utenti
DROP TABLE conteggi;        -- utenti casse
DROP TABLE versamenti;      -- utenti casse
DROP TABLE casse;           -- locali
DROP TABLE inventari;       -- utenti merce
DROP TABLE locali;          -- aree utenti
DROP TABLE aree;            -- utenti
DROP TABLE utenti;          -- temi
DROP TABLE prodotti;
DROP TABLE delivery;
DROP TABLE merce;
DROP TABLE fornitori;
DROP TABLE temi;

CREATE TABLE `temi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) UNIQUE NOT NULL
);

CREATE TABLE `fornitori`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(16) NOT NULL,
    `indirizzo` varchar(32) NOT NULL,
    `telefono` char(10)
);

CREATE TABLE `merce`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(32) NOT NULL,
    `stock` int(16) NOT NULL,
    `categoria` enum('Formaggi', 'Salumi', 'Impasti', 'Caffetteria', 'Bibite') NOT NULL,
    UNIQUE (`nome`, `stock`)
);

CREATE TABLE `delivery`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `valore` decimal(15, 2) NOT NULL,
    `fascia` int(2),
    `nome` varchar(32) NOT NULL,
    `giorno` date DEFAULT (CURRENT_TIMESTAMP)
);

CREATE TABLE `prodotti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL UNIQUE
);

CREATE TABLE `utenti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,

    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `slug` varchar(32) UNIQUE NOT NULL DEFAULT (REPLACE(CONCAT((`nome`),(`cognome`)), ' ', '')),

    `username` varchar(16) UNIQUE,
    `password` char(64),
    `telefono` char(10),
    `nascita` date,
    `email` varchar(32),
    `idTema` int(8),
    FOREIGN KEY (`idTema`)
        REFERENCES `temi` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `aree`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idResponsabile` int(8),
    `nominativo` varchar(32) NOT NULL UNIQUE,
    FOREIGN KEY (`idResponsabile`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `locali`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `apertura` date NOT NULL DEFAULT (CURRENT_TIMESTAMP),
    `chiusura` date,
    `idArea` int(8),
    `idResponsabile` int(8),
    FOREIGN KEY (`idArea`)
        REFERENCES `aree` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idResponsabile`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `inventari`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idUtente` int(8),
    `idMerce` int(8) NOT NULL,
    `quantita` int(16) NOT NULL DEFAULT (CURRENT_TIMESTAMP),
    `quando` datetime(4),
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idMerce`)
        REFERENCES `merce` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `casse` (
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idLocale` int(8) NOT NULL,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `versamenti`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idUtente` int(8),
    `idCassa` int(8) NOT NULL,
    `totale` decimal(15,2) NOT NULL,
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idCassa`)
        REFERENCES `casse` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `conteggi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idUtente` int(8),
    `idCassa` int(8) NOT NULL,
    `differenza` int(8) NOT NULL,
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idCassa`)
        REFERENCES `casse` (`id`)
        ON DELETE CASCADE
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

CREATE TABLE `permessi`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `da` datetime NOT NULL,
    `a` datetime NOT NULL,
    `isApprovato` BIT(1),
    `idUtente` int(8),
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `turni`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `da` datetime NOT NULL,
    `a` datetime NOT NULL,
    `pausa` time,
    `straordinari` time,
    `idUtente` int(8),
    `idLocale` int(8) NOT NULL,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
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

CREATE TABLE `scontrini`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `quando` datetime(4) NOT NULL,
    `prezzo` decimal(15,2) NOT NULL,
    `sconto` decimal(15,2),
    `idUtente` int(8),
    `idCassa` int(8) NOT NULL,
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`idCassa`)
        REFERENCES `casse` (`id`)
        ON DELETE CASCADE
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

CREATE TABLE `messaggioUtente`(
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

CREATE TABLE `utenteLocale` ( 
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idUtente` int(8),
    `idLocale` int(8),
    FOREIGN KEY (`idUtente`)
        REFERENCES `utenti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idLocale`)
        REFERENCES `locali` (`id`)
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

CREATE TABLE `merceProdotto`(
    `id` int(8) PRIMARY KEY AUTO_INCREMENT,
    `idMerce` int(8) NOT NULL,
    `idProdotto` int(8) NOT NULL,
    FOREIGN KEY (`idMerce`)
        REFERENCES `merce` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`idProdotto`)
        REFERENCES `prodotti` (`id`)
        ON DELETE CASCADE
);




INSERT INTO
    `utenti` (`nome`, `cognome`, `username`, `password`)
VALUES
    ('Mario', 'Forti', 'mario', SHA('mario')), 
    ('Chiara', 'Libardoni', 'chiara', SHA('chiara')),
    ('Noemi', 'Bruschetta', 'noemi', SHA('noemi')),

    ('Luca', 'Floreacing', 'luca', SHA('luca')), 
    ('Giovanni', 'Rippa', 'giovanni', SHA('giovanni')),
    ('Monica', 'Livornese', 'monica', SHA('monica')),
    ('Angela', 'Minati', 'angela', SHA('angela')),
    ('Antonio', 'Bondioli', 'antonio', SHA('antonio')),
    ('Paolo', 'Politano', 'paolo', SHA('paolo')),
    ('Lorenzo', 'Rossi', 'lorenzo', SHA('lorenzo')), 
    ('Daniela', 'Della Casa', 'daniela', SHA('daniela')),
    ('Silvano', 'Esposito', 'silvano', SHA('silvano')),
    ('Francesca', 'Degli Espositi', 'francesca', SHA('francesca')),
    ('Riccardo', 'Bosi', 'riccardo', SHA('riccardo')), 

    ('Luca', 'Bonolis', 'luca2', SHA('luca2')), 
    ('Luigi', 'Stella', 'luigi', SHA('luigi')),    
    ('Noemi', 'Bana', 'noemi2', SHA('noemi2')),

    ('Claudia', 'Cleo', 'claudia', SHA('claudia')), 
    ('Anna', 'Turi', 'anna', SHA('turi'));

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
    ('Piadineria Modena', '2018-05-01', 2, 1),
    ('Piadineria Cesena', '2010-01-01', 1, 5),
    ('Trattoria Trento', '2010-01-01', 3, 6);

INSERT INTO
    `utenteLocale` (`idUtente`, `idLocale`)
VALUES
    (1, 1),
    (2, 1),
    (15, 2),
    (16, 2),
    (17, 2);

INSERT INTO
    `temi` (`nome`)
VALUES
    ('green'),
    ('blue'),
    ('yellow'),
    ('red'),
    ('orange'),
    ('black');

INSERT INTO
    `prodotti` (`nome`)
VALUES
    ('Piada'),
    ('Sobrieta'),
    ('Emilia'),
    ('Belpaese');

INSERT INTO
    `merce` (`nome`, `stock`, `categoria`)
VALUES
    ('Impasto Normale', 40, 'Impasto'),
    ('Impasto Integrale', 32, 'Impasto'),
    ('Impasto Kamut', 32, 'Impasto'),

    ('Squacquerone', 4, 'Formaggi'),
    ('Mozzarella', 4, 'Formaggi'),
    ('Brie', 1, 'Formaggi'),
    ('Bufala', 4, 'Formaggi'),

    ('Prosciutto Crudo', 2, 'Salumi'),
    ('Prosciutto Cotto', 4, 'Salumi'),
    ('Bresaola', 4, 'Salumi'),
    ('Spianata Calabra', 1, 'Salumi'),
    ('Salame Milano', 1, 'Salumi'),
    ('Culatta', 2, 'Salumi');
