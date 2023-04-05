--
-- Contenu de la table `actor`
-- id => int, Auto Increment
-- name => string (64)
-- picture => string (128), NULL
-- description_picture => text, NULL
-- description => text, NULL
--

INSERT INTO `actor` (`id`,`name`,`picture`, `description_picture`, `description`) 
VALUES 
(1,'Vanessa Guedj',NULL, NULL, NULL),
(2,'Anouk Grinberg', "AnoukGrinberg.jpg", "Par Michel Broué — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=56299298",NULL),
(3,'Emmanuel Meirieu', NULL, NULL, NULL),
(4,'Lan Truong', NULL, NULL, NULL),
(5,'François Morel', "FrancoisMorel.jpg", "Par Thesupermat — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=58381375", NULL),
(6,"Yvan le Bolloc'h", "YvanLeBolooch.jpg", "Par Eriotac — Travail personnel, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=16634869",NULL),
(7,'Stéphane Margot', NULL, NULL, NULL),
(8,'François Levantal', "FrancoisLevanthal.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=86300124",NULL),
(9,'Pierre Mondy', "PierreMondy.jpg", "Par Michaël Bemelmans — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=48682900", NULL),
(10,'Claire Nadeau', NULL, NULL, NULL),
(11,'Antoine de Caunes', "AntoinedeCaunes.jpg", "Par Le grand Cricri — Travail personnel, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=15023867",NULL),
(12,'Audrey Fleurot', "AudreyFleurot.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=26727716",NULL),
(13,'Anne Benoît',NULL, NULL, NULL),
(14,'Alain Chabat', "AlainChabat.jpg", "Par Pascal Fernandez — http://blofeld60.deviantart.com/gallery/, CC BY-SA 2.5, https://commons.wikimedia.org/w/index.php?curid=1589655",NULL),
(15,'Émilie Dequenne',"EmilieDequenne.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=20227154", NULL),
(16,'Alexis Hénon', NULL, NULL, NULL),
(17,'Philippe Nahon', "PhilippeNahon.jpg", "Par Lupin le vorace from Montréal, Canada — Flickr, CC BY-SA 2.0, https://commons.wikimedia.org/w/index.php?curid=31034275", NULL),
(18,'Thibault Roux', NULL, NULL, NULL),
(19,'Tony Saba', NULL, NULL, NULL),
(20,'Loránt Deutsch', "LorantDeutsch.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=33196726", NULL),
(21,'Alexandra Saadoun', NULL, NULL, NULL),
(22,'Christian Clavier', "ChristianClavier.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=26490643",NULL),
(23,'Tcheky Karyo', "TchekyKaryo.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=26834762", NULL),
(24,'Caroline Ferrus', NULL, NULL, NULL),
(25,'Patrick Chesnais', "PatrickChesnais.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=26727709", NULL),
(26,'Axelle Laffont', "AxelleLaffont.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=28205390", NULL),
(27,'Pascal Demolon', "PascalDemolon.jpg", "Par Mamzou2 — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=125387580", NULL),
(28,'Manu Payet', "ManuPayer.jpg", "Par Georges Biard, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=67063145", NULL),
(29,'Josée Drevon', "JoséeDrevon.jpg", "Par NocK — Travail personnel, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=27191198", NULL),
(30,'Alexandre Astier', "AlexandreAstier.jpg", "Par Selbymay — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=128685674", "Alexandre Astier, né le 16 juin 1974 à Lyon, est un acteur, auteur, réalisateur, compositeur, scénariste, producteur, monteur et musicien français.
Il est notamment connu en tant que créateur et interprète principal de la saga Kaamelott (2005-2009).
Il a également scénarisé et coréalisé les films d'animation Astérix : Le Domaine des dieux (2014) et Astérix : Le Secret de la potion magique (2018)."),
(31,'Jean-Robert Lombard', NULL, NULL, NULL),
(32,'Nicolas Gabion', "NicolasGabion.jpg", "Par © Xavier Caré / Wikimedia Commons, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=31236535", NULL),
(33,'Guillaume Briat', "GuillaumeBriat.jpg", "Par Photo Béatrice Cruveiller — https://www.guillaume-briat.com/portraits-1, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=124324376", NULL),
(34,'Bruno Salomone', NULL, NULL, NULL),
(35,'Caroline Pascal', NULL, NULL, NULL),
(36,'Bruno Fontaine', NULL, NULL, NULL),
(37,'Aurélien Portehaut', NULL, NULL, NULL),
(38,'Anne Girouard', "AnneGirouard.jpg", "Par r 	Georges Seguin — Cette image a été extraite d&#039;un autre fichier, CC BY-SA 2.5, https://commons.wikimedia.org/w/index.php?curid=50985197", NULL),
(39,'Serge Papagalli', NULL, NULL, NULL),
(40,'Georges Beller', "GeorgesBeller.jpg", "Par Bernard Grychowski — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=52891773", NULL),
(41,'Brice Fournier', "BriceFournier.jpg", "Par Georges Seguin (Okki) — Travail personnel, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=2943734", NULL),
(42,'Jean-Christophe Hembert', NULL, NULL, NULL),
(43,'Thomas Cousseau', NULL, NULL, NULL),
(44,'Lionnel Astier', "LionnelAstier.jpg", "Par Mireille Dubreuil — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=18689538", NULL),
(45,'François Rollin', "FrançoisRollin.jpg", "Par Georges Biard, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=46427198", NULL),
(46,'Christian Bujeau', "ChristianBujeau.jpg", "Par Yves Tennevin — Travail personnel, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=27730728", NULL),
(47,'Carlos Brandt', NULL, NULL, NULL),
(48,'Jacques Chambon', "JacquesChambon.jpg", "Par Concertdelhosteldieu — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=53444066", NULL),
(49,'Franck Pitiot', "FranckPitiot.jpg", "Par Yves Tennevin — Travail personnel, CC BY-SA 3.0, https://commons.wikimedia.org/w/index.php?curid=39189189", NULL),
(50,'Gilles Graveleau', "GillesGraveleau.jpg", "Par Ambroise31 — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=106746102", NULL),
(51,'Joëlle Sevilla', NULL, NULL, NULL),
(52,'Alain Chapuis', NULL, NULL, NULL),
(53,'Pascal Vincent', NULL, NULL, NULL),
(54,'Loïc Varraut', NULL, NULL, NULL),
(55,'Simon Astier', "SimonAstier.jpg", "Par G.Garitan — Travail personnel, CC BY-SA 4.0, https://commons.wikimedia.org/w/index.php?curid=73466359", NULL),
(56,'Magali Saadoun', NULL, NULL, NULL);