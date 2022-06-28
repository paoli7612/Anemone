INSERT INTO
    `temi` (`colore`)
VALUES
    ('green'),
    ('blue'),
    ('yellow'),
    ('grey');

INSERT INTO
    `delivery` (`nominativo`, `sigla`, `colore`)
VALUES
    ('Deliveroo', 'DLV', '#00ccbc'),
    ('JustEat', 'JE', '#ff8000'),
    ('UberEats', 'UB', '#5fb709'),
    ('Glovo', 'GLV', '#f7c719');

INSERT INTO
    `categorieProdotto` (`nominativo`)
VALUES
    ('piadine'),
    ('pizze'),
    ('bibite'),
    ('caffetteria'),
    ('birre');

INSERT INTO
    `utenti` (
        `nome`,
        `cognome`,
        `email`,
        `cf`,
        `password`,
        `isAmministratore`
    )
VALUES
    (
        'Tommaso',
        'Paoli',
        'paoli7612@gmail.com',
        'PLATMS00E21L378W',
        SHA(''),
        1
    ),
    (
        'Paola',
        'Tenti',
        'panti@gmail.com',
        'PMDYZB54B51A799J',
        SHA('qwerty'),
        0
    ),
    (
        'Giorgia',
        'Pressi',
        'giessi@gmail.com',
        'ZHNFDZ86M03A014S',
        SHA('qwerty'),
        0
    ),
    (
        'Olivia',
        'Selmi',
        'olmi@gmail.com',
        'PNLNRP38R45A546Y',
        SHA('qwerty'),
        0
    ),
    (
        'Francesca',
        'Forti',
        'friorti@gmail.com',
        'BPSZBT38A27B791D',
        SHA('qwerty'),
        0
    ),
    (
        'Mohammed',
        'Rossi',
        'mohssi@gmail.com',
        'PSHPPR53P65L312F',
        SHA('qwerty'),
        0
    ),
    (
        'Sofia',
        'Bondioli',
        'sbondioli@gmail.com',
        'BNDPSFA3P45L312F',
        SHA('qwerty'),
        0
    ),
    (
        'Noemi',
        'Piave',
        'piemi@gmail.com',
        'VNFMXH76A52C735T',
        SHA('qwerty'),
        0
    );

INSERT INTO
    `aree` (`nominativo`, `id_responsabile`)
VALUES
    ('Modenese', 4),
    ('LombardoVeneto', 6),
    ('MilanoEst', 7);

INSERT INTO
    `locali` (
        `nominativo`,
        `indirizzo`,
        `apertura`,
        `id_area`,
        `id_responsabile`
    )
VALUES
    (
        'Piadineria Modena',
        'Via Luca Enzo Farini, 12, 41121 Modena MO',
        '20020101',
        1,
        2
    ),
    (
        'Pizzeria Modena',
        'Centro Commerciale Le Valli, Viale Traiano, 50, 41122 Modena MO',
        '20050101',
        1,
        5
    ),
    (
        'Birreria Verona',
        'Piazzale XXV Aprile, 37138 Verona VR',
        '20030101',
        2,
        6
    ),
    (
        'Pizzeria Segrate',
        'Via Rodolfo Morandi, 44, 20090 Segrate MI',
        '20090601',
        3,
        8
    );

INSERT INTO
    `dipendenteLocale` (`id_dipendente`, `id_locale`)
VALUES
    (1, 1),
    (2, 1),
    (3, 2);

INSERT INTO
    `casse` (`id_locale`)
VALUES
    (1),
    (1),
    (2);

INSERT INTO
    `merci` (`nominativo`, `sigla`, `stock`, `img`, `daily`)
VALUES
    ('Cocacola pet', 'cocaPet', 24, 'cocaPet.png', 1),
    ('Fanta orange ', 'fantaO', 12, 'fanta.png', 1),
    (
        'Fanta lemon pet',
        'fantaL',
        12,
        'fantaLemon.png',
        1
    ),
    ('Sprite', 'sprite', 12, 'sprite.png', 1),
    (
        'Estathe pesca',
        'estatheP',
        12,
        'estathePesca.png',
        1
    ),
    (
        'Estathe limone',
        'estatheL',
        12,
        'estatheLimone.png',
        1
    ),
    ('Fuze pesca', 'fuzeP', 12, 'fuzePesca.png', 1),
    ('Fuze limone', 'fuzeL', 12, 'fuzeLimone.png', 1),
    ('Limonata', 'limonata', 4, 'limonata.png', 1),
    ('Gassosa', 'gassosa', 4, 'gassosa.png', 1),
    ('Chinotto', 'chinotto', 4, 'chinotto.png', 1);

INSERT INTO
    `merci` (`nominativo`, `stock`, `categoria`)
VALUES
    ('Mozzarella', 4, 'formaggi'),
    ('Provola', 1, 'formaggi'),
    ('Caciotta', 1, 'formaggi');

INSERT INTO
    `prodotti` (`nominativo`, `id_categoria`)
VALUES
    ('Emilia', 1),
    ('Belpaese', 1),
    ('Margherita', 2),
    ('Capricciosa', 2),
    ('Pioggia', 2);