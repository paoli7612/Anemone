use my_anemone;

DROP TABLE `accounts`;
DROP TABLE `themes`;

CREATE TABLE `themes`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(16) UNIQUE NOT NULL
);

CREATE TABLE `accounts`(
    `id` int(16) PRIMARY KEY AUTO_INCREMENT,
    `name` varchar(16),
    `surname` varchar(32),
    `cf` char(16),
    `username` varchar(16) UNIQUE NOT NULL,
    `email` varchar(32) UNIQUE NOT NULL,
    `slug` varchar(32) NOT NULL DEFAULT (REPLACE(`surname`, ' ', '')),
    `password` char(64),
    `idTheme` int(16),
    `isAdmin` bit(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (`idTheme`)
        REFERENCES `themes` (`id`)
        ON DELETE SET NULL
); 

INSERT INTO `themes` (`name`) VALUES ('red'), ('blue'), ('yellow'), ('amber'), ('indigo');

INSERT INTO `accounts` (`username`, `email`, `password`, `isAdmin`) VALUES
    ('root', 'admin@anemone.ovh', SHA('qwerty'), 1),
    ('tomaoli', 'tomaoli@anemone.ovh', SHA('qwerty'), 0);
