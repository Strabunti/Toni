CREATE USER 'toni'@'localhost' IDENTIFIED BY 'admin';
GRANT ALL PRIVILEGES ON 'toni'.* TO 'toni'@localhost;
FLUSH PRIVILEGES;

DROP TABLE IF EXISTS `dish`;
CREATE TABLE `dish` (
    id_dish INT AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    ingredients VARCHAR(255) NOT NULL,
    image MEDIUMBLOB,
    price FLOAT NOT NULL,
    type VARCHAR(255) NOT NULL,
    bestseller BOOLEAN NOT NULL,
    best_month BOOLEAN NOT NULL,
    PRIMARY KEY (`id_dish`),
    UNIQUE (name)
);

DROP TABLE IF EXISTS `admin`;
DROP TABLE IF EXISTS `comments`;
DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    profile_pic MEDIUMBLOB,
    PRIMARY KEY (`username`),
    UNIQUE (username, email)
);

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`username`),
  FOREIGN KEY (`username`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `comments` (
    comment_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    title VARCHAR(200) NOT NULL,
    comment TEXT NOT NULL,
    rating INT NOT NULL,
    review_date DATE NOT NULL,
    FOREIGN KEY (username) REFERENCES users(username) ON DELETE CASCADE ON UPDATE CASCADE
);

/* Inserting data for testing purposes */

INSERT INTO `users` (`username`, `password`, `email`) VALUES 
('admin', 'admin', 'admin@admin.com'),
('oliver', 'oliver', 'oliferflorinstiglet@stiglettonia.st'), 
('andrea', 'andrea', 'andreanegrin@negrilandia.ni'), 
('filippo', 'filippo', 'filippotonietto@fililililandia.fi');

INSERT INTO `users` (`username`, `password`, `email`, `profile_pic`) VALUES ('user', 'user', 'user@user.it', NULL); 


INSERT INTO `admin` (`username`) VALUES ('admin');

INSERT INTO dish (name, description, ingredients, image, price, type, bestseller, best_month) 
VALUES 
    ('CHEESEBURGER', 'Versione di Tommy del classico cheeseburger, rivistato con l\'incredibile salsa TONI\'S!', 'Hamburger, Cheddar, Insalata, Salsa TONI\'S', NULL, '6.0', 'Burger', FALSE, FALSE),
    ('DOUBLE CHEESEBACON', 'Versione di Tommy del classico cheeseburger, con l\'aggiunta del bacon e dell\'inimitabile salsa TONI\'S', 'Hamburger, Cheddar, Bacon, Insalata, Salsa TONI\'S', NULL, '6.5', 'Burger', FALSE, FALSE),
    ('PORTEO', 'Hamburger che grida Porta Portello fin dal midollo', 'Hamburger, Cheddar, Peperoni, Cipolla, Salsa TONI\'S', NULL, '6.0', 'Burger', FALSE, FALSE),
    ('VENETO', 'Un hamburger che più patriottico di così non si può!', 'Salsiccia, Peperoni, Cipolla, Asiago, Salsa TONI\'S', NULL, '6.0', 'Burger', FALSE, TRUE),
    ('PIOVEGO', 'In comune con le cattive acque del fiume Piovego, questo hamburger ha solo il nome! Il resto è pura poesia.', 'Salsiccia, Bacon, Insalata, Salsa TONI\'S', NULL, '6.0', 'Burger', FALSE, FALSE),
    ('SPECIAL TOMMY', 'Quando abbiamo chiesto a Tommy di sorprenderci con un nuovo panino, non pensavamo se ne sarebbe uscito con la sua creazione migliore.', 'Prosciutto, Verdure grigliate, Asiago, Salsa TONI\'S', NULL, '5.0', 'Panini', FALSE, FALSE),
    ('PULLED PORK', 'Ciò che ha reso TONI\'S ciò che oggi è TONI\'S.', 'Pulled Pork, Misticanza, Insalata russa', NULL, '5.5', 'Panini', TRUE, FALSE),
    ('INTOPPATORE', 'Vuoi essere sopraffatto dal pork, ma il Pulled Pork non ti basta? Tommy ha la risposta.', 'Salsiccia, Pulled Pork, Patate al forno, Salsa TONI\'S', NULL, '6.0', 'Panini', FALSE, FALSE),
    ('VEGETARIANO', 'Tommy non fa discriminazioni, e ci sono panini anche per chi preferisce solo le verdure!', 'Melanzane, Zucchine, Pomodori, Formaggio, qualsiasi cosa decida Tommy!', NULL, '4.5', 'Panini', FALSE, FALSE),
    ('PICCANTINO', 'Re degli antipasti, la piccantezza di questo tramezzino vi lascerà il palato preparato a ogni altra esperienza di TONI\'S!', 'Peperoni, Salame Piccante, Peperoncino', NULL, '2.5', 'Tramezzini', FALSE, FALSE),
    ('MARIUOLO', 'Per gli amici di Eraclea mare, un tramezzino che vi farà avere nostalgia di casa...', 'Tonno, Uova, Maionese', NULL, '2.5', 'Tramezzini', FALSE, FALSE),
    ('VEGGIE', 'Per gli amanti di un antipasto leggero e salutare.', 'Zucchine, Pomodori Secchi, Maionese', NULL, '2.5', 'Tramezzini', FALSE, FALSE);

INSERT INTO `comments` 
(`comment_id`, `username`, `title`, `comment`, `rating`, `review_date`) 
VALUES 
(NULL, 'andrea', 'Le Creazioni Uniche di Toni: Panini e Tramezzini da Applausi!', '\r\nIl panino di Tommy è semplicemente una delizia per il palato! La combinazione perfetta di ingredienti freschi e saporiti rende questo panino un\'autentica esperienza culinaria. La morbidezza del pane appena sfornato si fonde armoniosamente con il gusto succulento della carne, mentre gli ingredienti aggiunti, come formaggio fuso, verdure croccanti e condimenti speciali, aggiungono strati di sapore che si sposano alla perfezione. Ogni morso è un viaggio gustativo attraverso l\'eccellenza culinaria, portando una gioia indescrivibile. Grazie a Tommy per averci regalato un capolavoro gastronomico che resterà impresso nei nostri ricordi culinari come il miglior panino del mondo!', '5', '2024-01-12'), 
    (NULL, 'filippo', 'Toni, Maestro del Panino: Scopri i Sapori Eccezionali!' , 'Il panino di Tommy è davvero fuori dal comune! La sua combinazione unica di ingredienti ha il potere di trasformare ogni morso in un\'esperienza straordinaria. Il pane appena sfornato è soffice e fragrante, avvolge la carne succulenta in un abbraccio perfetto. Il formaggio fuso aggiunge una cremosità irresistibile, mentre le verdure fresche conferiscono quel tocco di croccantezza e vitalità. Ma ciò che rende veramente straordinario il panino di Tommy è la magica armonia di sapori che danza sulla lingua con ogni assaggio. È un viaggio culinario che rimarrà impresso nella memoria gustativa come il paradiso dei panini. Tommy ha davvero creato un capolavoro gastronomico che non ha rivali, conquistando il cuore e il palato di chiunque abbia la fortuna di assaporarlo!', '5', '2024-01-11'), 
    (NULL, 'oliver', 'Il Toque di Toni: Panini e Tramezzini da Sogno!' , 'Il panino di Tommy è una vera e propria sinfonia di sapori che eleva l\'arte del panino a un livello stratosferico. La combinazione di ingredienti freschi e di alta qualità si fonde in una melodia gustativa unica e indimenticabile. Il pane, fragrante e appena sfornato, è la cornice perfetta per accogliere la carne succulenta, mentre il formaggio fuso avvolge ogni boccone in un abbraccio cremoso. Le verdure fresche, con la loro croccantezza, aggiungono una nota di freschezza e vitalità, mentre i condimenti segreti di Tommy sono la chiave magica che sblocca un mondo di sapori straordinari.\r\n\r\nIl panino di Tommy non è solo cibo, è un\'esperienza sensoriale che trasporta il palato in un viaggio emozionante. Ogni morso è un incontro con l\'eccellenza culinaria, un\'ode alla creatività gastronomica di Tommy. È un piacere culinario senza paragoni, un\'opera d\'arte che soddisfa non solo il desiderio di mangiare, ma anche la ricerca di emozioni gustative intense. Tommy ha veramente alzato l\'asticella del panino perfetto, creando un capolavoro che conquista il cuore e il palato di chiunque abbia il privilegio di assaporarlo.', '5', '2024-01-08'), 
    (NULL, 'andrea', 'Nel Cuore della Paninoteca: Toni e i Suoi Capolavori Gastronomici, dove Ogni Panino è una Celebrazione del Gusto Autentico.' , 'Il panino di Tommy è una vera delizia gastronomica! Con ingredienti freschi e di alta qualità, ogni morso è un\'esplosione di sapori unici. Il pane appena sfornato, la carne succulenta, il formaggio fuso e le verdure croccanti si combinano magistralmente, creando un\'esperienza culinaria indimenticabile. Tommy ha davvero colpito nel segno, regalandoci il miglior panino del mondo!', '4', '2024-01-07'), 
    (NULL, 'filippo', 'Tra Le Mani di un Maestro: Toni e la Sua Arte nel Creare Panini e Tramezzini che Trasformano il Pranzo in un Momento Indimenticabile.' , 'Il panino di Tommy è un\'esperienza culinaria straordinaria! Ingredienti freschi e sapori unici si fondono per creare il miglior panino del mondo. Impossibile resistere!', '4', '2024-01-13');

INSERT INTO `comments` 
(`comment_id`, `username`, `title`, `comment`, `rating`, `review_date`) 
VALUES 
(NULL, 'andrea', 'Le Creazioni Uniche di Toni: Panini e Tramezzini da Applausi!', '\r\nIl panino di Tommy è semplicemente una delizia per il palato! La combinazione perfetta di ingredienti freschi e saporiti rende questo panino un\'autentica esperienza culinaria. La morbidezza del pane appena sfornato si fonde armoniosamente con il gusto succulento della carne, mentre gli ingredienti aggiunti, come formaggio fuso, verdure croccanti e condimenti speciali, aggiungono strati di sapore che si sposano alla perfezione. Ogni morso è un viaggio gustativo attraverso l\'eccellenza culinaria, portando una gioia indescrivibile. Grazie a Tommy per averci regalato un capolavoro gastronomico che resterà impresso nei nostri ricordi culinari come il miglior panino del mondo!', '5', '2024-01-12'), 
    (NULL, 'filippo', 'Toni, Maestro del Panino: Scopri i Sapori Eccezionali!' , 'Il panino di Tommy è davvero fuori dal comune! La sua combinazione unica di ingredienti ha il potere di trasformare ogni morso in un\'esperienza straordinaria. Il pane appena sfornato è soffice e fragrante, avvolge la carne succulenta in un abbraccio perfetto. Il formaggio fuso aggiunge una cremosità irresistibile, mentre le verdure fresche conferiscono quel tocco di croccantezza e vitalità. Ma ciò che rende veramente straordinario il panino di Tommy è la magica armonia di sapori che danza sulla lingua con ogni assaggio. È un viaggio culinario che rimarrà impresso nella memoria gustativa come il paradiso dei panini. Tommy ha davvero creato un capolavoro gastronomico che non ha rivali, conquistando il cuore e il palato di chiunque abbia la fortuna di assaporarlo!', '5', '2024-01-11'), 
    (NULL, 'oliver', 'Il Toque di Toni: Panini e Tramezzini da Sogno!' , 'Il panino di Tommy è una vera e propria sinfonia di sapori che eleva l\'arte del panino a un livello stratosferico. La combinazione di ingredienti freschi e di alta qualità si fonde in una melodia gustativa unica e indimenticabile. Il pane, fragrante e appena sfornato, è la cornice perfetta per accogliere la carne succulenta, mentre il formaggio fuso avvolge ogni boccone in un abbraccio cremoso. Le verdure fresche, con la loro croccantezza, aggiungono una nota di freschezza e vitalità, mentre i condimenti segreti di Tommy sono la chiave magica che sblocca un mondo di sapori straordinari.\r\n\r\nIl panino di Tommy non è solo cibo, è un\'esperienza sensoriale che trasporta il palato in un viaggio emozionante. Ogni morso è un incontro con l\'eccellenza culinaria, un\'ode alla creatività gastronomica di Tommy. È un piacere culinario senza paragoni, un\'opera d\'arte che soddisfa non solo il desiderio di mangiare, ma anche la ricerca di emozioni gustative intense. Tommy ha veramente alzato l\'asticella del panino perfetto, creando un capolavoro che conquista il cuore e il palato di chiunque abbia il privilegio di assaporarlo.', '5', '2024-01-08'), 
    (NULL, 'andrea', 'Nel Cuore della Paninoteca: Toni e i Suoi Capolavori Gastronomici, dove Ogni Panino è una Celebrazione del Gusto Autentico.' , 'Il panino di Tommy è una vera delizia gastronomica! Con ingredienti freschi e di alta qualità, ogni morso è un\'esplosione di sapori unici. Il pane appena sfornato, la carne succulenta, il formaggio fuso e le verdure croccanti si combinano magistralmente, creando un\'esperienza culinaria indimenticabile. Tommy ha davvero colpito nel segno, regalandoci il miglior panino del mondo!', '4', '2024-01-07'), 
    (NULL, 'filippo', 'Tra Le Mani di un Maestro: Toni e la Sua Arte nel Creare Panini e Tramezzini che Trasformano il Pranzo in un Momento Indimenticabile.' , 'Il panino di Tommy è un\'esperienza culinaria straordinaria! Ingredienti freschi e sapori unici si fondono per creare il miglior panino del mondo. Impossibile resistere!', '4', '2024-01-13');

INSERT INTO `comments` 
(`comment_id`, `username`, `title`, `comment`, `rating`, `review_date`) 
VALUES 
(NULL, 'andrea', 'Le Creazioni Uniche di Toni: Panini e Tramezzini da Applausi!', '\r\nIl panino di Tommy è semplicemente una delizia per il palato! La combinazione perfetta di ingredienti freschi e saporiti rende questo panino un\'autentica esperienza culinaria. La morbidezza del pane appena sfornato si fonde armoniosamente con il gusto succulento della carne, mentre gli ingredienti aggiunti, come formaggio fuso, verdure croccanti e condimenti speciali, aggiungono strati di sapore che si sposano alla perfezione. Ogni morso è un viaggio gustativo attraverso l\'eccellenza culinaria, portando una gioia indescrivibile. Grazie a Tommy per averci regalato un capolavoro gastronomico che resterà impresso nei nostri ricordi culinari come il miglior panino del mondo!', '5', '2024-01-12'), 
    (NULL, 'filippo', 'Toni, Maestro del Panino: Scopri i Sapori Eccezionali!' , 'Il panino di Tommy è davvero fuori dal comune! La sua combinazione unica di ingredienti ha il potere di trasformare ogni morso in un\'esperienza straordinaria. Il pane appena sfornato è soffice e fragrante, avvolge la carne succulenta in un abbraccio perfetto. Il formaggio fuso aggiunge una cremosità irresistibile, mentre le verdure fresche conferiscono quel tocco di croccantezza e vitalità. Ma ciò che rende veramente straordinario il panino di Tommy è la magica armonia di sapori che danza sulla lingua con ogni assaggio. È un viaggio culinario che rimarrà impresso nella memoria gustativa come il paradiso dei panini. Tommy ha davvero creato un capolavoro gastronomico che non ha rivali, conquistando il cuore e il palato di chiunque abbia la fortuna di assaporarlo!', '5', '2024-01-11'), 
    (NULL, 'oliver', 'Il Toque di Toni: Panini e Tramezzini da Sogno!' , 'Il panino di Tommy è una vera e propria sinfonia di sapori che eleva l\'arte del panino a un livello stratosferico. La combinazione di ingredienti freschi e di alta qualità si fonde in una melodia gustativa unica e indimenticabile. Il pane, fragrante e appena sfornato, è la cornice perfetta per accogliere la carne succulenta, mentre il formaggio fuso avvolge ogni boccone in un abbraccio cremoso. Le verdure fresche, con la loro croccantezza, aggiungono una nota di freschezza e vitalità, mentre i condimenti segreti di Tommy sono la chiave magica che sblocca un mondo di sapori straordinari.\r\n\r\nIl panino di Tommy non è solo cibo, è un\'esperienza sensoriale che trasporta il palato in un viaggio emozionante. Ogni morso è un incontro con l\'eccellenza culinaria, un\'ode alla creatività gastronomica di Tommy. È un piacere culinario senza paragoni, un\'opera d\'arte che soddisfa non solo il desiderio di mangiare, ma anche la ricerca di emozioni gustative intense. Tommy ha veramente alzato l\'asticella del panino perfetto, creando un capolavoro che conquista il cuore e il palato di chiunque abbia il privilegio di assaporarlo.', '5', '2024-01-08'), 
    (NULL, 'andrea', 'Nel Cuore della Paninoteca: Toni e i Suoi Capolavori Gastronomici, dove Ogni Panino è una Celebrazione del Gusto Autentico.' , 'Il panino di Tommy è una vera delizia gastronomica! Con ingredienti freschi e di alta qualità, ogni morso è un\'esplosione di sapori unici. Il pane appena sfornato, la carne succulenta, il formaggio fuso e le verdure croccanti si combinano magistralmente, creando un\'esperienza culinaria indimenticabile. Tommy ha davvero colpito nel segno, regalandoci il miglior panino del mondo!', '4', '2024-01-07'), 
    (NULL, 'filippo', 'Tra Le Mani di un Maestro: Toni e la Sua Arte nel Creare Panini e Tramezzini che Trasformano il Pranzo in un Momento Indimenticabile.' , 'Il panino di Tommy è un\'esperienza culinaria straordinaria! Ingredienti freschi e sapori unici si fondono per creare il miglior panino del mondo. Impossibile resistere!', '4', '2024-01-13');


