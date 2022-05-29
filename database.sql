DROP DATABASE my_anemone;
CREATE DATABASE my_anemone;
use my_anemone;

CREATE TABLE `temi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `colore` varchar(16) UNIQUE NOT NULL
);

CREATE TABLE `dipendenti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `cf` char(15) NOT NULL,
    `email` varchar(32) UNIQUE NOT NULL,
    `slug` varchar(32) NOT NULL DEFAULT (REPLACE(CONCAT((`nome`),(`cognome`)), ' ', '')),
    `password` char(64),
    `id_tema` int(16),
    FOREIGN KEY (`id_tema`)
        REFERENCES `temi` (`id`)
        ON DELETE SET NULL
); 

CREATE TABLE `messaggi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `oggetto` varchar(64),
    `testo` text(256) NOT NULL,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `id_utente` int(16),
    FOREIGN KEY (`id_utente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `messaggioDipendente` (
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_messaggio` int(16) NOT NULL,
    `id_utente` int(16) NOT NULL,
    FOREIGN KEY (`id_utente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_messaggio`)
        REFERENCES `messaggi` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `aree`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `id_responsabile` int(16),
    FOREIGN KEY (`id_responsabile`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL
);

CREATE TABLE `locali`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `indirizzo` varchar(32) NOT NULL,
    `apertura` date NOT NULL,
    `chiusura` date, CHECK (`chiusura` > `apertura`),
    `id_area` int(16),
    `id_responsabile` int(16),
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

CREATE TABLE `prodotti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `prezzo` float(15, 2) NOT NULL DEFAULT 0,
    `nominativo` varchar(16) NOT NULL
);

CREATE TABLE `delivery`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(16) NOT NULL,
    `sigla` char(4) NOT NULL,
    `colore` varchar(8) NOT NULL
);

CREATE TABLE `autoconsumi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `idDipendente` int(16) NOT NULL,
    `valore` int(16) NOT NULL,
    FOREIGN KEY (`idDipendente`)
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
        ON DELETE SET NULL
);

CREATE TABLE `dipendenteCassa`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16) NOT NULL,
    `id_cassa` int(16) NOT NULL,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`),
    FOREIGN KEY (`id_cassa`)
        REFERENCES `casse` (`id`)
);

CREATE TABLE `prodottoScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_prodotto` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
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
    `id_utente` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    FOREIGN KEY (`id_utente`)
        REFERENCES `utenti` (`id`)
        ON DELETE CASCADE,
    FOREIGN KEY (`id_scontrino`)
        REFERENCES `scontrini` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `fornitori`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(16) NOT NULL UNIQUE,
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
    `nominativo` varchar(32) NOT NULL,
    `stock` int(16) NOT NULL
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
    `qta` int(16) NOT NULL DEFAULT 0,
    `tempo` datetime,
    FOREIGN KEY (`id_dipendente`)
        REFERENCES `dipendenti` (`id`)
        ON DELETE SET NULL,
    FOREIGN KEY (`id_merce`)
        REFERENCES `merci` (`id`)
        ON DELETE CASCADE
);

CREATE TABLE `buoni`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(16) NOT NULL UNIQUE,
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
    `percentuale` decimal(5,4) NOT NULL
);
