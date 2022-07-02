use my_anemone;

CREATE TABLE `temi`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `colore` varchar(16) UNIQUE NOT NULL
);

CREATE TABLE `dipendenti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nome` varchar(16) NOT NULL,
    `cognome` varchar(16) NOT NULL,
    `email` varchar(32) UNIQUE NOT NULL,
    `slug` varchar(32) NOT NULL DEFAULT (REPLACE(CONCAT((`nome`),(`cognome`)), ' ', '')),
    `password` char(64),
    `id_tema` int(16),
    `isAmministratore` bit(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (`id_tema`) REFERENCES `temi` (`id`) ON DELETE
    SET
        NULL
);

CREATE TABLE `aree`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `id_responsabile` int(16),
    `slug` varchar(16) NOT NULL DEFAULT(REPLACE((`nominativo`), ' ', '')) UNIQUE,
    FOREIGN KEY (`id_responsabile`) REFERENCES `dipendenti` (`id`) ON DELETE
    SET
        NULL
);

CREATE TABLE `locali`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `id_area` int(16),
    `id_responsabile` int(16),
    `slug` varchar(16) NOT NULL DEFAULT (REPLACE((`nominativo`), ' ', '')) UNIQUE,
    FOREIGN KEY (`id_area`) REFERENCES `aree` (`id`) ON DELETE
    SET
        NULL,
        FOREIGN KEY (`id_responsabile`) REFERENCES `dipendenti` (`id`) ON DELETE
    SET
        NULL
);

CREATE TABLE `dipendenteLocale` (
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16),
    `id_locale` int(16),
    FOREIGN KEY (`id_dipendente`) REFERENCES `dipendenti` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_locale`) REFERENCES `locali` (`id`) ON DELETE CASCADE
);

CREATE TABLE `delivery`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) NOT NULL UNIQUE,
    `slug` char(4) NOT NULL UNIQUE,
    `colore` varchar(32) NOT NULL
);

CREATE TABLE `scontrini`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `pi` int(11),
    `id_delivery` int(16),
    `id_dipendente` int(16),
    `carta` float(15, 2),
    `contante` float(15, 2),
    `pager` int(4),
    FOREIGN KEY (`id_delivery`) REFERENCES `delivery` (`id`) ON DELETE
    SET
        NULL,
        FOREIGN KEY (`id_dipendente`) REFERENCES `dipendenti` (`id`) ON DELETE
    SET
        NULL
);

CREATE TABLE `deliveryScontrino`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_delivery` int(16) NOT NULL,
    `id_scontrino` int(16) NOT NULL,
    FOREIGN KEY (`id_delivery`) REFERENCES `delivery` (`id`) ON DELETE CASCADE,
    FOREIGN KEY (`id_scontrino`) REFERENCES `scontrini` (`id`) ON DELETE CASCADE
);

CREATE TABLE `merci`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `nominativo` varchar(32) UNIQUE NOT NULL,
    `slug` varchar(16) NOT NULL DEFAULT (`nominativo`),
    `stock` int(16),
    `gr` int(16),
    `prezzo` float(15, 2) NOT NULL DEFAULT 0,
    `categoria` enum(
        'impasto',
        'bibite',
        'formaggi',
        'salumi',
        'scatolame',
        'divise',
        'pulizie',
        'caffetteria',
        'altro'
    ) DEFAULT 'altro',
    `daily` bit(1) NOT NULL DEFAULT 0,
    `img` varchar(32) DEFAULT 'none.png'
);

CREATE TABLE `inventari`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16),
    `id_merce` int(16) NOT NULL,
    `qta` int(16) NOT NULL,
    `tempo` datetime DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`id_dipendente`) REFERENCES `dipendenti` (`id`) ON DELETE
    SET
        NULL,
        FOREIGN KEY (`id_merce`) REFERENCES `merci` (`id`) ON DELETE CASCADE
);

CREATE TABLE `scarti`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_merce` int(16) NOT NULL,
    `id_locale` int(16) NOT NULL,
    `qta` int(16) NOT NULL,
    FOREIGN KEY (`id_merce`) REFERENCES `merci` (`id`),
    FOREIGN KEY (`id_locale`) REFERENCES `locali` (`id`)
);

CREATE TABLE `fasce`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `tempo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `piade` int(16) NOT NULL,
    `baby` int(16) NOT NULL,
    `scontrini` int(16) NOT NULL,
    `imponibile` float(15, 2) NOT NULL
);

CREATE TABLE `primaNota`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `id_dipendente` int(16),
    `lordo` int(16),
    `scontrini` int(16),
    `pos1` float(15, 2),
    `cassetto1` float(15, 2),
    `pos2` float(15, 2),
    `cassetto2` float(15, 2),
    `dlv` float(15, 2),
    `dlvc` float(15, 2),
    `glv` float(15, 2),
    `glvc` float(15, 2),
    `JE` float(15, 2),
    `JEc` float(15, 2),
    `UB` float(15, 2),
    `UBc` float(15, 2),
    `edenred` float(15, 2),
    `pellegrini` float(15, 2),
    FOREIGN KEY (`id_dipendente`) REFERENCES `dipendenti` (`id`) ON DELETE SET NULL
);