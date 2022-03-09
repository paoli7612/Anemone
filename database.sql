USE my_anemone;
DROP TABLE  `inventario`;
DROP TABLE  `prodotti`;
DROP TABLE  `delivery`;
DROP TABLE  `utenti`;
DROP TABLE  `temi`;

CREATE TABLE `temi` (
  `id` INT(16) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(32) UNIQUE NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `utenti` (
  `id` INT(16) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(32) UNIQUE NOT NULL,
  `password` VARCHAR(40) NOT NULL,
  `idTema` int(16) NOT NULL DEFAULT 1,
  FOREIGN KEY (`idTema`)
    REFERENCES `temi` (`id`),
  PRIMARY KEY (`id`)
);

CREATE TABLE `prodotti` (
  `id` INT(16) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(16) NOT NULL,
  `tipo` ENUM('Impasto', 'Formaggi', 'Salumi', 'Salse', 'Scatolame') NOT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE `inventario` (
  `id` INT(16) NOT NULL AUTO_INCREMENT,
  `idProdotto` INT(16) NOT NULL,
  `quando` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUtente` INT(16) NOT NULL,
  `numero` INT(16) DEFAULT 1,
  FOREIGN KEY (`idProdotto`)
    REFERENCES `prodotti` (`id`),
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`),
  PRIMARY KEY (`id`)
);

CREATE TABLE `delivery` (
  `id` INT(16) NOT NULL AUTO_INCREMENT,
  `nome` enum('DeliverooApp', 'DeliverooContante', 
            'GlovoApp', 'GlovoContante',
            'JustEatApp', 'JustEatContante',
            'UberEatsApp', 'UberEatsContante') NOT NULL,
  `prezzo` FLOAT(16) NOT NULL,
  `quando` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idUtente` INT(16) NOT NULL,
  FOREIGN KEY (`idUtente`)
    REFERENCES `utenti` (`id`),
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

INSERT INTO
  `utenti` (`username`, `password`)
VALUES
  ('Tommaso', SHA('tommaso')),
  ('root', SHA('root')),
  ('root2', SHA('root')),
  ('root3', SHA('root')),
  ('asd', SHA('asd'));

INSERT INTO
  `prodotti` (`nome`, `tipo`)
VALUES
  ('Normale', 'Impasto'),
  ('Integrale', 'Impasto'),
  ('Kamut', 'Impasto'),

  ('Squacquerone', 'Formaggi'),
  ('Mozzarella', 'Formaggi'),
  ('Bufala', 'Formaggi'),
  ('Provola', 'Formaggi'),
  ('Grana', 'Formaggi'),
  ('Gorgonzola', 'Formaggi'),
  
  ('Maionese', 'Salse'),
  ('Salsa Boscaiola', 'Salse'),
  ('Salsa Cocktail', 'Salse'),
  ('Aceto Balsamico', 'Salse'),
  ('Tabasco', 'Salse'),
  ('Patè Olive', 'Salse'),

  ('Funghi', 'Scatolame'),
  ('Porcini', 'Scatolame'),

  ('Prosciutto Crudo', 'Salumi'),
  ('Prosciutto Cotto', 'Salumi'),
  ('Spianata Calabra', 'Salumi'),
  ('Speck', 'Salumi'),
  ('Tacchino', 'Salumi'),
  ('Bresaola', 'Salumi');

INSERT INTO
  `inventario` (`idProdotto`, `idUtente`, `numero`)
VALUES
  (1, 1, 10),
  (2, 3, 12),
  (3, 4, 2),
  (2, 2, 34);
