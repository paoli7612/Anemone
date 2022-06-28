
CREATE TABLE `temi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `colore` varchar(16) UNIQUE NOT NULL
);

CREATE TABLE `utenti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `cf` char(16) NOT NULL,
    `email` varchar(32) UNIQUE NOT NULL,
    `slug` varchar(32) NOT NULL DEFAULT (REPLACE(CONCAT((`nome`),(`cognome`)), ' ', '')),
    `password` char(64),
    `id_tema` int(16),
    FOREIGN KEY (`id_tema`)
        REFERENCES `temi` (`id`)
        ON DELETE SET NULL
); 

ALTER TABLE `utenti` ADD `isAmministratore` bit(1) NOT NULL DEFAULT 0;

CREATE TABLE `messaggi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `oggetto` varchar(64),
    `testo` text(256) NOT NULL,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `id_dipendente` int(16),
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `messaggioDipendente` (
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_messaggio` int(16) NOT NULL,
    `id_dipendente` int(16) NOT NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `utenti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_messaggio`)
        REFERENCES `messaggi` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `aree`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `id_responsabile` int(16),
    `slug` varchar(16) NOT NULL DEFAULT REPLACE((`nominativo`), ' ', '') UNIQUE,
    FOREIGN KEY (`id_responsabile`)
        REFERENCES `utenti` (`id`)
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
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `dipendenteLocale` ( 
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16),
    `id_locale` int(16),
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `utenti` (`id`)
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
        REFERENCES `utenti` (`id`)
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
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `conteggi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `differenza` float(15, 2) NOT NULL,
    `id_dipendente` int(16) NOT NULL,
    `id_cassa` int(16) NOT NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES  `utenti` (`id`),
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
        REFERENCES `utenti` (`id`)
        ON DELETE CASCADE
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
        REFERENCES `utenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_cassa`)
        REFERENCES `casse` (`id`)
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
        REFERENCES `utenti` (`id`),
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
        REFERENCES `utenti` (`id`)
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
        REFERENCES `utenti` (`id`)
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
