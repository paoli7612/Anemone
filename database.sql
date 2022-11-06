use my_anemone;

DROP TABLE `scarti`;
DROP TABLE `scontoScrontino`;
DROP TABLE `sconti`;
DROP TABLE `buonoScontrino`;
DROP TABLE `buoni`;
DROP TABLE `inventari`;
DROP TABLE `merceFornitore`;
DROP TABLE `ordini`;
DROP TABLE `merceProdotto`;
DROP TABLE `merci`;
DROP TABLE `pagamenti`;
DROP TABLE `fornitori`;
DROP TABLE `utenteScontrino`;
DROP TABLE `autoconsumoScontrino`;
DROP TABLE `deliveryScontrino`;
DROP TABLE `prodottoScontrino`;
DROP TABLE `dipendenteCassa`;
DROP TABLE `scontrini`;
DROP TABLE `utenti`;
DROP TABLE `autoconsumi`;
DROP TABLE `delivery`;
DROP TABLE `prodotti`;
DROP TABLE `conteggi`;
DROP TABLE `casse`;
DROP TABLE `turni`;
DROP TABLE `dipendenteLocale`;
DROP TABLE `locali`;
DROP TABLE `aree`;
DROP TABLE `dipendenti`;
DROP TABLE `temi`;
DROP TABLE `categorieProdotto`;

CREATE TABLE `temi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `colore` varchar(16) UNIQUE NOT NULL
);

CREATE TABLE `dipendenti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `cf` char(16) NOT NULL,
    `email` varchar(32) UNIQUE NOT NULL,
    `slug` varchar(32) NOT NULL DEFAULT (REPLACE(CONCAT((`nome`),(`cognome`)), ' ', '')),
    `password` char(64),
    `id_tema` int(16),
    `isAmministratore` bit(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (`id_tema`)
        REFERENCES `temi` (`id`)
        ON DELETE SET NULL
); 

CREATE TABLE `aree`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `id_responsabile` int(16),
    `slug` varchar(16) NOT NULL DEFAULT REPLACE((`nominativo`), ' ', '') UNIQUE,
    FOREIGN KEY (`id_responsabile`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `locali`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `indirizzo` varchar(128) NOT NULL,
    `apertura` date NOT NULL,
    `chiusura` date, CHECK (`chiusura` > `apertura`),
    `id_area` int(16),
    `id_responsabile` int(16),
    `slug` varchar(16) NOT NULL DEFAULT REPLACE((`nominativo`), ' ', '') UNIQUE,
    FOREIGN KEY (`id_area`)
        REFERENCES `aree` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_responsabile`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `dipendenteLocale` ( 
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16),
    `id_locale` int(16),
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_locale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `turni`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `da` datetime NOT NULL,
    `a` datetime NOT NULL,
    `pausa` time,
    `straordinari` time,
    `id_dipendente` int(16),
    `id_locale` int(16) NOT NULL,
    FOREIGN KEY (`id_locale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `casse` (
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_locale` int(16),
    `stato` enum('regolare', 'manutenzione', 'guasta') NOT NULL DEFAULT 'regolare',
    `id_dipendente` int(16),
    FOREIGN KEY (`id_locale`)
        REFERENCES `locali` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `conteggi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `differenza` float(15, 2) NOT NULL,
    `id_dipendente` int(16) NOT NULL,
    `id_cassa` int(16) NOT NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES  `dipendenti` (`id`),
    FOREIGN KEY (`id_cassa`)
        REFERENCES  `casse` (`id`)
);

CREATE TABLE `categorieProdotto`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL
);

CREATE TABLE `prodotti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `prezzo` float(15, 2) NOT NULL DEFAULT 0,
    `nominativo` varchar(32) NOT NULL,
    `colore` varchar(16) DEFAULT 'white',
    `id_categoria` int(16),
    `slug` varchar(16) NOT NULL DEFAULT REPLACE((`nominativo`), ' ', '') UNIQUE,
    FOREIGN KEY (`id_categoria`)
        REFERENCES `categorieProdotto`(`id`)
);

CREATE TABLE `delivery`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL,
    `sigla` char(4) NOT NULL,
    `colore` varchar(32) NOT NULL
);

CREATE TABLE `autoconsumi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16) NOT NULL,
    `valore` float(15, 2) NOT NULL DEFAULT 7.00,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `utenti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `codice_carta` int(16) UNIQUE,
    `nickname` varchar(32) NOT NULL,
    `sesso` enum('maschio', 'femmina')
);

CREATE TABLE `scontrini`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `pi`  int(11),
    `id_delivery` int(16),
    `id_autoconsumo` int(16),
    `id_dipendente` int(16),
    `id_cassa` int(16),
    `id_utente` int(16),
    FOREIGN KEY (`id_delivery`)
        REFERENCES `delivery` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_autoconsumo`)
        REFERENCES `autoconsumi` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_cassa`)
        REFERENCES `casse` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_utente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

ALTER TABLE `scontrini`
    ADD `totale` float(15, 2),
    ADD `pager` int(4);

CREATE TABLE `dipendenteCassa`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16) NOT NULL,
    `id_cassa` int(16) NOT NULL,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`),
    FOREIGN KEY (`id_cassa`)
        REFERENCES `casse` (`id`)
);

CREATE TABLE `prodottoScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_prodotto` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    `qta` int(16) NOT NULL,
    FOREIGN KEY (`id_prodotto`)
        REFERENCES `prodotti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `deliveryScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_delivery` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    FOREIGN KEY (`id_delivery`)
        REFERENCES `delivery` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `autoconsumoScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_autoconsumo` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    FOREIGN KEY (`id_autoconsumo`)
        REFERENCES `autoconsumi` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `utenteScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `utenti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `fornitori`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `telefono` int(10) NOT NULL,
    `indirizzo` varchar(32) NOT NULL
);

CREATE TABLE `pagamenti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tipo` enum('contante', 'carta') NOT NULL,
    `valore` float(15, 2) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `merci`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) UNIQUE NOT NULL,
    `sigla` varchar(16) NOT NULL DEFAULT (`nominativo`),
    `stock` int(16) NOT NULL,
    `prezzo` float(15, 2) NOT NULL DEFAULT 0,
    `categoria` enum('impasto', 'bibite', 'formaggi', 'salumi', 'scatolame', 'divise', 'pulizie', 'caffetteria', 'altro') DEFAULT 'altro',
    `daily` bit(1) NOT NULL DEFAULT 0,
    `img` varchar(32) DEFAULT 'none.png'
);
    
CREATE TABLE `merceProdotto`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_prodotto` int(16) NOT NULL,
    `id_merce` int(16) NOT NULL,
    `pte` float NOT NULL,
    FOREIGN KEY (`id_prodotto`)
        REFERENCES `prodotti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_merce`)
        REFERENCES `merci` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `ordini`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `id_locale` int(16) NOT NULL,
    `id_merce` int(16) NOT NULL,
    `id_fornitore` int(16), 
    `id_dipendente` int(16) NOT NULL, 
    `stock` int(16) NOT NULL,
    `qta` int(16) NOT NULL,
    FOREIGN KEY (`id_locale`)
        REFERENCES `locali` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_merce`)
        REFERENCES `merci` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_fornitore`)
        REFERENCES `fornitori` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `merceFornitore`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_merce` int(16),
    `id_fornitore` int(16) NOT NULL,
    `qta` int(16) NOT NULL DEFAULT 0,
    `tempo` datetime,
    FOREIGN KEY (`id_merce`)
        REFERENCES `merci` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_fornitore`)
        REFERENCES `fornitori` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `inventari`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16),
    `id_merce` int(16) NOT NULL,
    `qta` int(16) NOT NULL,
    `tempo` datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_merce`)
        REFERENCES `merci` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `buoni`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `valore` int(10) NOT NULL
);

CREATE TABLE `buonoScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_buono` int(16) NOT NULL UNIQUE,
    `id_scontrino` int(10) NOT NULL
);

CREATE TABLE `sconti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(16) NOT NULL UNIQUE,
    `percentuale` decimal(2,2) NOT NULL
);

CREATE TABLE `scontoScrontino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_scontrino` int(16) NOT NULL,
    `id_sconto` int(16) NOT NULL,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_sconto`)
        REFERENCES `sconti` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `scarti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_merce` int(16) NOT NULL,
    `id_locale` int(16) NOT NULL,
    `qta` int(16) NOT NULL,
    FOREIGN KEY (`id_merce`)
        REFERENCES `merci` (`id`),
    FOREIGN KEY (`id_locale`)
        REFERENCES `locali` (`id`)
);

INSERT INTO `temi` (`colore`) VALUES ('red'), ('green'), ('blue');
INSERT INTO `delivery` (`nominativo`, `sigla`, `colore`) VALUES 
    ('Deliveroo', 'DLV', '#00ccbc'),
    ('JustEat', 'JE', '#ff8000'),
    ('UberEats', 'UB', '#5fb709'),
    ('Glovo', 'GLV', '#f7c719');
INSERT INTO `categorieProdotto` (`nominativo`) VALUES
    ('piadine'), ('pizze'), ('bibite'), ('caffetteria'), ('birre');

INSERT INTO `dipendenti` (`nome`, `cognome`, `email`, `cf`, `password`, `isAmministratore`) VALUES
    ('Tommaso', 'Paoli', 'paoli7612@gmail.com', 'PLATMS00E21L378W', SHA('qwerty'), 1),
    ('Paola', 'Tenti', 'panti@gmail.com', 'PMDYZB54B51A799J', SHA('qwerty'), 0),
    ('Giorgia', 'Pressi', 'giessi@gmail.com', 'ZHNFDZ86M03A014S', SHA('qwerty'), 0),
    ('Olivia', 'Selmi', 'olmi@gmail.com', 'PNLNRP38R45A546Y', SHA('qwerty'), 0),
    ('Francesca', 'Forti', 'friorti@gmail.com', 'BPSZBT38A27B791D', SHA('qwerty'), 0),
    ('Mohammed', 'Rossi', 'mohssi@gmail.com', 'PSHPPR53P65L312F', SHA('qwerty'), 0),
    ('Sofia', 'Bondioli', 'sbondioli@gmail.com', 'BNDPSFA3P45L312F', SHA('qwerty'), 0),
    ('Noemi', 'Piave', 'piemi@gmail.com', 'VNFMXH76A52C735T', SHA('qwerty'), 0);

INSERT INTO `aree` (`nominativo`, `id_responsabile`) VALUES
    ('Modenese', 4),
    ('LombardoVeneto', 6),
    ('MilanoEst', 7);

INSERT INTO `locali` (`nominativo`, `indirizzo`, `apertura`, `id_area`, `id_responsabile`) VALUES
    ('Piadineria Modena', 'Via Luca Enzo Farini, 12, 41121 Modena MO', '20020101', 1, 2),
    ('Pizzeria Modena', 'Centro Commerciale Le Valli, Viale Traiano, 50, 41122 Modena MO', '20050101', 1, 5),
    ('Birreria Verona', 'Piazzale XXV Aprile, 37138 Verona VR', '20030101', 2, 6),
    ('Pizzeria Segrate', 'Via Rodolfo Morandi, 44, 20090 Segrate MI', '20090601', 3, 8);

INSERT INTO `dipendenteLocale` (`id_dipendente`, `id_locale`) VALUES
    (1, 1),
    (2, 1),
    (3, 2);


INSERT INTO `casse` (`id_locale`) VALUES (1), (1), (2);

INSERT INTO `merci` (`nominativo`, `sigla`, `stock`, `img`, `daily`) VALUES
    ('Cocacola pet', 'cocaPet', 24, 'cocaPet.png', 1),
    ('Fanta orange ', 'fantaO', 12, 'fanta.png', 1),
    ('Fanta lemon pet', 'fantaL', 12, 'fantaLemon.png', 1),
    ('Sprite', 'sprite', 12, 'sprite.png', 1),
    ('Estathe pesca', 'estatheP', 12, 'estathePesca.png', 1),
    ('Estathe limone', 'estatheL', 12, 'estatheLimone.png', 1),
    ('Fuze pesca', 'fuzeP', 12, 'fuzePesca.png', 1),
    ('Fuze limone', 'fuzeL', 12, 'fuzeLimone.png', 1),
    ('Limonata', 'limonata', 4, 'limonata.png', 1),
    ('Gassosa', 'gassosa', 4, 'gassosa.png', 1),
    ('Chinotto', 'chinotto', 4, 'chinotto.png', 1);

INSERT INTO `merci` (`nominativo`, `stock`, `categoria`) VALUES
    ('Mozzarella', 4, 'formaggi'),
    ('Provola', 1, 'formaggi'),
    ('Caciotta', 1, 'formaggi');

INSERT INTO `prodotti` (`nominativo`, `id_categoria`) VALUES
    ('Emilia', 1),
    ('Belpaese', 1),
    ('Margherita', 2),
    ('Capricciosa', 2),
    ('Pioggia', 2);

