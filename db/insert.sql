INSERT INTO `temi` (`colore`) VALUES ('red'), ('green'), ('blue');
INSERT INTO `delivery` (`nominativo`, `slug`, `colore`) VALUES 
    ('Deliveroo', 'DLV', '#00ccbc'),
    ('JustEat', 'JE', '#ff8000'),
    ('UberEats', 'UB', '#5fb709'),
    ('Glovo', 'GLV', '#f7c719');

INSERT INTO `dipendenti` (`nome`, `cognome`, `email`, `password`, `isAmministratore`) VALUES
    ('Tommaso', 'Paoli', 'paoli7612@gmail.com', SHA(''), 1),
    ('Paola', 'Tenti', 'panti@gmail.com', SHA('qwerty'), 0),
    ('Giorgia', 'Pressi', 'giessi@gmail.com', SHA('qwerty'), 0),
    ('Olivia', 'Selmi', 'olmi@gmail.com', SHA('qwerty'), 0),
    ('Francesca', 'Forti', 'friorti@gmail.com', SHA('qwerty'), 0),
    ('Mohammed', 'Rossi', 'mohssi@gmail.com', SHA('qwerty'), 0),
    ('Sofia', 'Bondioli', 'sbondioli@gmail.com', SHA('qwerty'), 0),
    ('Noemi', 'Piave', 'piemi@gmail.com', SHA('qwerty'), 0);

INSERT INTO `aree` (`nominativo`, `id_responsabile`) VALUES
    ('Modenese', 4),
    ('LombardoVeneto', 6),
    ('MilanoEst', 7);

INSERT INTO `locali` (`nominativo`, `id_area`, `id_responsabile`) VALUES
    ('Piadineria Modena', 1, 2),
    ('Pizzeria Modena', 1, 5),
    ('Birreria Verona',2, 6),
    ('Pizzeria Segrate', 3, 8);

INSERT INTO `dipendenteLocale` (`id_dipendente`, `id_locale`) VALUES
    (1, 1),
    (2, 1),
    (3, 2);

INSERT INTO `merci` (`nominativo`, `slug`, `stock`, `img`, `daily`) VALUES
    ('Acqua naturale', 'aNat', 24, 'cocaPet.png', 1),
    ('Acqua frizzante', 'aGas', 24, 'cocaPet.png', 1),
    ('Cocacola pet', 'cocaPet', 24, 'cocaPet.png', 0),
    ('Fanta orange ', 'fantaO', 12, 'fanta.png', 0),
    ('Fanta lemon pet', 'fantaL', 12, 'fantaLemon.png', 0),
    ('Sprite', 'sprite', 12, 'sprite.png', 0),
    ('Estathe pesca', 'estatheP', 12, 'estathePesca.png', 0),
    ('Estathe limone', 'estatheL', 12, 'estatheLimone.png', 0),
    ('Fuze pesca', 'fuzeP', 12, 'fuzePesca.png', 0),
    ('Fuze limone', 'fuzeL', 12, 'fuzeLimone.png', 0),
    ('Limonata', 'limonata', 4, 'limonata.png', 0),
    ('Gassosa', 'gassosa', 4, 'gassosa.png', 0),
    ('Chinotto', 'chinotto', 4, 'chinotto.png', 0);

INSERT INTO `merci` (`nominativo`, `stock`, `categoria`, `daily`, `img`) VALUES
    ('Impasto normale', 40, 'impasto', 0, 'normale.png'),
    ('Impasto integrale', 32, 'impasto', 0, 'integrale.png'),
    ('Impasto khorasan', 32, 'impasto', 0, 'kamut.png');

INSERT INTO `merci` (`nominativo`, `categoria`, `daily`, `gr`) VALUES
    ('Mozzarella', 'formaggi', 1, 1),
    ('Crudo', 'salumi', 1, 1),
    ('Squacquerone', 'formaggi', 1, 1),
    ('Provola', 'formaggi', 0, 1);

