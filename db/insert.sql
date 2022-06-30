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

INSERT INTO `merci` (`nominativo`, `stock`, `categoria`, `daily`, `img`) VALUES
    ('Impasto normale', 40, 'impasto', 1, 'normale.png'),
    ('Impasto integrale', 32, 'impasto', 1, 'integrale.png'),
    ('Impasto khorasan', 32, 'impasto', 1, 'kamut.png');

INSERT INTO `merci` (`nominativo`, `stock`, `categoria`) VALUES
    ('Mozzarella', 4, 'formaggi'),
    ('Provola', 1, 'formaggi'),
    ('Caciotta', 1, 'formaggi');

